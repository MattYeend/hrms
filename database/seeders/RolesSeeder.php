<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Super Admin',
                'slug' => 'super-admin'
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'User',
                'slug' => 'user'
            ],
        ]);
    }
}
