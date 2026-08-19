<?php

namespace Database\Seeders;

use App\Models\ProcurementFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcurementFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               ProcurementFeature::factory()->count(20)->create();

    }
}
