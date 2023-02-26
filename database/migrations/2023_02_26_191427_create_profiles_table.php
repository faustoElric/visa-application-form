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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->date('date_of_birth');
            $table->string('age');
            $table->unsignedBigInteger('civil_status_id')->nullable();
            $table->unsignedBigInteger('academic_level_id')->nullable();
            $table->string('desired_job');
            $table->string('city');
            $table->string('state');
            $table->unsignedBigInteger('english_listening_level_id')->nullable();
            $table->unsignedBigInteger('english_speaking_level_id')->nullable();
            $table->string('children_live_with_me');
            $table->string('children_dont_live_with_me');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
