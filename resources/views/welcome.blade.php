@extends('layouts.app')

@section('title', 'Bienvenida')

@section('content')
        <div class="landing">
            <img src="{{ asset('img/tatuajes.jpeg') }}" alt="" class="background-image">
            <div class="content">
                <h2 class="titulo-welcome">Bajo piel</h2>
                <h3>Bienvenid@ a nuestro estudio de tatuajes</h3>
                <p class="p-welcome">Somos un equipo dedicado a brindar diseños innovadores y de alta calidad para nuestros clientes. Nuestro objetivo es superar tus expectativas y ofrecer una calidad excepcional en cada tatuaje que realizamos.</p>
            </div>
        </div>
@endsection
