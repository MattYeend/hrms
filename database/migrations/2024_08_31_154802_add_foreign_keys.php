<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table){
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('seniority_id')->references('id')->on('seniorities')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('job')->onDelete('cascade');
            $table->foreign('holiday_entitlement_id')->references('id')->on('holiday_entitlements')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('user_contacts')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('roles', function (Blueprint $table){
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('achievements', function (Blueprint $table){
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('leaves', function (Blueprint $table){
            $table->foreign('status_id')->references('id')->on('leave_statuses')->onDelete('cascade');
            $table->foreign('status_change_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('user_contacts', function (Blueprint $table){
            $table->foreign('relation_id')->references('id')->on('contact_relations')->onDelete('cascade');
        });

        Schema::table('licences', function (Blueprint $table){
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('departments', function (Blueprint $table){            
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('dept_lead_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('companies', function (Blueprint $table){
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->foreign('company_contact_id')->references('id')->on('company_contacts')->onDelete('cascade');
            $table->foreign('address_book_id')->references('id')->on('address_books')->onDelete('cascade');
            $table->foreign('company_relationship_manager')->references('id')->on('users')->onDelete('cascade');            
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('contracts', function (Blueprint $table){
            $table->foreign('licence_id')->references('id')->on('licences')->onDelete('cascade');
        });

        Schema::table('address_books', function (Blueprint $table){
            $table->foreign('address_contact_id')->references('id')->on('address_contacts')->onDelete('cascade');
        });

        Schema::table('job', function (Blueprint $table){
            $table->foreign('salary_range_id')->references('id')->on('salary_ranges')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('notes', function (Blueprint $table){
            $table->foreign('note_type_id')->references('id')->on('note_types')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('user_tiles', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tile_id')->references('id')->on('tiles')->onDelete('cascade');
        });

        Schema::table('user_language', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });

        Schema::table('user_goal', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('goal_id')->references('id')->on('goals')->onDelete('cascade');
        });

        Schema::table('user_interest', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');
        });
        
        Schema::table('learnings', function (Blueprint $table){
            $table->foreign('mark_id')->references('id')->on('marks')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('difficulty_id')->references('id')->on('difficulties')->onDelete('cascade');
            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('providers', function (Blueprint $table){
            $table->foreign('provider_contact_id')->references('id')->on('provider_contacts')->onDelete('cascade');
        });

        Schema::table('interests', function (Blueprint $table){
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('user_notes', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
        });

        Schema::table('user_achievements', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('achievement_id')->references('id')->on('achievements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign('department_id');
            $table->dropForeign('roles_id');
            $table->dropForeign('seniorities_id');
            $table->dropForeign('job_id');
            $table->dropForeign('holiday_entitlement_id');
            $table->dropForeign('contact_id');
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('roles', function (Blueprint $table){
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('achievements', function (Blueprint $table){
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('leaves', function (Blueprint $table){
            $table->dropForeign('status_id');
            $table->dropForeign('status_change_by');
            $table->dropForeign('leave_type_id');
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('user_contacts', function (Blueprint $table){
            $table->dropForeign('relation_id');
        });

        Schema::table('licences', function (Blueprint $table){
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('departments', function (Blueprint $table){            
            $table->dropForeign('company_id');
            $table->dropForeign('dept_lead_id');
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('companies', function (Blueprint $table){
            $table->dropForeign('contract_id');
            $table->dropForeign('company_contact_id');
            $table->dropForeign('address_book_id');
            $table->dropForeign('company_relationship_manager');
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('contracts', function (Blueprint $table){
            $table->dropForeign('licence_id');
        });

        Schema::table('address_books', function (Blueprint $table){
            $table->dropForeign('address_contact_id');
        });

        Schema::table('job', function (Blueprint $table){
            $table->dropForeign('salary_range_id');
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('notes', function (Blueprint $table){
            $table->dropForeign('note_type_id');
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('user_tiles', function (Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('tile_id');
        });

        Schema::table('user_language', function (Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('language_id');
        });

        Schema::table('user_goal', function (Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('goal_id');
        });

        Schema::table('user_interest', function (Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('interests_id');
        });
        
        Schema::table('learnings', function (Blueprint $table){
            $table->dropForeign('mark_id');
            $table->dropForeign('category_id');
            $table->dropForeign('difficulty_id');
            $table->dropForeign('time_id');
            $table->dropForeign('provider_id');
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('providers', function (Blueprint $table){
            $table->dropForeign('provider_contact_id');
        });

        Schema::table('interests', function (Blueprint $table){
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
            $table->dropForeign('deleted_by');
        });

        Schema::table('user_notes', function (Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('notes_id');
        });

        Schema::table('user_achievements', function (Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('achievements_id');
        });
    }
};
