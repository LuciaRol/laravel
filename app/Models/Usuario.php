<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'contrasena',
        'rol',
    ];

    protected $guarded=['id'];
    protected $primaryKey='id';
}
