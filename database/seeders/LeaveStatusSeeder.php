<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leave_statuses')->insert([
            ['name' => 'Approved'],
            ['name' => 'Pending'],
            ['name' => 'Denied']
        ]);
    }
}
