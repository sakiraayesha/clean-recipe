<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(string $id): View
    {
        return view('profile.show', ['profile' => User::findOrFail($id)->profile]);
    }
}
