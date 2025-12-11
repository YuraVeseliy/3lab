<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TrashController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('players.index');
});

Route::resource('players', PlayerController::class);

// корзина
Route::prefix('trash')->name('trash.')->group(function () {
    Route::get('/', [TrashController::class, 'index'])->name('index');
    Route::post('/restore/{id}', [TrashController::class, 'restore'])->name('restore');
    Route::delete('/force-delete/{id}', [TrashController::class, 'forceDelete'])->name('force-delete');
    Route::delete('/empty', [TrashController::class, 'empty'])->name('empty');
});