<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('candidate_profile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('profession')->nullable();
            $table->string('experience')->nullable();
            $table->decimal('hourly_rate', 8, 2)->nullable();
            $table->integer('total_projects')->nullable();
            $table->string('english_level')->nullable();
            $table->string('availability')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_profile');
    }
};