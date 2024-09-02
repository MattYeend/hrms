<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HolidayEntitlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('holiday_entitlements')->insert([
            [
                'total' => 28,
                'year_start' => now(),
                'year_end' => Carbon::now()->addYear(),
            ]
        ]);
    }
}