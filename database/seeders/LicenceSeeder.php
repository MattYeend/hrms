<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;

class LicenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('licences')->insert([
            [
                'name' => 'Basic',
                'price' => '£49.99'
            ],
            [
                'name' => 'Bronze',
                'price' => '£149.99'
            ],
            [
                'name' => 'Silver',
                'price' => '£299.99'
            ],
            [
                'name' => 'Gold',
                'price' => '£499.99'
            ],
            [
                'name' => 'Platinum',
                'price' => '£999.99'
            ]
        ]);
    }
}