<?php
// app/Http/Controllers/ClienteController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Auth;


class ClienteController extends Controller
{

    public function index()
    {
        // Obtener todos los clientes
        $clientes = Cliente::all();

        // Pasar los clientes a la vista
        return view('clientes.index', compact('clientes'));
    }
    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:cliente',
        ]);

       

        // Crear un nuevo cliente en la base de datos
        Cliente::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redireccionar a una página de éxito o mostrar un mensaje
        return redirect()->route('clientes.create')->with('success', 'Cliente creado exitosamente.');
}

    public function destroy(Cliente $cliente)
        {
            // Eliminar el cliente
            $cliente->delete();
    
            // Redirigir a alguna página de éxito o a donde prefieras
            return redirect()->route('clientes.index')->with('success', 'El cliente ha sido eliminado correctamente.');
        }
}
