@extends('layouts.app')

@section('title', 'Crear Cita')

@section('content')
<form action="{{ route('guardar-cita') }}" method="POST">
    @csrf <!-- Directiva de Blade para protección CSRF -->

    <!-- Campos del formulario -->
    <div>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>
    </div>
    <div>
        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" required>
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
    </div>
    <div>
        <label for="cliente_id">ID del cliente:</label>
        <input type="number" id="cliente_id" name="cliente_id" required>
    </div>

    <!-- Botón de enviar -->
    <button type="submit">Crear Cita</button>
</form>

@endsection
