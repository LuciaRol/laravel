@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <h1>Listado de Clientes</h1>
    @if ($clientes->isEmpty())
        <p>No hay clientes registrados.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->cliente_id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->apellidos }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
