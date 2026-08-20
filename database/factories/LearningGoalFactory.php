<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LearningGoalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'description' => fake()->sentence(10),
        ];
    }
}