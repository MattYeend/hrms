<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AddressContact;

class AddressContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AddressContact::factory()->count(1)->create();
    }
}
