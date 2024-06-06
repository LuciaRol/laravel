@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="ver-clientes-container mt-5">
    @if ($clientes->isEmpty())
        <div class="ver-clientes-alert" role="alert">
            No hay clientes registrados.
        </div>
    @else
        <h2>Lista de clientes</h2>
        <table class="ver-clientes-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
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
                        <td>
                            <!-- Formulario para eliminar -->
                            <form action="{{ route('clientes.destroy', $cliente->cliente_id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ver-clientes-button btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr class="my-5">

        <h2 class="mb-4">Editar clientes</h2>
        <table class="ver-clientes-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <form action="{{ route('clientes.update', $cliente->cliente_id) }}" method="POST" class="ver-clientes-form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="cliente_id" value="{{ $cliente->cliente_id }}">
                            <td>{{ $cliente->cliente_id }}</td>
                            <td><input type="text" name="nombre" value="{{ $cliente->nombre }}" required></td>
                            <td><input type="text" name="apellidos" value="{{ $cliente->apellidos }}" required></td>
                            <td><input type="text" name="telefono" value="{{ $cliente->telefono }}"></td>
                            <td><input type="email" name="email" value="{{ $cliente->email }}" required></td>
                            <td>{{ $cliente->created_at }}</td>
                            <td><button type="submit" class="ver-clientes-button btn-success">Guardar</button></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
