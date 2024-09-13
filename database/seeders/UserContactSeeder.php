<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\UserContact;
use Faker\Factory as Faker;

class UserContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 20; $i++){
            UserContact::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'first_line' => $faker->streetAddress,
                'city' => $faker->city,
                'country' => $faker->country,
                'post_code' => $faker->postcode,
                'relation_id' => $faker->numberBetween(1, 18)
            ]);
        }
    }
}