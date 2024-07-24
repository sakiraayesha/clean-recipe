<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(Profile $profile): View
    {
        $recipes = $profile->user->recipes;
        $socials = $profile->getSocials();

        return view('profiles.show', ['profile' => $profile, 'recipes' => $recipes, 'socials' => $socials]);
    }

    public function edit(Profile $profile): View
    {
        return view('profiles.edit', ['profile' => $profile]);
    }

    public function update(Profile $profile): RedirectResponse
    {
        $userAttributes = request()->validate([
            'username' => ['required', 'max:50', Rule::unique('users')->ignore($profile->user_id)],
            'email' => ['required', 'email:rfc,dns', 'max:254', Rule::unique('users')->ignore($profile->user_id)],
        ]);

        if (request()->password) {
            $validatedPassword = request()->validate([
                'password' => ['required', 'confirmed', Password::min(6)],
            ]);

            $userAttributes['password'] = $validatedPassword['password'];            
        }

        $profileAttributes = request()->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'], 
            'bio' => ['nullable', 'max:255'],
            'facebook' => ['nullable', 'active_url'],
            'instagram' => ['nullable', 'active_url'],
            'linkedin' => ['nullable', 'active_url'],
            'tiktok' => ['nullable', 'active_url'],
            'twitter' => ['nullable', 'active_url'],
            'youtube' => ['nullable', 'active_url'],
        ]);

        if (request()->image) {
            $validatedImage = request()->validate([
                'image' => ['nullable', File::image()->types(['jpg', 'jpeg', 'png', 'webp'])->max(2048)],
            ]);

            $profileAttributes['image'] = $validatedImage['image']->store('profiles');
        }

        $profile->user->update($userAttributes);
        $profile->update($profileAttributes);

        return redirect('profiles/' . $profile->id);
    }
}