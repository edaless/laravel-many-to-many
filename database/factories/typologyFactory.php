<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class typologyFactory extends Factory
{

    public function definition()
    {
        return [
            'code' => fake()->randomNumber(5, true),
            'name' => fake()->words(rand(1, 3), true),
            'digital' => fake()->boolean(),
        ];
    }
}
