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
        return view('crear-cita');
    }

    public function guardarCita(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'fecha_hora' => 'required|date',
        'descripcion' => 'required|string',
        'empleado_id' => 'required|numeric',
        'cliente_id' => 'required|numeric',
    ]);

    // Crear una nueva cita con los datos proporcionados en la solicitud
    Cita::create([
        'fecha_hora' => $request->fecha_hora,
        'descripcion' => $request->descripcion,
        'empleado_id' => $request->empleado_id,
        'cliente_id' => $request->cliente_id,
    ]);

    // Redirigir a alguna página de éxito o a donde prefieras
    return redirect()->route('citas.index')->with('success', 'La cita se ha creado correctamente.');
}

}