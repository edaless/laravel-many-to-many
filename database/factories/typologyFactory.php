<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class typologyFactory extends Factory
{

    public function definition()
    {
        return [
            'code' => fake()->randomNumber(5, true),
            'name' => fake()->words(rand(1, 5), true),
            'digital' => fake()->boolean(),
        ];
    }
}
