<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Language>
 */
class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
    {
        $languages = [
            ['code' => 'en', 'name' => 'English'],
            ['code' => 'ar', 'name' => 'Arabic'],
            ['code' => 'fr', 'name' => 'French'],
            ['code' => 'de', 'name' => 'German'],
            ['code' => 'es', 'name' => 'Spanish'],
            ['code' => 'it', 'name' => 'Italian'],
            ['code' => 'pt', 'name' => 'Portuguese'],
            ['code' => 'tr', 'name' => 'Turkish'],
        ];

        return fake()->randomElement($languages);
    }
}
