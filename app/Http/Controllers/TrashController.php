<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        $trashedPlayers = Player::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);
        return view('trash.index', compact('trashedPlayers'));
    }
    
    public function restore($id)
    {
        $player = Player::onlyTrashed()->findOrFail($id);
        $player->restore();
        
        return redirect()->route('trash.index')
            ->with('success', 'Футболист восстановлен');
    }
    
    public function forceDelete($id)
    {
        $player = Player::onlyTrashed()->findOrFail($id);
        $player->forceDelete();
        
        return redirect()->route('trash.index')
            ->with('success', 'Футболист полностью удален');
    }
    
    public function empty()
    {
        Player::onlyTrashed()->forceDelete();
        
        return redirect()->route('trash.index')
            ->with('success', 'Корзина очищена');
    }
}