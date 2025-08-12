<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/empleados/{empleado}/huellas', [HuellaController::class, 'store']);
Route::post('/asistencias', [AsistenciaController::class, 'store']);

// Catálogo para identificación local (la app .NET lo consume)
Route::get('/catalogo-fmds', function () {
  return \App\Models\Huella::select('empleado_id','fmd_xml')->get();
});
