<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(EmpleadosSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(CitasSeeder::class);
    }
}

