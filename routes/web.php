<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', function () {
    return "Usuarios";
});



Route::get('/clientes', [ClienteController::class, 'Home']);

