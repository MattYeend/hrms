<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Matt Yeend',
            'email' => 'matt@test.com',
            'password' => Hash::make('password123'),
            'phone' => '01234567891',
            'salary' => 50000,
            'first_line' => '1 Test Street',
            'country' => 'UK',
            'post_code' => 'TE3 1ED',
            'full_or_part' => 'full time',
            'department_id' => 1,
            'roles_id' => 1,
            'seniority_id' => 1,
            'job_id' => 1,
            'holiday_entitlement_id' => 1,
            'contact_id' => 1
        ]);

        $faker = Faker::create();
        for($i = 0; $i < 19; $i++){
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'phone' => $faker->phoneNumber,
                'salary' => $faker->numberBetween(18000, 50000),
                'first_line' => $faker->streetAddress,
                'town' => $faker->city,
                'city' => $faker->city,
                'country' => $faker->country,
                'post_code' => $faker->postcode,
                'full_or_part' => 'full time',
                'department_id' => $faker->numberBetween(2, 18),
                'roles_id' => $faker->numberBetween(2,3),
                'seniority_id' => $faker->numberBetween(1,4),
                'job_id' => $faker->numberBetween(2, 44),
                'holiday_entitlement_id' => 1,
                'contact_id' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}