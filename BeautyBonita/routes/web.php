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
Route::get('/serviciosadmin', function () {
    return view('serviciosadmin');
});
Route::get('/empleadosadmin', function () {
    return view('empleadosadmin');
});
Route::get('/citasadmin', function () {
    return view('citasadmin');
});
Route::get('/clientesadmin', function () {
    return view('clientesadmin');
});
Route::get('/admin', function () {
    return view('admin');
});


use App\Http\Controllers\EmpleadoController;

Route::get('/empleados/crear', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');



use App\Http\Controllers\ClienteController;

Route::resource('clientes', ClienteController::class);