<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_categories')->insert([
            ['name'=>'Business and Entrepreneurship'],
            ['name' => 'How To Start A Business'],
            ['name' => 'Marketing Strategies'],
            ['name' => 'Business Growth Tips'],
            ['name' => 'Case Studies and Success Stories'],
            
            ['name'=>'Career and Professional Development'],
            ['name' => 'CV Writing'],
            ['name' => 'Interview Tips'],
            ['name' => 'Career Transitions and Advice'],
            ['name' => 'Office Productivity'],
            
            ['name'=>'DIY and Crafts'],
            ['name' => 'Step-By-Step Craft Tutorials'],
            ['name' => 'Crafting For Kids'],
            ['name' => 'Homemade Gift Ideas'],
            ['name' => 'Craft Business Tips'],
            
            ['name'=>'Education'],
            ['name' => 'Study Tips and Learning Methods'],
            ['name' => 'Book Reviews and Recommendations'],
            ['name' => 'Online Courses and Certification Guides'],
            ['name' => 'Academic Success Stories'],
            
            ['name'=>'Entertainment'],
            ['name' => 'Movie, TV, and Book Reviews'],
            ['name' => 'Music Playlists and Recommendations'],
            ['name' => 'Pop Culture Analysis'],
            ['name' => 'Event and Concert Coverage'],
            
            ['name'=>'Food and Cooking'],
            ['name' => 'Recipes'],
            ['name' => 'Restaurant Reviews'],
            ['name' => 'Cooking Tips and Kitchen Hacks'],
            ['name' => 'Food Trends'],
            
            ['name'=>'Gaming'],
            ['name' => 'Game Reviews'],
            ['name' => 'Gaming News'],
            ['name' => 'Industry Updates'],
            ['name' => 'Gaming Tips and Strategies'],
            
            ['name'=>'Health and Fitness'],
            ['name' => 'Workout Routines'],
            ['name' => 'Healthy Eating'],
            ['name' => 'Mental Health Tips'],
            ['name' => 'Yoga, Meditation, and Mindfulness'],
            
            ['name'=>'Home and Garden'],
            ['name' => 'Interior Design'],
            ['name' => 'DIY Home Projects'],
            ['name' => 'Home Organisation'],
            ['name' => 'Gardening Tips Routines'],
            
            ['name'=>'Lifestyle'],
            ['name' => 'Daily Routines'],
            ['name' => 'Wellness and Self-care'],
            ['name' => 'Personal Development'],
            ['name' => 'Minimalism'],
            
            ['name'=>'Parenting and Family'],
            ['name' => 'Parenting Tips and Advice'],
            ['name' => 'Family Activities and Crafts'],
            ['name' => 'Work-Life Balance for Parents'],
            ['name' => 'Pregnancy and Newborn Care'],
            
            ['name'=>'Photography'],
            ['name' => 'Photography Tutorials'],
            ['name' => 'Camera and Gear Reviews'],
            ['name' => 'Travel Photography'],
            ['name' => 'Photo Challenges and Inspirations'],
            
            ['name'=>'Sports and Outdoors'],
            ['name' => 'Sports Analysis'],
            ['name' => 'Outdoor Adventures'],
            ['name' => 'Extreme Sports Content'],
            ['name' => 'Sports Gear Reviews'],

            ['name'=>'Technology'],
            ['name' => 'Product Reviews'],
            ['name' => 'Tech News and Innovations'],
            ['name' => 'Coding Tutorials'],
            ['name' => 'Tech Industry Insights'],

            ['name'=>'Travel'],
            ['name' => 'Travel Guides'],
            ['name' => 'Destination Reviews'],
            ['name' => 'Travel Tips'],
            ['name' => 'Cultural Experiences'],

            ['name'=>'Employee Engagement'],
            ['name' => 'Employee Self Service'],
            ['name' => 'Real Time Feedback'],
            ['name' => 'Employee Satisfaction'],
            ['name' => 'Communication and Collaboration'],

            ['name'=>'HR Technology'],
            ['name' => 'Latest HR Software and Tools'],
            ['name' => 'HR Tech Trends'],
            ['name' => 'AI and Automation'],
            ['name' => 'Integration'],

            ['name'=>'Payroll and Benefits'],
            ['name' => 'Streamlining Payroll'],
            ['name' => 'Benefits Administration Tools'],
            ['name' => 'Compliance With Payroll Regulations'],
            ['name' => 'Payroll Automation'],

            ['name'=>'Performance Management'],
            ['name' => 'Performance Evaluation Systems'],
            ['name' => 'Goal Setting and Tracking'],
            ['name' => 'Competency Frameworks'],
            ['name' => 'Linking Performance To Rewards'],

            ['name'=>'Remote Work Solutions'],
            ['name' => 'Managing A Remote Workforce'],
            ['name' => 'Virtual Onboarding and Training'],
            ['name' => 'Remote Performance Tracking Tools'],
            ['name' => 'Security and Data Management'],

            ['name'=>'Talent Management'],
            ['name' => 'Recruitment and Applicant Tracking'],
            ['name' => 'Employee Onboarding Software'],
            ['name' => 'Succession Planning'],
            ['name' => 'Performance Appraisal Systems'],

            ['name'=>'Time and Attendance'],
            ['name' => 'Attendance Tracking'],
            ['name' => 'Leave Management'],
            ['name' => 'Scheduling and Shift Management'],
            ['name' => 'Remote Workforce Attendance'],
        ]);
    }
}
