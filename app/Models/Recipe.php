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
        'prep_time_unit',
        'cook_time',
        'cook_time_unit',
        'total_time',
        'servings',
        'cuisine',
        'category',
        'image',
        'pinned',
        'featured',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    public function storeIngredients(array $ingredients): void
    {
        foreach ($ingredients as $ingredient) {
            $this->ingredients()->create(['name' => $ingredient]);
        }
    }

    public function instructions(): HasMany
    {
        return $this->hasMany(Instruction::class);
    }

    public function storeInstructions(array $instructions): void
    {
        foreach ($instructions as $instruction) {
            $this->instructions()->create(['text' => $instruction]);
        }
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function storeNotes(array $notes): void
    {
        foreach ($notes as $note) {
            $this->notes()->create(['text' => $note]);
        }
    }

    public function tags(): BelongsToMany 
    {
        return $this->belongsToMany(Tag::class);
    }

    public function storeTags(array $tags): void
    {
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $this->tags()->attach($tag);
        }
    }
}