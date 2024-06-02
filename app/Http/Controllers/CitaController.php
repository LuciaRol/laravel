<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index()
    {
        // Obtiene todas las citas
        $citas = Cita::all();

        // Pasa las citas a la vista
        return view('citas.index', compact('citas'));
    }

    public function crearCita(Request $request)
    {
       // Obtiene todas las citas
       $citas = Cita::all();

       // Pasa las citas a la vista
       return view('citas.index', compact('citas'));
    }
}