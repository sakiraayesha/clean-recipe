<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imgURL = [
            'https://images.pexels.com/photos/2097090/pexels-photo-2097090.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/792027/pexels-photo-792027.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/5191848/pexels-photo-5191848.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/2205270/pexels-photo-2205270.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/3071821/pexels-photo-3071821.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ];

        return [
            'user_id' => User::all()->random()->id,
            'title' => fake()->text(100),
            'description' => fake()->paragraph(3),
            'prep_time' => fake()->numberBetween(5, 120) . ' mins',
            'cook_time' => fake()->numberBetween(10, 180) . ' mins',
            'servings' => fake()->numberBetween(1, 20),
            'cuisine' => fake()->randomElement(['Mexican', 'Italian', 'Japanese', 'Indian', 'Thai', 'French']),
            'category' => fake()->randomElement(['Breakfast', 'Brunch', 'Lunch', 'Dinner', 'Salad', 'Dessert']),
            //'image' => fake()->imageUrl(),
            'image' => $imgURL[rand(0, 4)],
        ];
    }
}
