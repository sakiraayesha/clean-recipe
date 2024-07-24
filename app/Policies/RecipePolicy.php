<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RecipePolicy
{
    public function create(User $user): bool
    {
        return $user->id === Auth::id();
    }

    public function edit(User $user, Recipe $recipe): bool
    {
        return $user->id === $recipe->user_id;
    }
}
