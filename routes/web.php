<?php

use App\Http\Controllers\FootballPlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FootballPlayerController::class, 'index'])->name('welcome');

Route::post('/football-players', [FootballPlayerController::class, 'store'])->name('football-players.store');