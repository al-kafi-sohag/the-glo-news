<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'status' => $this->faker->boolean,
        ];
    }
}
