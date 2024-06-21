<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() : View
    {
        $latestRecipes = Recipe::latest()->take(6)->get();

        $popularTags = Tag::withCount('recipes')->orderBy('recipes_count', 'desc')->take(10)->get();

        $trendingRecipes = Recipe::take(5)->get(); //temp
        
        $topChefs = User::withCount('recipes')->orderBy('recipes_count', 'desc')->with('profile')->take(10)->get(); //temp                 

        return view('home', [
            'latestRecipes' => $latestRecipes,
            'trendingRecipes' => $trendingRecipes,
            'topChefs' => $topChefs,
            'popularTags' => $popularTags,
        ]);
    }
}
