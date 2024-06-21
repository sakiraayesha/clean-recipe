<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
});

Route::delete('/logout', [LoginController::class, 'destroy'])->middleware('auth');

// Profile
Route::get('/profile/{id}', [ProfileController::class, 'show']);

// Recipe
Route::middleware('auth')->group(function () {
    Route::get('/recipes/create', [RecipeController::class, 'create'])->middleware('auth');
    Route::post('/recipes', [RecipeController::class, 'store'])->middleware('auth');
});

Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);