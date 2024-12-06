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
                'name' => 'Chief HR Officer',
                'slug' => 'chief-hr-officer',
                'code' => 'CHRO',
                'probation_length' => 12,
                'salary_range_id' => 2
            ],
            [
                'name' => 'Software Developer',
                'slug' => 'software-developer',
                'code' => 'SOF',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Data Scientist',
                'slug' => 'data-scientist',
                'code' => 'DAT',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Network Administrator',
                'slug' => 'network-administrator',
                'code' => 'NET',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Web Developer',
                'slug' => 'web-developer',
                'code' => 'WEB',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Database Administrator',
                'slug' => 'database-administrator',
                'code' => 'DBA',
                'probation_length' => 6,
                'salary_range_id' => 3
            ],
            [
                'name' => 'Accountant',
                'slug' => 'accountant',
                'code' => 'ACC',
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Financial Analyst',
                'slug' => 'financial-analyst',
                'code' => 'FIN',
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Auditor',
                'slug' => 'auditor',
                'code' => 'AUD',
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Tax Advisor',
                'slug' => 'tax-advisor',
                'code' => 'TAX',
                'probation_length' => 6,
                'salary_range_id' => 4
            ],
            [
                'name' => 'Risk Manager',
                'slug' => 'risk-manager',
                'code' => 'RIS',
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'Controller',
                'slug' => 'controller',
                'code' => 'CON',
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'Budget Analyst',
                'slug' => 'budget-analyst',
                'code' => 'BUD',
                'probation_length' => 6,
                'salary_range_id' => 9
            ],
            [
                'name' => 'Civil Engineer',
                'slug' => 'civil-engineer',
                'code' => 'CIV',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Mechanical Engineer',
                'slug' => 'mechanical-engineer',
                'code' => 'MEC',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Electrical Engineer',
                'slug' => 'electrical-engineer',
                'code' => 'ELE',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Chemical Engineer',
                'slug' => 'chemical-engineer',
                'code' => 'CHE',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Structural Engineer',
                'slug' => 'structural-engineer',
                'code' => 'STR',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Environmental Engineer',
                'slug' => 'environmental-engineer',
                'code' => 'ENV',
                'probation_length' => 6,
                'salary_range_id' => 5
            ],
            [
                'name' => 'Photographer',
                'slug' => 'photographer',
                'code' => 'PHO',
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Musician',
                'slug' => 'musician',
                'code' => 'MUS',
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Writer',
                'slug' => 'writer',
                'code' => 'WRI',
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Animator',
                'slug' => 'animator',
                'code' => 'ANI',
                'probation_length' => 6,
                'salary_range_id' => 6
            ],
            [
                'name' => 'Marketer',
                'slug' => 'marketer',
                'code' => 'MAR',
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Project Manager',
                'slug' => 'project-manager',
                'code' => 'PM',
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Sales Manager',
                'slug' => 'sales-manager',
                'code' => 'SM',
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Sales Associate',
                'slug' => 'sales-associate',
                'code' => 'SA',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Customer Service Representative',
                'slug' => 'customer-service-representative',
                'code' => 'CSR',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Inventory Manager',
                'slug' => 'inventory-manager',
                'code' => 'IM',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Floor Supervisor',
                'slug' => 'floor-supervisor',
                'code' => 'FS',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Team Manager',
                'slug' => 'team-manager',
                'code' => 'TM',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'Human Resources Manager',
                'slug' => 'human-resources-manager',
                'code' => 'HRM',
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'HR Generalist',
                'slug' => 'hr-generalist',
                'code' => 'HRG',
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'Recruitment Specialist',
                'slug' => 'recruitment-specialist',
                'code' => 'REC',
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'HR Coordinator',
                'slug' => 'hr-coordinator',
                'code' => 'HRC',
                'probation_length' => 6,
                'salary_range_id' => 9
            ],
            [
                'name' => 'Compensation and Benefits Specialist',
                'slug' => 'compensation-benefits-specialist',
                'code' => 'CBS',
                'probation_length' => 6,
                'salary_range_id' => 9
            ],
            [
                'name' => 'Training and Development Manager',
                'slug' => 'training-development-manager',
                'code' => 'TDM',
                'probation_length' => 6,
                'salary_range_id' => 7
            ],
            [
                'name' => 'Employee Relations Specialist',
                'slug' => 'employee-relations-specialist',
                'code' => 'ERS',
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'HR Analyst',
                'slug' => 'hr-analyst',
                'code' => 'HRA',
                'probation_length' => 6,
                'salary_range_id' => 8
            ],
            [
                'name' => 'HR Assistant',
                'slug' => 'hr-assistant',
                'code' => 'HRA',
                'probation_length' => 6,
                'salary_range_id' => 10
            ],
            [
                'name' => 'HR Director',
                'slug' => 'hr-director',
                'code' => 'HRD',
                'probation_length' => 12,
                'salary_range_id' => 6
            ],
        ]);
    }
}