<?php

namespace App\Models;

use App\Contracts\LikeInterface;
use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model implements LikeInterface
{
    use HasFactory, Likeable;

    protected $fillable = [
        'title',
        'description',
        'prep_time',
        'cook_time',
        'servings',
        'cuisine',
        'category',
        'image',
        'pinned',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients() : HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    public function instructions() : HasMany
    {
        return $this->hasMany(Instruction::class);
    }

    public function notes() : HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function tags() : BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }
}