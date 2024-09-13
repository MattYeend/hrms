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
        $this->call(RolesSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(SenioritySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserContactSeeder::class);
        $this->call(ContactRelationSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(ContractSeeder::class);
        $this->call(LicenceSeeder::class);
        $this->call(CompanyContactSeeder::class);
        $this->call(AddressBookSeeder::class);
        $this->call(AddressContactSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(HolidayEntitlementSeeder::class);
        $this->call(SalaryRangeSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(NoteTypeSeeder::class);
        $this->call(LeaveTypeSeeder::class);
        $this->call(LeaveStatusSeeder::class);
        $this->call(BlogTypesSeeder::class);
        $this->call(BlogCategoriesSeeder::class);
    }
}
