<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = array(
			array('name' => 'Ahuachapán'),
            array('name' => 'Santa Ana'),
            array('name' => 'Sonsonate'),
            array('name' => 'Chalatenango'),
            array('name' => 'La Libertad'),
            array('name' => 'San Salvador'),
            array('name' => 'Cuscatlán'),
            array('name' => 'La Paz'),
            array('name' => 'San Vicente'),
            array('name' => 'Cabañas'),
            array('name' => 'Usulután'),
            array('name' => 'San Miguel'),
            array('name' => 'Morazán'),
            array('name' => 'La Unión'),
        );

		foreach ($states as $state) {
            State::create([
                'name' => $state['name']
            ]);
        }
    }
}
