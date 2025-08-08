<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\EmpleadoController;

Route::get('/empleados/crear', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');


use App\Http\Controllers\ClienteController;

Route::resource('clientes', ClienteController::class);