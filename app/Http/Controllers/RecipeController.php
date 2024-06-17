<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function create(): View
    {
        return view('recipes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'prep_time' => ['required'],
            'cook_time' => ['required'],
            'servings' => ['required'],
            'cuisine' => ['required'],
            'category' => ['required'], 
            'ingredient_list' => ['required'], 
            'instruction_list' => ['required'], 
            'note_list' => ['required'], 
            'tag_list' => ['nullable'], 
            'image' => ['required', File::types(['png', 'jpg', 'jpeg', 'webp'])],
        ]);

        $attributes['image'] = $request->image->store('recipes');

        $recipe = Auth::user()->recipes()->create(Arr::except($attributes, ['ingredient_list', 'instruction_list', 'note_list', 'tag_list']));
        
        foreach(json_decode($attributes['ingredient_list'], true) as $ingredient) {
            $recipe->ingredients()->create(['name' => $ingredient]);
        }

        foreach(json_decode($attributes['instruction_list'], true) as $instruction) {
            $recipe->instructions()->create(['text' => $instruction]);
        }

        foreach(json_decode($attributes['note_list'], true) as $note) {
            $recipe->notes()->create(['text' => $note]);
        }

        foreach(json_decode($attributes['tag_list'], true) as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $recipe->tags()->attach($tag);
        }

        return redirect('/recipes/' . $recipe->id);
    }

    public function show(Recipe $recipe): View
    {
        return view('recipes.show', ['recipe' => $recipe]);
    }
}