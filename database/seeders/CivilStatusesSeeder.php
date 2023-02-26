<?php

namespace Database\Seeders;

use App\Models\CivilStatus;
use Illuminate\Database\Seeder;

class CivilStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CivilStatus::create([
            'name' => 'Soltero'
        ]);
        CivilStatus::create([
            'name' => 'Casado'
        ]);
        CivilStatus::create([
            'name' => 'Divorciado'
        ]);
        CivilStatus::create([
            'name' => 'Acompañado'
        ]);
        CivilStatus::create([
            'name' => 'Viudo'
        ]);
    }
}
