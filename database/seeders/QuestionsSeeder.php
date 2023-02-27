<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'question' => 'Alguna vez ha estado en Estados Unidos de forma ilegal?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Posee una visa valida de Estados Unidos?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Ha violado alguna ley de inmigración?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Tiene algun tipo de restricciones migratorias?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Ha sido deportado de Estados Unidos u algún otro país?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Ha participado directa o indirectamente en algún crimen?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Alguna vez ha sido arrestado?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Ha violado alguna ley de inmigración?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Posee algún proceso criminal abierto?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Explique (Opcional)',
            'section' => 'Immigration Status',
            'type' => 'textarea'
        ]);
        Question::create([
            'question' => 'Tiene alguna condición de salud, fisica o mental , que le impida realizar trabajos fisicos por varias horas?',
            'section' => 'Health',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Explique (Opcional)',
            'section' => 'Health',
            'type' => 'textarea'
        ]);
        Question::create([
            'question' => 'Se encuentra bajo algún tratamiento medico?',
            'section' => 'Health',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Explique (Opcional)',
            'section' => 'Health',
            'type' => 'textarea'
        ]);
        Question::create([
            'question' => 'Puede leer y escribir?',
            'section' => 'Skills',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Puede manejar?',
            'section' => 'Skills',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Posee licencia de manejar valida?',
            'section' => 'Skills',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Puede mantener una conversación en inglés?',
            'section' => 'Skills',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Entiende si alguna persona le brinda indicaciones en inglés?',
            'section' => 'Skills',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Posee otro tipo de habilidades:',
            'section' => 'Skills',
            'type' => 'textarea'
        ]);
        Question::create([
            'question' => 'Notes:',
            'section' => 'Skills',
            'type' => 'textarea'
        ]);
    }
}
