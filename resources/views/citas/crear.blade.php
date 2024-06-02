@extends('layouts.app')

@section('title', 'Citas')

@section('content')
    <h1>Listado de Citas</h1>
    @if ($citas->isEmpty())
        <p>No hay citas registradas.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha y Hora</th>
                    <th>Descripción</th>
                    <th>Empleado</th>
                    <th>Cliente</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->cita_id }}</td>
                        <td>{{ $cita->fecha_hora }}</td>
                        <td>{{ $cita->descripcion }}</td>
                        <td>{{ $cita->empleado_id }}</td>
                        <td>{{ $cita->cliente_id }}</td>
                        <td>{{ $cita->fecha_registro }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
