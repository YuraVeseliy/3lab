<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('place')->get();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'full_description' => 'required|string',
            'achievements' => 'required|string',
            'place' => 'required|integer|min:1|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('players', 'public');
            $validated['image_path'] = $path;
        }

        Player::create($validated);

        return redirect()->route('players.index')
            ->with('success', 'Футболист успешно добавлен!');
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'full_description' => 'required|string',
            'achievements' => 'required|string',
            'place' => 'required|integer|min:1|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Удаляем старое изображение
            if ($player->image_path) {
                Storage::disk('public')->delete($player->image_path);
            }
            
            $path = $request->file('image')->store('players', 'public');
            $validated['image_path'] = $path;
        }

        $player->update($validated);

        return redirect()->route('players.index')
            ->with('success', 'Футболист успешно обновлен!');
    }

    public function destroy(Player $player)
    {
        // Удаляем изображение если есть
        if ($player->image_path) {
            Storage::disk('public')->delete($player->image_path);
        }

        $player->delete();

        return redirect()->route('players.index')
            ->with('success', 'Футболист успешно удален!');
    }
}