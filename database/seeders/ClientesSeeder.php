<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generar 10 registros aleatorios
        for ($i = 0; $i < 10; $i++) {
            $nombre = $faker->firstName;
            $apellido = $faker->lastName;
            $email = strtolower($nombre . $apellido . '@gmail.com');
            $telefono = $faker->numberBetween(600000000, 699999999); // Número aleatorio de 9 dígitos entre 600000000 y 699999999

            DB::table('cliente')->insert([
                'nombre' => $nombre,
                'apellidos' => $apellido,
                'telefono' => $telefono,
                'email' => $email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
