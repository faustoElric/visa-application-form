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
            'question' => 'Posee o ha tenido alguna VISA válida para Estados Unidos?',
            'section' => 'Immigration Status',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Familiares en USA?',
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
            'question' => 'Alergias?',
            'section' => 'Health',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Dificultad visual?',
            'section' => 'Health',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => 'Dificultad motora?',
            'section' => 'Health',
            'type' => 'radio'
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
            'type' => 'select',
            'question_json_items' => json_encode(['No tengo licencia de conducir vigente', 'Sí, poseo licencia liviana','Sí, poseo licencia particular', 'Sí, poseo licencia para moto', 'Sí, poseo licencia pesada'])
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
        Question::create([
            'question' => '¿Eres retornado del Programa?',
            'description' => 'Responde Sí si has trabajado anteriormente con una compañía estadounidense a través del Programa de Movilidad Laboral',
            'section' => 'General',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => '¿Posee las vacunas contra el COVID-19?',
            'section' => 'Health',
            'type' => 'select',
            'question_json_items' => json_encode(['No poseo', 'Una dosis','Dos dosis', 'Tres dosis', 'Cuatro dosis'])
        ]);
        Question::create([
            'question' => '¿Has manejado tractores o minitractores anteriormente?',
            'section' => 'Skills',
            'type' => 'radio'
        ]);
        Question::create([
            'question' => '¿Cuál es su nivel en el uso de computadoras y paquetes de Office?',
            'section' => 'Skills',
            'type' => 'select',
            'question_json_items' => json_encode(['Nulo', 'Básico','Intermedio', 'Avanzado'])
        ]);
        Question::create([
            'question' => '¿Dónde se enteró del programa?',
            'section' => 'General',
            'type' => 'select',
            'question_json_items' => json_encode(['Redes sociales', 'Municipalidad','Un amigo', 'Internet', 'Institución Educativa', 'Institución de Gobierno', 'Otros'])
        ]);
    }
}
