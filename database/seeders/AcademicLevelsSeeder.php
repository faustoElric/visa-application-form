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
            'name' => 'Primaria'
        ]);
        AcademicLevel::create([
            'name' => 'Secundaria'
        ]);
        AcademicLevel::create([
            'name' => 'Bachillerato'
        ]);
        AcademicLevel::create([
            'name' => 'Universidad'
        ]);
        AcademicLevel::create([
            'name' => 'Técnico'
        ]);
    }
}
