<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'content' => fake()->text(),
            'luggage' => fake()->numberBetween($min = 5, $max = 15),
            'doors' => fake()->numberBetween($min = 2, $max = 5),
            'passenger' => fake()->numberBetween($min = 20, $max = 30),
            'price' => fake()->numberBetween($min = 350, $max = 900),
            'published' => 1,
            'image' => fake()->imageUrl(800,600),
            'category_id' => fake()->numberBetween($min = 1, $max = 2),
        ];
    }
}
