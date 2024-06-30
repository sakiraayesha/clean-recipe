<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __invoke(): View
    {
        $recipes = Recipe::where('title', 'LIKE', '%' . request('q') . '%')
                        ->orWhere('category', 'LIKE', '%' . request('q') . '%')
                        ->orWhere('cuisine', 'LIKE', '%' . request('q') . '%')
                        ->orWhereRelation('tags', 'name', 'LIKE', '%' . request('q') . '%')
                        ->get();              

        return view('explore', ['type' => 'keyword', 'text' => request('q'), 'recipes' => $recipes]);                
    }
}
