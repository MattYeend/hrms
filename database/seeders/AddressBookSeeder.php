<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AddressBook;

class AddressBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AddressBook::factory()->count(1)->create();
    }
}
