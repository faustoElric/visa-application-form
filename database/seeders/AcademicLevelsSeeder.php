<?php

namespace Database\Seeders;

use App\Models\AcademicLevel;
use Illuminate\Database\Seeder;

class AcademicLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicLevel::create([
            'name' => 'No posee estudios académicos'
        ]);
        AcademicLevel::create([
            'name' => 'Primaria'
        ]);
        AcademicLevel::create([
            'name' => 'Secundaria'
        ]);
        AcademicLevel::create([
            'name' => 'Bachillerato'
        ]);
        AcademicLevel::create([
            'name' => 'Técnico'
        ]);
        AcademicLevel::create([
            'name' => 'Universidad'
        ]);
        AcademicLevel::create([
            'name' => 'Especialización'
        ]);
        AcademicLevel::create([
            'name' => 'Maestría'
        ]);
        AcademicLevel::create([
            'name' => 'Doctorado'
        ]);
    }
}
