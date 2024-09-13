<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('departments')->insert([
            [
                'name' => 'C Suite',
                'slug' => 'c-suite',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Human Resources',
                'slug' => 'human-resources',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Finance',
                'slug' => 'finance',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Accounting',
                'slug' => 'accounting',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Sales',
                'slug' => 'sales',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Customer Service',
                'slug' => 'customer-service',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Information Technology',
                'slug' => 'information-technology',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Operations',
                'slug' => 'operations',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Research And Development',
                'slug' => 'research-and-development',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Legal',
                'slug' => 'legal',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Public Relations',
                'slug' => 'public-relations',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Purchasing',
                'slug' => 'purchasing',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Quality Assurance',
                'slug' => 'quality-assurance',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Compliance',
                'slug' => 'compliance',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Facilities Management',
                'slug' => 'facilities-management',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Product Management',
                'slug' => 'product-management',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ],
            [
                'name' => 'Project Management',
                'slug' => 'project-management',
                'company_id' => 1,
                'dept_lead_id' => $faker->numberBetween(1,20)
            ]
        ]);
    }
}
