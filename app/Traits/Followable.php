<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Followable
{
    
    public function followers() : BelongsToMany 
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }

    public function followings() : BelongsToMany 
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    public function follow(User $user) : void
    {
        $this->followings()->syncWithoutDetaching($user);
    }

    public function unfollow(User $user) : void
    {
        $this->followings()->detach($user);
    }

    public function isFollowing(User $user) : bool
    {
        return $this->followings()->where('followed_id', $user->id)->exists();
    }

    public function getFollowersCount() : int 
    {
        return $this->followers()->count();
    }

    public function getFollowingsCount() : int 
    {
        return $this->followings()->count();
    }
}