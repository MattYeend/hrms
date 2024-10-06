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
                'code' => 'OWN',
                'probation_length' => 0,
                'salary_range_id' => 1
            ],
            [
                'name' => 'Chief Executive Officer',
                'slug' => 'chief-executive-officer',
                'code' => 'CEO',
                'probation_length' => 12,
                'salary_range_id' => 1
            ],
            [
                'name' => 'Chief Operations Officer',
                'slug' => 'chief-operations-officer',
                'code' => 'COO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Financial Officer',
                'slug' => 'chief-financial-officer',
                'code' => 'CFO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Technology Officer',
                'slug' => 'chief-technology-officer',
                'code' => 'CTO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Marketing Officer',
                'slug' => 'chief-marketing-officer',
                'code' => 'CMO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Information Officer',
                'slug' => 'chief-information-officer',
                'code' => 'CIO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Compliance Officer',
                'slug' => 'chief-compliance-officer',
                'code' => 'CCO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Risk Officer',
                'slug' => 'chief-risk-officer',
                'code' => 'CRO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Data Officer',
                'slug' => 'chief-data-officer',
                'code' => 'CDO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Customer Officer',
                'slug' => 'chief-customer-officer',
                'code' => 'CCO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Strategy Officer',
                'slug' => 'chief-strategy-officer',
                'code' => 'CSO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Chief Engineering Officer',
                'slug' => 'chief-engineering-officer',
                'code' => 'CEO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Software Developer',
                'slug' => 'software-developer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Data Scientist',
                'slug' => 'data-scientist',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Network Administrator',
                'slug' => 'network-administrator',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Web Developer',
                'slug' => 'web-developer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Database Administrator',
                'slug' => 'database-administrator',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Accountant',
                'slug' => 'accountant',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Financial Analyst',
                'slug' => 'financial-analyst',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Auditor',
                'slug' => 'auditor',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Tax Advisor',
                'slug' => 'tax-advisor',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Risk Manager',
                'slug' => 'risk-manager',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'Controller',
                'slug' => 'controller',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'Budget Analyst',
                'slug' => 'budget-analyst',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 9
            ],
            [
                'name' => 'Civil Engineer',
                'slug' => 'civil-engineer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Mechanical Engineer',
                'slug' => 'mechanical-engineer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Electrical Engineer',
                'slug' => 'electrical-engineer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Chemical Engineer',
                'slug' => 'chemical-engineer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Structural Engineer',
                'slug' => 'structural-engineer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Environmental Engineer',
                'slug' => 'environmental-engineer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Photographer',
                'slug' => 'photographer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Musician',
                'slug' => 'musician',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Writer',
                'slug' => 'writer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Animator',
                'slug' => 'animator',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Marketer',
                'slug' => 'marketer',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Project Manager',
                'slug' => 'project-manager',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Sales Manager',
                'slug' => 'sales-manager',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Sales Associate',
                'slug' => 'sales-associate',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Customer Service Representative',
                'slug' => 'customer-service-representative',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Inventory Manager',
                'slug' => 'inventory-manager',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Floor Supervisor',
                'slug' => 'floor-supervisor',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Team Manager',
                'slug' => 'team-manager',
                'code' => NULL,
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
        ]);
    }
}