<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'status' => $this->faker->boolean,
            'type' =>1,
        ];
    }
}
