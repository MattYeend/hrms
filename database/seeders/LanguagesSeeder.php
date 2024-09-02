<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'name' => 'English',
                'country_of_origin' => 'England'
            ],
            [
                'name' => 'Welsh',
                'country_of_origin' => 'Wales'
            ],
            [
                'name' => 'Gaelic (Irish)',
                'country_of_origin' => 'Ireland'
            ],
            [
                'name' => 'Scottish Gaelic',
                'country_of_origin' => 'Scotland'
            ],
            [
                'name' => 'Scots',
                'country_of_origin' => 'Scotland'
            ],
            [
                'name' => 'Portuguese',
                'country_of_origin' => 'Portugal'
            ],
            [
                'name' => 'Spanish',
                'country_of_origin' => 'Spain'
            ],
            [
                'name' => 'Catalan',
                'country_of_origin' => 'Spain'
            ],
            [
                'name' => 'French',
                'country_of_origin' => 'France'
            ],
            [
                'name' => 'German',
                'country_of_origin' => 'Germany'
            ],
            [
                'name' => 'Dutch',
                'country_of_origin' => 'Netherlands'
            ],
            [
                'name' => 'Italian',
                'country_of_origin' => 'Italy'
            ],
            [
                'name' => 'Greek',
                'country_of_origin' => 'Greece'
            ],
            [
                'name' => 'Hungarian',
                'country_of_origin' => 'Hungary'
            ],
            [
                'name' => 'Icelandic',
                'country_of_origin' => 'Iceland'
            ],
            [
                'name' => 'Swedish',
                'country_of_origin' => 'Sweden'
            ],
            [
                'name' => 'Danish',
                'country_of_origin' => 'Denmark'
            ],
            [
                'name' => 'Finnish',
                'country_of_origin' => 'Finland'
            ],
            [
                'name' => 'Czech',
                'country_of_origin' => 'Czech Republic'
            ],
            [
                'name' => 'Norwegian',
                'country_of_origin' => 'Norway'
            ],
            [
                'name' => 'Russian',
                'country_of_origin' => 'Russia'
            ],
            [
                'name' => 'Mandarin',
                'country_of_origin' => 'China'
            ],
            [
                'name' => 'Hindi',
                'country_of_origin' => 'India'
            ],
            [
                'name' => 'Punjabi',
                'country_of_origin' => 'India And Pakistan'
            ],
            [
                'name' => 'Urdu',
                'country_of_origin' => 'India And Pakistan'
            ],
            [
                'name' => 'Bengali',
                'country_of_origin' => 'Bengal Region'
            ],
            [
                'name' => 'Japanese',
                'country_of_origin' => 'Japan'
            ],
            [
                'name' => 'Korean',
                'country_of_origin' => 'Korean Peninsula'
            ],
            [
                'name' => 'Thai',
                'country_of_origin' => 'Thailand'
            ],
            [
                'name' => 'Vietnamese',
                'country_of_origin' => 'Vietnam'
            ],
            [
                'name' => 'Nepali',
                'country_of_origin' => 'Nepal'
            ],
            [
                'name' => 'Turkish',
                'country_of_origin' => 'Turkey'
            ],
            [
                'name' => 'Arabic',
                'country_of_origin' => 'Arabian Peninsula'
            ],
            [
                'name' => 'Swahili',
                'country_of_origin' => 'East Africa'
            ],
            [
                'name' => 'Somali',
                'country_of_origin' => 'Somalia'
            ],
            [
                'name' => 'Yoruba',
                'country_of_origin' => 'Nigeria'
            ],
            [
                'name' => 'Maori',
                'country_of_origin' => 'New Zealand'
            ],
        ]);
    }
}
