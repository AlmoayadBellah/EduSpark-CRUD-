<?php

namespace Database\Factories;

use App\Models\ProcurementFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProcurementFeature>
 */
class ProcurementFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake() -> sentence(3),
            'name' => fake()->sentence(3),
        ];
        
    }
}
