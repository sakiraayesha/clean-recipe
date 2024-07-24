<?php

namespace App\Http\Requests;

use App\Models\Recipe;
use App\TimeUnit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class StoreRecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', Recipe::class);
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'ingredients' => json_decode($this->ingredients_list, true),
            'instructions' => json_decode($this->instructions_list, true),
            'notes' => json_decode($this->notes_list, true),
            'tags' => json_decode($this->tags_list, true),
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:255'],
            'prep_time' => ['required', 'numeric'],
            'prep_time_unit' => ['required', Rule::enum(TimeUnit::class)],
            'cook_time' => ['required', 'numeric'],
            'cook_time_unit' => ['required', Rule::enum(TimeUnit::class)],
            'total_time' => ['required', 'numeric'],
            'servings' => ['required', 'numeric'],
            'cuisine' => ['required', 'max:50'],
            'category' => ['required', 'max:50'],
            'ingredients' => ['required', 'array'], 
            'instructions' => ['required', 'array'], 
            'notes' => ['nullable', 'array'], 
            'tags' => ['nullable', 'array'], 
            'image' => ['required', File::image()->types(['jpg', 'jpeg', 'png', 'webp'])->max(5120)],
        ];
    }
}
