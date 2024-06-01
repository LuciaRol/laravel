<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id('empleado_id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('usuario')->unique();
            $table->string('contraseña');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
