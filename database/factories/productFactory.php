<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
{

    public function definition()
    {
        return [
            'code' => fake()->randomNumber(5, true),
            'name' => fake()->words(rand(1, 3), true),
            'description' => fake()->text(rand(50, 200)),
            'price' => fake()->numberBetween(0, 1000),
            'weight' => fake()->numberBetween(0, 100),
        ];
    }
}
