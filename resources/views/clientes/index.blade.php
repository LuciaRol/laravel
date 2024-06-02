@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <h1>Listado de Clientes</h1>
    @if ($clientes->isEmpty())
        <p>No hay clientes registrados.</p>
    @else
        <h2>Lista de Clientes</h2>
        <table>
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
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

   
        <h2>Lista de Clientes Editables</h2>
        <form action="{{ route('clientes.update', $cliente->cliente_id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="cliente_id" value="{{ $cliente->cliente_id }}">
    <td>
        <!-- Campos editables del cliente -->
        <input type="text" name="nombre" value="{{ $cliente->nombre }}" required>
    </td>
    <td>
        <input type="text" name="apellidos" value="{{ $cliente->apellidos }}" required>
    </td>
    <td>
        <input type="text" name="telefono" value="{{ $cliente->telefono }}">
    </td>
    <td>
        <input type="email" name="email" value="{{ $cliente->email }}" required>
    </td>
    <td>{{ $cliente->created_at }}</td>
    <td>
        <!-- Botón para guardar los cambios -->
        <button type="submit" class="btn btn-success">Guardar</button>
    </td>
</form>
    @endif
@endsection
