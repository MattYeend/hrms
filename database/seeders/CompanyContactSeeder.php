<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyContact;

class CompanyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyContact::factory()->count(1)->create();
    }
}
