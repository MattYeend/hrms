<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'Test Company',
                'pay_day' => 28,
                'active' => 1,
                'contract_id' => 1,
                'company_contact_id' => 1,
                'address_book_id' => 1,
                'company_relationship_manager' => 1
            ]
        ]);
    }
}