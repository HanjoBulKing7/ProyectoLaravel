<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/interfaz', function () {
    return view('interfaz');
});
Route::get('/servicio', function () {
    return view('servicio');
});

Route::get('/anticipo', function () {
    return view('anticipo');
});
Route::get('/reserva', function () {
    return view('reserva');
});
Route::get('/sucursal', function () {
    return view('sucursal');
});

use App\Http\Controllers\EmpleadoController;

Route::get('/empleados/crear', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');



use App\Http\Controllers\ClienteController;

Route::resource('clientes', ClienteController::class);