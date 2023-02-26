<?php

namespace Database\Seeders;

use App\Models\EnglishLevel;
use Illuminate\Database\Seeder;

class EnglishLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EnglishLevel::create([
            'name' => 'No'
        ]);
        EnglishLevel::create([
            'name' => 'Básico'
        ]);
        EnglishLevel::create([
            'name' => 'Intermedio'
        ]);
        EnglishLevel::create([
            'name' => 'Avanzado'
        ]);
        EnglishLevel::create([
            'name' => 'Bilingüe'
        ]);
    }
}
