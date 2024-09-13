<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_types')->insert([
            ['name' => 'Business'],
            ['name' => 'Educational'],
            ['name' => 'Finance'],
            ['name' => 'Music'],
            ['name' => 'News'],
            ['name' => 'Personal'],
            ['name' => 'Photography'],
            ['name' => 'Sports'],
            ['name' => 'Travel'],
            ['name' => 'HR Trends'],
            ['name' => 'Compliance and Legal Updates'],
            ['name' => 'Employee Management and Engagement'],
            ['name' => 'Hybrid Work Management'],
            ['name' => 'Learning and Development'],
            ['name' => 'Offboarding'],
            ['name' => 'Onboarding'],
            ['name' => 'Payroll and Benefits Management'],
            ['name' => 'Performance and Productivity'],
            ['name' => 'Recruitment and Talent Acquisition'],
            ['name' => 'Remote Work Management'],
            ['name' => 'Workforce Analytics'],
            ['name' => 'Workplace Culture and Well-being']
        ]);
    }
}
