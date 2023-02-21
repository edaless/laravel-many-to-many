<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->randomNumber(5, true),
            'name' => fake()->words(rand(1, 5), true),
            'description' => fake()->text(rand(50, 200)),
            'price' => fake()->numberBetween(0, 1000),
            'weight' => fake()->numberBetween(0, 100),
        ];
    }
}
