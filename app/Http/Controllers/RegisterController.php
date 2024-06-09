<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View 
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $userAttributes = $request->validate([
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $profileAttributes = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
        ]);

        $user = User::create($userAttributes);

        $user->profile()->create($profileAttributes);

        return redirect('/login')->withSuccess('Account successfully created! Please log in to share your recipes.');
    }
}
