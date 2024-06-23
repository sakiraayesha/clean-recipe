<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(Request $request) : void
    {
        $atrributes = $request->validate([
            'followed_id' => ['required', 'exists:users,id'],
        ]);

        Auth::user()->follow(User::find($atrributes['followed_id']));
    }

    public function destroy(Request $request) : void
    {
        $atrributes = $request->validate([
            'followed_id' => ['required', 'exists:users,id'],
        ]);

        Auth::user()->unfollow(User::find($atrributes['followed_id']));
    }
}