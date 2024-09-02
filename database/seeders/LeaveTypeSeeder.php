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
                'name' => 'PTO',
                'slug' => 'pto'
            ],
            [
                'name' => 'Sick Leave',
                'slug' => 'sick-leave'
            ],
            [
                'name' => 'Maternity Leave',
                'slug' => 'maternity-leave'
            ],
            [
                'name' => 'Paternity Leave',
                'slug' => 'paternity-leave'
            ],
            [
                'name' => 'Parental Leave',
                'slug' => 'parental-leave'
            ],
            [
                'name' => 'Bereavement Leave',
                'slug' => 'bereavement-leave'
            ],
            [
                'name' => 'Jury Duty',
                'slug' => 'jury-duty'
            ],
            [
                'name' => 'Military Leave',
                'slug' => 'military-leave'
            ],
            [
                'name' => 'Educational Leave',
                'slug' => 'educational-leave'
            ],
            [
                'name' => 'Unpaid Leave',
                'slug' => 'unpaid-leave'
            ],
            [
                'name' => 'Sabbatical',
                'slug' => 'sabbatical'
            ],
            [
                'name' => 'Adoption Leave',
                'slug' => 'adoption-leave'
            ],
            [
                'name' => 'Foster Care Leave',
                'slug' => 'foster-care-leave'
            ],
            [
                'name' => 'Community Service Leave',
                'slug' => 'community-service-leave'
            ],
            [
                'name' => 'Religious Leave',
                'slug' => 'religious-leave'
            ],
            [
                'name' => 'Wellness Leave',
                'slug' => 'wellness-leave'
            ],
            [
                'name' => 'Family Care Leave',
                'slug' => 'family-care-leave'
            ],
        ]);
    }
}
