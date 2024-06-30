<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', HomeController::class);

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
});

Route::delete('/logout', [LoginController::class, 'destroy'])->middleware('auth');

// Profile
Route::get('/profiles/{profile}', [ProfileController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit']);
    Route::patch('/profiles/{profile}', [ProfileController::class, 'update']);
});

// Recipe
Route::middleware('auth')->group(function () {
    Route::get('/recipes/create', [RecipeController::class, 'create']);
    Route::post('/recipes', [RecipeController::class, 'store']);
});

Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

// Follow
Route::middleware('auth')->group(function () {
    Route::post('/follow', [FollowController::class, 'store']);
    Route::delete('/unfollow', [FollowController::class, 'destroy']);
});

// Search & Explore
Route::get('/search', SearchController::class);
Route::get('/explore/topics/{topic}', ExploreController::class);
Route::get('/tags/{tag}', TagController::class);