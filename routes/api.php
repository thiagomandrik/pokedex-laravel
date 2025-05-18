<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PokedexController;
use App\Http\Controllers\FavoriteController;

// Auth routes
Route::prefix('auth')->middleware('api')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

// Public pokedex routes
Route::prefix('pokedex')->group(function () {
    Route::get('', [PokedexController::class, 'listPokemons']);
    Route::get('{name}', [PokedexController::class, 'showPokemon']);
});

// Protected routes to manage favorite pokemons
Route::prefix('favorites')->middleware(['api', 'auth:api'])->group(function () {
    Route::post('{name}', [FavoriteController::class, 'store']);
    Route::delete('{name}', [FavoriteController::class, 'destroy']);
    Route::get('', [FavoriteController::class, 'index']);
});
