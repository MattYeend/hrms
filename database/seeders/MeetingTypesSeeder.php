<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeetingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('meeting_types')->insert([
            [
                'name' => 'Action Review',
                'slug' => 'action-review',
            ],
            [
                'name' => 'Board',
                'slug' => 'board',
            ],
            [
                'name' => 'Brainstorming',
                'slug' => 'brainstorming',
            ],
            [
                'name' => 'Budget Review',
                'slug' => 'budget-review',
            ],
            [
                'name' => 'Catch Up',
                'slug' => 'catch-up',
            ],
            [
                'name' => 'Check In',
                'slug' => 'check-in',
            ],
            [
                'name' => 'Client Meeting',
                'slug' => 'client-meeting',
            ],
            [
                'name' => 'Client Update',
                'slug' => 'client-update',
            ],
            [
                'name' => 'Crisis Management',
                'slug' => 'crisis-management',
            ],
            [
                'name' => 'Exit Interview',
                'slug' => 'exit-interview',
            ],
            [
                'name' => 'Feedback',
                'slug' => 'feedback',
            ],
            [
                'name' => 'General',
                'slug' => 'general',
            ],
            [
                'name' => 'Interview',
                'slug' => 'interview',
            ],
            [
                'name' => 'Monthly Review',
                'slug' => 'monthly-review',
            ],
            [
                'name' => 'One-on-One',
                'slug' => 'one-on-one',
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
            ],
            [
                'name' => 'Performance Review',
                'slug' => 'performance-review',
            ],
            [
                'name' => 'Planning',
                'slug' => 'planning',
            ],
            [
                'name' => 'Project Kickoff',
                'slug' => 'project-kickoff',
            ],
            [
                'name' => 'Project Retrospective',
                'slug' => 'project-retrospective',
            ],
            [
                'name' => 'Quarterly Review',
                'slug' => 'quarterly-review',
            ],
            [
                'name' => 'Sales',
                'slug' => 'sales',
            ],
            [
                'name' => 'Stand Up',
                'slug' => 'stand-up',
            ],
            [
                'name' => 'Status Update',
                'slug' => 'status-update',
            ],
            [
                'name' => 'Team Building',
                'slug' => 'team-building',
            ],
            [
                'name' => 'Technical Review',
                'slug' => 'technical-review',
            ],
            [
                'name' => 'Training',
                'slug' => 'training',
            ],
            [
                'name' => 'Training and Development',
                'slug' => 'training-and-development',
            ],
            [
                'name' => 'Town Hall',
                'slug' => 'town-hall',
            ],
            [
                'name' => 'Visioning Session',
                'slug' => 'visioning-session',
            ],
            [
                'name' => 'Workshop',
                'slug' => 'workshop',
            ],
        ]);
    }
}
