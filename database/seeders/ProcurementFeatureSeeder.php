<?php

namespace Database\Seeders;

use App\Models\ProcurementFeature;
use Illuminate\Database\Seeder;

class ProcurementFeatureSeeder extends Seeder
{
    public function run(): void
    {
        ProcurementFeature::factory()
            ->count(10)
            ->create();
    }
}