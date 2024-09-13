<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job')->insert([
            [
                'name' => 'Owner',
                'slug' => 'owner',
                'probation_length' => 0,
                'salary_range_id' => 1
            ],
            [
                'name' => 'Chief Executive Officer',
                'slug' => 'chief-executive-officer',
                'probation_length' => 12,
                'salary_range_id' => 1
            ],
            [
                'name' => 'Chief Operations Officer',
                'slug' => 'chief-operations-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Financial Officer',
                'slug' => 'chief-financial-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Technology Officer',
                'slug' => 'chief-technology-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Marketing Officer',
                'slug' => 'chief-marketing-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Information Officer',
                'slug' => 'chief-information-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Compliance Officer',
                'slug' => 'chief-compliance-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Risk Officer',
                'slug' => 'chief-risk-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Data Officer',
                'slug' => 'chief-data-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Customer Officer',
                'slug' => 'chief-customer-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Strategy Officer',
                'slug' => 'chief-strategy-officer',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Software Developer',
                'slug' => 'software-developer',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Data Scientist',
                'slug' => 'data-scientist',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Network Administrator',
                'slug' => 'network-administrator',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Web Developer',
                'slug' => 'web-developer',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Database Administrator',
                'slug' => 'database-administrator',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Accountant',
                'slug' => 'accountant',
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Financial Analyst',
                'slug' => 'financial-analyst',
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Auditor',
                'slug' => 'auditor',
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Tax Advisor',
                'slug' => 'tax-advisor',
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Risk Manager',
                'slug' => 'risk-manager',
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'Controller',
                'slug' => 'controller',
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'Budget Analyst',
                'slug' => 'budget-analyst',
                'probation_length' => 6,
                'salary_range_id' => 9
            ],
            [
                'name' => 'Civil Engineer',
                'slug' => 'civil-engineer',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Mechanical Engineer',
                'slug' => 'mechanical-engineer',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Electrical Engineer',
                'slug' => 'electrical-engineer',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Chemical Engineer',
                'slug' => 'chemical-engineer',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Structural Engineer',
                'slug' => 'structural-engineer',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Environmental Engineer',
                'slug' => 'environmental-engineer',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Photographer',
                'slug' => 'photographer',
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Musician',
                'slug' => 'musician',
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Writer',
                'slug' => 'writer',
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Animator',
                'slug' => 'animator',
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Marketer',
                'slug' => 'marketer',
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Project Manager',
                'slug' => 'project-manager',
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Sales Manager',
                'slug' => 'sales-manager',
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Sales Associate',
                'slug' => 'sales-associate',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Customer Service Representative',
                'slug' => 'customer-service-representative',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Inventory Manager',
                'slug' => 'inventory-manager',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Floor Supervisor',
                'slug' => 'floor-supervisor',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Team Manager',
                'slug' => 'team-manager',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
        ]);
    }
}