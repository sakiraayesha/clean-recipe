<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FollowRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store(FollowRequest $request): JsonResponse
    {
        return Auth::user()->toggleFollow($request->followable);
    }

    public function destroy(FollowRequest $request): JsonResponse
    {
        return Auth::user()->toggleFollow($request->followable);
    }
}