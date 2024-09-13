<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leave_types')->insert([
            [
                'name' => 'Adoption Leave',
                'slug' => 'adoption-leave'
            ],
            [
                'name' => 'Bereavement Leave',
                'slug' => 'bereavement-leave'
            ],
            [
                'name' => 'Community Service Leave',
                'slug' => 'community-service-leave'
            ],
            [
                'name' => 'Educational Leave',
                'slug' => 'educational-leave'
            ],
            [
                'name' => 'Family Care Leave',
                'slug' => 'family-care-leave'
            ],
            [
                'name' => 'Foster Care Leave',
                'slug' => 'foster-care-leave'
            ],
            [
                'name' => 'Jury Duty',
                'slug' => 'jury-duty'
            ],
            [
                'name' => 'Maternity Leave',
                'slug' => 'maternity-leave'
            ],
            [
                'name' => 'Military Leave',
                'slug' => 'military-leave'
            ],
            [
                'name' => 'Parental Leave',
                'slug' => 'parental-leave'
            ],
            [
                'name' => 'Paternity Leave',
                'slug' => 'paternity-leave'
            ],
            [
                'name' => 'PTO',
                'slug' => 'pto'
            ],
            [
                'name' => 'Religious Leave',
                'slug' => 'religious-leave'
            ],
            [
                'name' => 'Sabbatical',
                'slug' => 'sabbatical'
            ],
            [
                'name' => 'Sick Leave',
                'slug' => 'sick-leave'
            ],
            [
                'name' => 'Time Off In Lieu',
                'slug' => 'time-off-in-lieu'
            ],
            [
                'name' => 'Unpaid Leave',
                'slug' => 'unpaid-leave'
            ],
            [
                'name' => 'Wellness Leave',
                'slug' => 'wellness-leave'
            ]
        ]);
    }
}
