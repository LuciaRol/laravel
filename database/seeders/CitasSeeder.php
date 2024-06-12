<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CitasSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Array de descripciones más elaboradas de tatuajes
        $descripciones = [
            'Tatuaje de una rosa con detalles realistas en el brazo. Los pétalos tienen sombreado y se entrelazan con una cinta con un nombre.',
            'Diseño geométrico en la espalda que combina formas abstractas con líneas finas y puntos. El tatuaje tiene un estilo minimalista y simétrico.',
            'Calavera y rosas en la pierna que representa la dualidad entre la vida y la muerte. La calavera está rodeada de rosas en blanco y negro con detalles intrincados.',
            'Tatuaje de un lobo en el pecho que muestra al animal en posición de alerta con los ojos brillantes. Detalles realistas y sombreado profundo para dar profundidad.',
            'Tatuaje de un dragón en el brazo que envuelve alrededor del músculo con detalles en escamas y fuego saliendo de la boca. El dragón tiene un estilo tradicional con líneas gruesas y colores vibrantes.',
            'Frase en letra cursiva en la muñeca que dice "Carpe Diem". Las letras están delicadamente diseñadas y se entrelazan con una serie de pequeños corazones.',
            'Diseño de mandala en el hombro que combina patrones geométricos con detalles florales. El mandala tiene un aspecto intrincado y simétrico.',
            'Tatuaje de un búho en el antebrazo que muestra al ave con las alas extendidas y los ojos penetrantes. El búho está rodeado de ramas y hojas en un estilo realista.',
            'Diseño de flechas en el costado que simboliza el viaje y la dirección en la vida. Las flechas están entrelazadas con plumas y detalles tribales.',
            'Tatuaje de un reloj de bolsillo en el muslo que muestra el tiempo detenido en un momento significativo. El reloj está rodeado de rosas y engranajes en un estilo vintage.'
        ];

        // Generar 10 registros de ejemplo
        for ($i = 0; $i < 10; $i++) {
            $fecha_hora = $faker->dateTimeBetween('now', '+1 month');
            $descripcion = $descripciones[$faker->numberBetween(0, count($descripciones) - 1)]; // Selecciona una descripción aleatoria
            $empleado_id = $faker->numberBetween(1, 5); // Suponiendo que los empleados tienen IDs del 1 al 5
            $cliente_id = $faker->numberBetween(1, 10); // Suponiendo que los clientes tienen IDs del 1 al 10

            DB::table('citas')->insert([
                'fecha_hora' => $fecha_hora,
                'descripcion' => $descripcion,
                'empleado_id' => $empleado_id,
                'cliente_id' => $cliente_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

