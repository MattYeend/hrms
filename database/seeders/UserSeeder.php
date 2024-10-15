<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Matt Yeend',
            'email' => 'matt@test.com',
            'password' => Hash::make('password123'),
            'phone' => '01234567891',
            'salary' => 50000,
            'first_line' => '1 Test Street',
            'country' => 'UK',
            'post_code' => 'TE3 1ED',
            'full_or_part' => 'Full Time',
            'region' => 'Midlands',
            'timezone' => 'Europe/London',
            'dark_mode' => false,
            'start_date' => NOW(),
            'department_id' => 1,
            'roles_id' => 1,
            'seniority_id' => 1,
            'job_id' => 1,
            'holiday_entitlement_id' => 1,
            'contact_id' => 1
        ]);

        $fakerUS = Faker::create('en_US');
        $fakerSpain = Faker::create('es_ES');
        $fakerItaly = Faker::create('it_IT');
        $fakerFrance = Faker::create('fr_FR');
        
        $regionsUS = ['California', 'New York', 'Texas', 'Florida', 'Illinois', 'Pennsylvania'];
        $timezonesUSA = ['America/Los_Angeles', 'America/New_York', 'America/Chicago', 'America/Denver', 'America/Anchorage', 'Pacific/Honolulu'];
        $firstLinesUS = ['123 Elm St','456 Maple Ave','789 Oak Dr','101 Pine Rd','202 Birch Blvd'];
        $townsUS = ['Springfield','Rivertown','Centerville','Lakewood','Greenfield'];
        $citiesUS = ['Springfield','Rivertown','Centerville','Lakewood','Greenfield'];
        $countriesUS = ['United States'];
        $postCodesUS = ['62704','12345','54321','67890','24680'];
        
        $regionsSpain = ['Andalucía', 'Cataluña', 'Madrid', 'Valencia', 'Galicia', 'Castilla y León', 'País Vasco', 'Canarias'];
        $timezonesSpain = ['Europe/Madrid', 'Europe/Barcelona', 'Atlantic/Canary'];
        $firstLinesSpain = ['Calle Mayor 1','Avenida de la Constitución 25','Plaza del Sol 8','Calle del Carmen 10','Ronda de Valencia 5'];
        $townsSpain = ['Madrid','Barcelona','Valencia','Seville','Granada'];
        $citiesSpain = ['Madrid','Barcelona','Valencia','Seville','Granada'];
        $countriesSpain = ['España'];
        $postCodesSpain = ['28001','08002','46001','41001','18001'];
        
        $regionsItaly = ['Lazio', 'Lombardia', 'Sicilia', 'Campania', 'Veneto', 'Toscana', 'Puglia', 'Piemonte'];
        $timezonesItaly = ['Europe/Rome'];
        $firstLinesItaly = ['Via Roma 10','Piazza Navona 5','Corso Vittorio Emanuele II 12','Via della Repubblica 8','Viale Europa 3'];
        $townsItaly = ['Rome','Milan','Naples','Turin','Florence'];
        $citiesItaly = ['Rome','Milan','Naples','Turin','Florence'];
        $countriesItaly = ['Italia'];
        $postCodesItaly = ['00184','20121','80121','10121','50123'];
        
        $regionsFrance = ['Île-de-France', 'Provence-Alpes-Côte d\'Azur', 'Nouvelle-Aquitaine', 'Occitanie', 'Brittany', 'Normandy', 'Hauts-de-France'];
        $timezonesFrance = ['Europe/Paris'];
        $firstLinesFrance = ['10 Rue de la République','25 Boulevard Saint-Germain','8 Place de la Bastille','12 Avenue des Champs-Élysées'];
        $townsFrance = ['Paris','Lyon','Marseille','Toulouse'];
        $citiesFrance = ['Paris','Lyon','Marseille','Toulouse'];
        $countriesFrance = ['France'];
        $postCodesFrance = ['75001','69001','13001','31000'];

        for($i = 0; $i < 50; $i++){
            User::create([
                'name' => $fakerUS->name,
                'email' => $fakerUS->unique()->safeEmail,
                'password' => Hash::make('password'),
                'phone' => $fakerUS->phoneNumber,
                'salary' => $fakerUS->numberBetween(18000, 50000),
                'first_line' => $fakerUS->randomElement($firstLinesUS),
                'town' => $fakerUS->randomElement($townsUS),
                'city' => $fakerUS->randomElement($citiesUS),
                'country' => $fakerUS->randomElement($countriesUS),
                'post_code' => $fakerUS->randomElement($postCodesUS),
                'full_or_part' => $fakerUS->randomElement(['Full Time', 'Part Time']),
                'region' => $fakerUS->randomElement($regionsUS),
                'timezone' => $fakerUS->randomElement($timezonesUSA),
                'dark_mode' => false,
                'start_date' => NOW(),
                'department_id' => $fakerUS->numberBetween(2, 18),
                'roles_id' => $fakerUS->numberBetween(2,3),
                'seniority_id' => $fakerUS->numberBetween(1,4),
                'job_id' => $fakerUS->numberBetween(2, 45),
                'holiday_entitlement_id' => 1,
                'contact_id' => $fakerUS->numberBetween(1, 100)
            ]);
        }
        
        for($i = 0; $i < 50; $i++){
            User::create([
                'name' => $fakerSpain->name,
                'email' => $fakerSpain->unique()->safeEmail,
                'password' => Hash::make('password'),
                'phone' => $fakerSpain->phoneNumber,
                'salary' => $fakerSpain->numberBetween(18000, 50000),
                'first_line' => $fakerSpain->randomElement($firstLinesSpain),
                'town' => $fakerSpain->randomElement($townsSpain),
                'city' => $fakerSpain->randomElement($citiesSpain),
                'country' => $fakerSpain->randomElement($countriesSpain),
                'post_code' => $fakerSpain->randomElement($postCodesSpain),
                'full_or_part' => $fakerSpain->randomElement(['Full Time', 'Part Time']),
                'region' => $fakerSpain->randomElement($regionsSpain),
                'timezone' => $fakerSpain->randomElement($timezonesSpain),
                'dark_mode' => false,
                'start_date' => NOW(),
                'department_id' => $fakerSpain->numberBetween(2, 18),
                'roles_id' => $fakerSpain->numberBetween(2,3),
                'seniority_id' => $fakerSpain->numberBetween(1,4),
                'job_id' => $fakerSpain->numberBetween(2, 45),
                'holiday_entitlement_id' => 1,
                'contact_id' => $fakerSpain->numberBetween(1, 100)
            ]);
        }
        
        for($i = 0; $i < 50; $i++){
            User::create([
                'name' => $fakerItaly->name,
                'email' => $fakerItaly->unique()->safeEmail,
                'password' => Hash::make('password'),
                'phone' => $fakerItaly->phoneNumber,
                'salary' => $fakerItaly->numberBetween(18000, 50000),
                'first_line' => $fakerItaly->randomElement($firstLinesItaly),
                'town' => $fakerItaly->randomElement($townsItaly),
                'city' => $fakerItaly->randomElement($citiesItaly),
                'country' => $fakerItaly->randomElement($countriesItaly),
                'post_code' => $fakerItaly->randomElement($postCodesItaly),
                'full_or_part' => $fakerItaly->randomElement(['Full Time', 'Part Time']),
                'region' => $fakerItaly->randomElement($regionsItaly),
                'timezone' => $fakerItaly->randomElement($timezonesItaly),
                'dark_mode' => false,
                'start_date' => NOW(),
                'department_id' => $fakerItaly->numberBetween(2, 18),
                'roles_id' => $fakerItaly->numberBetween(2,3),
                'seniority_id' => $fakerItaly->numberBetween(1,4),
                'job_id' => $fakerItaly->numberBetween(2, 45),
                'holiday_entitlement_id' => 1,
                'contact_id' => $fakerItaly->numberBetween(1, 100)
            ]);
        }
        
        for($i = 0; $i < 50; $i++){
            User::create([
                'name' => $fakerFrance->name,
                'email' => $fakerFrance->unique()->safeEmail,
                'password' => Hash::make('password'),
                'phone' => $fakerFrance->phoneNumber,
                'salary' => $fakerFrance->numberBetween(18000, 50000),
                'first_line' => $fakerFrance->randomElement($firstLinesFrance),
                'town' => $fakerFrance->randomElement($townsFrance),
                'city' => $fakerFrance->randomElement($citiesFrance),
                'country' => $fakerFrance->randomElement($countriesFrance),
                'post_code' => $fakerFrance->randomElement($postCodesFrance),
                'full_or_part' => $fakerFrance->randomElement(['Full Time', 'Part Time']),
                'region' => $fakerFrance->randomElement($regionsFrance),
                'timezone' => $fakerFrance->randomElement($timezonesFrance),
                'dark_mode' => false,
                'start_date' => NOW(),
                'department_id' => $fakerFrance->numberBetween(2, 18),
                'roles_id' => $fakerFrance->numberBetween(2,3),
                'seniority_id' => $fakerFrance->numberBetween(1,4),
                'job_id' => $fakerFrance->numberBetween(2, 45),
                'holiday_entitlement_id' => 1,
                'contact_id' => $fakerFrance->numberBetween(1, 100)
            ]);
        }
    }
}