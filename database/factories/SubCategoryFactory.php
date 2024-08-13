<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'c_id' => Category::factory(),
            'title' => $this->faker->word,
            'status' => $this->faker->boolean,
        ];
    }
}
