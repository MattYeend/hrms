<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a specific user
        User::factory()->create([
            'title' => 'Mr',
            'first_name' => 'Matt',
            'last_name' => 'Yeend',
            'email' => 'matt@test.com',
            'password' => bcrypt('password123'),
            'phone' => '01234567891',
            'salary' => 50000,
            'first_line' => '1 Test Street',
            'country' => 'UK',
            'post_code' => 'TE3 1ED',
            'full_or_part' => 'Full Time',
            'region' => 'Midlands',
            'timezone' => 'Europe/London',
            'dark_mode' => false,
            'start_date' => now(),
            'remote_based' => 1,
            'is_live' => true,
            'department_id' => 1,
            'roles_id' => 1,
            'seniority_id' => 1,
            'job_id' => 1,
            'holiday_entitlement_id' => 1,
            'contact_id' => 1,
        ]);

        // Create region-specific users
        User::factory()->count(10)->us()->create();
        User::factory()->count(10)->spain()->create();
        User::factory()->count(10)->italy()->create();
        User::factory()->count(10)->france()->create();
    }
}
