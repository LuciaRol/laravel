<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';
    protected $primaryKey = 'empleado_id';
    protected $fillable = ['nombre', 'apellidos', 'usuario', 'contraseña'];

    public function citas()
    {
        return $this->hasMany(Cita::class, 'empleado_id');
    }
}