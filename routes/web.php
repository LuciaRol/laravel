<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::get('/register', function () {
    return view('welcome');
});


Route::get('/crear-cita', [CitaController::class, 'crearCita'])->name('crear-cita');


Route::get('/citas', function () {
     return view('citas');
});

// Route::get('/citas', [CitaController::class, 'index']);




Route::get('/citas', [CitaController::class, 'index']);


require __DIR__.'/auth.php';
