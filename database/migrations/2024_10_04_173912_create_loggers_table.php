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
        Schema::create('loggers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('logged_in_user_id');
            $table->unsignedBigInteger('related_to_user_id')->nullable();
            $table->integer('action');
            $table->text('data')->nullable();
            $table->timestamps();

            $table->foreign('logged_in_user_id')->references('id')->on('users')->onDelete('Cascade');
            $table->foreign('related_to_user_id')->references('id')->on('users')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loggers');
    }
};
