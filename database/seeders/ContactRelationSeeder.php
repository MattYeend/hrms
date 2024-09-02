<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use App\Models\ContactRelation;
use Faker\Factory as Faker;

class ContactRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contact_relations')->insert([
            [
                'name' => 'Husband'
            ],
            [
                'name' => 'Wife'
            ],
            [
                'name' => 'Father'
            ],
            [
                'name' => 'Mother'
            ],
            [
                'name' => 'Bother'
            ],
            [
                'name' => 'Sister'
            ],
            [
                'name' => 'Grandfather (Paternal)'
            ],
            [
                'name' => 'Grandmother (Paternal)'
            ],
            [
                'name' => 'Grandfather (Maternal)'
            ],
            [
                'name' => 'Grandmother (Maternal)'
            ],
            [
                'name' => 'Partner'
            ],
            [
                'name' => 'Son'
            ],
            [
                'name' => 'Daughter'
            ],
            [
                'name' => 'Cousin'
            ],
            [
                'name' => 'Uncle (Paternal)'
            ],
            [
                'name' => 'Antie (Paternal)'
            ],
            [
                'name' => 'Uncle (Maternal)'
            ],
            [
                'name' => 'Antie (Maternal)'
            ]
        ]);
    }
}
