<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\JsonResponse;

interface LikeInterface
{
    public function likes(): MorphMany;

    public function like(User $user): void;

    public function unlike(User $user): void;

    public function toggleLike(User $user): JsonResponse;

    public function isLikedBy(User $user): bool;

    public function getLikesCount(): int;
}