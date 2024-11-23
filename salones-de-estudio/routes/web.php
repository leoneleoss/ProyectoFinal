<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\ReservaController;

// Ruta principal (página de bienvenida o inicio)
Route::get('/', function () {
    return view('welcome');
});

// Rutas para el CRUD de salones
Route::prefix('salones')->group(function () {
    Route::get('/', [SalonController::class, 'index'])->name('salones.index'); // Listar salones
    Route::get('/crear', [SalonController::class, 'create'])->name('salones.create'); // Mostrar formulario para crear un salón
    Route::post('/', [SalonController::class, 'store'])->name('salones.store'); // Guardar salón
    Route::get('/{salon}/editar', [SalonController::class, 'edit'])->name('salones.edit'); // Editar un salón
    Route::put('/{salon}', [SalonController::class, 'update'])->name('salones.update'); // Actualizar salón
    Route::delete('/{salon}', [SalonController::class, 'destroy'])->name('salones.destroy'); // Eliminar salón
});

// Rutas para el CRUD de reservas
Route::prefix('reservas')->group(function () {
    Route::get('/', [ReservaController::class, 'index'])->name('reservas.index'); // Listar reservas
    Route::get('/crear', [ReservaController::class, 'create'])->name('reservas.create'); // Mostrar formulario para crear una reserva
    Route::post('/', [ReservaController::class, 'store'])->name('reservas.store'); // Guardar reserva
    Route::get('/{reserva}/editar', [ReservaController::class, 'edit'])->name('reservas.edit'); // Editar una reserva
    Route::put('/{reserva}', [ReservaController::class, 'update'])->name('reservas.update'); // Actualizar reserva
    Route::delete('/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy'); // Eliminar reserva
});
