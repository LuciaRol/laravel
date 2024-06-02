<?php
// app/Http/Controllers/ClienteController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
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
            'email' => 'required|string|email|max:255|unique:clientes',
        ]);

        // Crear un nuevo cliente en la base de datos
        Cliente::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'email' => $request->email,
        ]);

        // Redireccionar a una página de éxito o mostrar un mensaje
        return redirect()->route('clientes.create')->with('success', 'Cliente creado exitosamente.');
    }
}

