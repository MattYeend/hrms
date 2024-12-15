<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SalaryRange;

class SalaryRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalaryRange::factory()->count(10)->create();
    }
}