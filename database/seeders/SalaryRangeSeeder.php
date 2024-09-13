<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\SalaryRange;

class SalaryRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            SalaryRange::create([
                'lower_range' => $faker->numberBetween(18000, 44999),
                'upper_range' => $faker->numberBetween(45000, 100000)
            ]);
        }
    }
}