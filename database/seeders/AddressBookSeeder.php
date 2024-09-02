<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class AddressBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('address_books')->insert([
            [
                'first_line' => $faker->streetAddress,
                'town' => $faker->city,
                'city' => $faker->city,
                'country' => $faker->country,
                'post_code' => $faker->postcode,
                'head_office' => 1,
                'address_contact_id' => 1
            ]
        ]);
    }
}