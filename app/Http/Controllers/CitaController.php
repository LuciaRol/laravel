<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;


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
    // Obtener todos los clientes
    $clientes = Cliente::all();

    // Pasar los clientes a la vista
    return view('crear-cita', compact('clientes'));
}


    public function guardarCita(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'fecha' => 'required|date',
        'hora' => 'required|date_format:H:i',
        'descripcion' => 'required|string',
        'cliente_id' => 'required|numeric',
    ]);

    // Combinar la fecha y hora en un campo datetime
    $fechaHora = $request->fecha . ' ' . $request->hora;

    // Obtener el ID del usuario autenticado (empleado)
    $empleadoId = Auth::id();

    // Verificar si ya existe una cita para el empleado en el mismo intervalo de una hora
    $fechaHoraInicio = date('Y-m-d H:i:s', strtotime($fechaHora . ' -1 hour'));
    $fechaHoraFin = date('Y-m-d H:i:s', strtotime($fechaHora . ' +1 hour'));

    $citaExistente = Cita::where('empleado_id', $empleadoId)
        ->whereBetween('fecha_hora', [$fechaHoraInicio, $fechaHoraFin])
        ->first();

    if ($citaExistente) {
        // Redirigir de vuelta con un mensaje de error
        return redirect()->back()->withErrors(['error' => 'A esa hora estás ocupad@']);
    }

    // Crear una nueva cita con los datos proporcionados en la solicitud
    Cita::create([
        'fecha_hora' => $fechaHora,
        'descripcion' => $request->descripcion,
        'empleado_id' => $empleadoId,
        'cliente_id' => $request->cliente_id,
        'fecha_registro' => now(), // Si 'fecha_registro' es un campo adicional
    ]);

    // Redirigir a alguna página de éxito o a donde prefieras
    return redirect()->route('citas.index')->with('success', 'La cita se ha creado correctamente.');
}

public function destroy(Cita $cita)
    {
        // Eliminar la cita
        $cita->delete();

        // Redirigir a alguna página de éxito o a donde prefieras
        return redirect()->route('citas.index')->with('success', 'La cita ha sido eliminada correctamente.');
    }


public function update(Request $request, Cita $cita)
    {
        // Validar los datos del formulario de actualización
        $request->validate([
            'fecha_hora' => 'required|date',
            'descripcion' => 'required|string',
            // Añade aquí las validaciones para los otros campos si es necesario
        ]);

        // Actualizar los datos de la cita
        $cita->update([
            'fecha_hora' => $request->fecha_hora,
            'descripcion' => $request->descripcion,
            // Actualiza aquí los otros campos si es necesario
        ]);

        // Redirigir a alguna página de éxito o a donde prefieras
        return redirect()->route('citas.index')->with('success', 'La cita se ha actualizado correctamente.');
    }
}