<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class typologyFactory extends Factory
{

    public function definition()
    {
        return [
            'code' => fake()->regexify('[A-Z0-9]{5}'),
            'name' => fake()->words(rand(1, 3), true),
            'digital' => fake()->boolean(),
        ];
    }
}
