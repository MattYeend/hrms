<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompanyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('company_contacts')->insert([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'is_live' => false,
        ]);
    }
}