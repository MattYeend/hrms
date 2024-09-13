<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'price' => '£99.99'
            ],
            [
                'name' => 'Bronze',
                'price' => '£249.99'
            ],
            [
                'name' => 'Silver',
                'price' => '£599.99'
            ],
            [
                'name' => 'Gold',
                'price' => '£999.99'
            ],
            [
                'name' => 'Platinum',
                'price' => '£2999.99'
            ]
        ]);
    }
}