<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey = 'cliente_id';
    protected $fillable = ['nombre', 'apellidos', 'telefono', 'email'];

    public function citas()
    {
        return $this->hasMany(Cita::class, 'cliente_id');
    }
}