@extends('layouts.app')

@section('title', 'Crear Cliente')

@section('content')
<div class="create-cliente-container mt-5">
    <h2 class="mb-4">Crear Cliente</h2>
    <form method="POST" action="{{ route('clientes.store') }}" class="create-cliente-form">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">Crear Cliente</button>
    </form>
</div>
@endsection
