<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class EmpleadosSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generar 5 registros de ejemplo
        for ($i = 0; $i < 5; $i++) {
            $nombre = $faker->firstName;
            $apellido = $faker->lastName;
            $usuario = strtolower($nombre . $apellido . '@gmail.com');

            DB::table('empleado')->insert([
                'nombre' => $nombre,
                'apellidos' => $apellido,
                'usuario' => $usuario,
                'contraseña' => Hash::make('password')
            ]);
        }
    }
}
