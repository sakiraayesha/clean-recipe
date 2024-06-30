<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\View\View;

class ExploreController extends Controller
{
    public function __invoke(String $topic): View
    {
        $recipes = Recipe::where('category', $topic)
                        ->orWhere('cuisine', $topic)
                        ->get();

        return view('explore', ['type' => 'topic', 'text' => $topic, 'recipes' => $recipes]);                
    }
}
