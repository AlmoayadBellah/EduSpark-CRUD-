<?php

namespace Database\Factories;

use App\Models\LearningGoal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LearningGoal>
 */
class LearningGoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'name' => fake()->sentence(3),
            'description' => fake()->sentence(15),
        ];
    }
}
