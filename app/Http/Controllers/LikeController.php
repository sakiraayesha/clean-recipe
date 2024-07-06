<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LikeController extends Controller
{
    public function store(): JsonResponse
    {
        $attributes = request()->validate([
            'likeable_type' => ['required'],
            'likeable_id' => ['required', Rule::exists(request()->likeable_type, 'id')],
        ]);
        
        $likeable = $attributes['likeable_type']::find($attributes['likeable_id']);

        return $likeable->toggleLike(Auth::user());   
    }

    public function destroy(): JsonResponse
    {
        $attributes = request()->validate([
            'likeable_type' => ['required'],
            'likeable_id' => ['required', Rule::exists(request()->likeable_type, 'id')],
        ]);
        
        $likeable = $attributes['likeable_type']::find($attributes['likeable_id']);

        return $likeable->toggleLike(Auth::user());
    }
}