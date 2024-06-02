@extends('layouts.app')

@section('title', 'Crear Cita')

@section('content')
<form method="POST" action="{{ route('clientes.store') }}">
    @csrf
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre"><br>
    <label for="apellidos">Apellidos:</label><br>
    <input type="text" id="apellidos" name="apellidos"><br>
    <label for="telefono">Teléfono:</label><br>
    <input type="text" id="telefono" name="telefono"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    <button type="submit">Crear Cliente</button>
</form>

@endsection
