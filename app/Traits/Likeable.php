<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\JsonResponse;

trait Likeable
{
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function like(User $user): void
    {
        (new Like())->user()->associate($user)
                    ->likeable()->associate($this)
                    ->save();
    }

    public function unlike(User $user): void
    {
        $this->likes()->where('user_id', $user->id)->delete();        
    }

    public function toggleLike(User $user): JsonResponse
    {
        $this->isLikedBy($user) ? $this->unlike($user) : $this->like($user);

        return response()->json(['likes' => $this->getLikesCount()]);
    }

    public function isLikedBy(User $user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function getLikesCount(): int
    {
        return $this->likes()->count();
    }
}