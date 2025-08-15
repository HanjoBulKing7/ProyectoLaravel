<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


use App\Http\Controllers\HuellaController;
use App\Http\Controllers\AsistenciaController;

Route::post('/empleados/{empleado}/huellas', [HuellaController::class, 'store']);
Route::post('/asistencias', [AsistenciaController::class, 'store']);

use App\Models\Huella;

// Catálogo para identificación local (la app .NET lo consume)
Route::get('/catalogo-fmds', function () {
  return \App\Models\Huella::select('empleado_id','fmd_xml')->get();
});


use App\Http\Controllers\EmpleadoController;

Route::get('/empleados', [EmpleadoController::class, 'index']); // opcional
Route::post('/empleados', [EmpleadoController::class, 'store']); // crear
