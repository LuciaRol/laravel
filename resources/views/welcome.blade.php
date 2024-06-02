@extends('layouts.app')

@section('title', 'Bienvenida')

@section('content')
        <div class="landing">
            <img src="{{ asset('img/tatuajes.jpeg') }}" alt="" class="background-image">
            <div class="content">
                <h2>Bajo piel</h2>
                <h3>Bienvenido/a a nuestro estudio de tatuajes</h3>
                <p>aSomos un equipo dedicado a brindar diseños innovadores y de alta calidad para nuestros clientes. Nuestro objetivo es superar las expectativas y ofrecer un valor excepcional en cada tatuaje que realizamos.</p>
            </div>
        </div>
@endsection
