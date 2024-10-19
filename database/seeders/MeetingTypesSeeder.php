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
                'name' => 'Interview',
                'slug' => 'interview',
            ],
            [
                'name' => 'Project Kickoff',
                'slug' => 'project-kickoff',
            ],
            [
                'name' => 'Status Update',
                'slug' => 'status-update',
            ],
            [
                'name' => 'Planning',
                'slug' => 'planning',
            ],
            [
                'name' => 'Brainstorming',
                'slug' => 'brainstorming',
            ],
            [
                'name' => 'Client Meeting',
                'slug' => 'client-meeting',
            ],
            [
                'name' => 'Training',
                'slug' => 'training',
            ],
            [
                'name' => 'Workshop',
                'slug' => 'workshop',
            ],
            [
                'name' => 'Town Hall',
                'slug' => 'town-hall',
            ],
            [
                'name' => 'Project Retrospective',
                'slug' => 'project-retrospective',
            ],
            [
                'name' => 'Board',
                'slug' => 'board',
            ],
            [
                'name' => 'Stand Up',
                'slug' => 'stand-up',
            ],
            [
                'name' => 'Team Building',
                'slug' => 'team-building',
            ],
            [
                'name' => 'Exit Interview',
                'slug' => 'exit-interview',
            ],
        ]);
    }
}
