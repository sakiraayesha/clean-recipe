<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'about',
        'image',
        'facebook',
        'instagram',
        'linkedin',
        'tiktok',
        'twitter',
        'youtube',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getSocials(): array
    {
        $socials = [];

        foreach(['facebook', 'instagram', 'linkedin', 'tiktok', 'twitter', 'youtube'] as $social) {
            if ($this->$social) {
                $socials[$social] = $this->$social;
            }
        }

        return $socials;
    }
}
