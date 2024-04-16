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
            $table->string('phone_number');
            $table->string('email');
            $table->unsignedBigInteger('academic_level_id')->nullable();
            $table->string('desired_job');
            $table->string('city');
            $table->string('state');
            $table->unsignedBigInteger('english_level_id')->nullable();
            $table->string('children_live_with_me');
            $table->string('children_dont_live_with_me');
            $table->string('dui');
            $table->enum("visa_type", ["1-H2B", "2-H2A"]);
            $table->boolean('has_passport');
            $table->enum("gender", ["Masculino", "Femenino"]);
            $table->enum("employment_status", ["Desempleado", "Empleado","Emprendedor"]);
            $table->string("information_obtained_by");
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
