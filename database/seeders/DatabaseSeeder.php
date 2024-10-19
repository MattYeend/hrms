<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AddressBookSeeder::class);
        $this->call(AddressContactSeeder::class);
        $this->call(BlogCategoriesSeeder::class);
        $this->call(BlogTypesSeeder::class);
        $this->call(CompanyContactSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(ContactRelationSeeder::class);
        $this->call(ContractSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(HolidayEntitlementSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(LeaveStatusSeeder::class);
        $this->call(LeaveTypeSeeder::class);
        $this->call(LicenceSeeder::class);
        $this->call(MeetingTypesSeeder::class);
        $this->call(NoteTypeSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(SalaryRangeSeeder::class);
        $this->call(SenioritySeeder::class);
        $this->call(UserContactSeeder::class);
        $this->call(UserSeeder::class);
    }
}
