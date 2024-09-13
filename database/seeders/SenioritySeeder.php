<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SenioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seniorities')->insert([
            ['name' => 'Senior'],
            ['name' => 'Mid'],
            ['name' => 'Junior'],
            ['name' => 'Intern']
        ]);
    }
}
