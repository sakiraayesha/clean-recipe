<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\Note;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipe::factory(50)
                ->hasAttached(Tag::factory(3))
                ->has(Ingredient::factory(8))
                ->has(Instruction::factory(6))
                ->has(Note::factory(4))
                ->create();
    }
}
