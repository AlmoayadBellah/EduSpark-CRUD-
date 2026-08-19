<?php

namespace Database\Seeders;

use App\Models\LearningGoal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        LearningGoal::factory()->count(5)->create();
    }
}
