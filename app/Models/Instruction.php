<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instruction extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
    ];

    public function recipe() : BelongsTo {
        return $this->belongsTo(Recipe::class);
    }
}
