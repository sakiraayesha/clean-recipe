<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function create(): View
    {
        return view('recipes.create');
    }

    public function store(StoreRecipeRequest $request): RedirectResponse
    {
        $attributes = $request->validated();
        
        $attributes['image'] = $attributes['image']->store('recipes');

        $recipe = Auth::user()->recipes()->create(Arr::except($attributes, ['ingredients', 'instructions', 'notes', 'tags']));

        $recipe->storeIngredients($attributes['ingredients']);
        $recipe->storeInstructions($attributes['instructions']);
        $recipe->storeNotes($attributes['notes']);
        $recipe->storeTags($attributes['tags']);

        return redirect('/recipes/' . $recipe->id);
    }

    public function show(Recipe $recipe): View
    {
        return view('recipes.show', ['recipe' => $recipe]);
    }
}