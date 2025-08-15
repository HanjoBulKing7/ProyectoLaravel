<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


use App\Http\Controllers\HuellaController;
use App\Http\Controllers\AsistenciaController;
use App\Models\Asistencia;

Route::post('/empleados/{empleado}/huellas', [HuellaController::class, 'store']);
Route::post('/asistencias', [AsistenciaController::class, 'store']);
Route::get('/asistencias', function () {
    return Asistencia::latest()->take(50)->get();
});
Route::get('/empleados/{empleado}/asistencias/ultima', function (\App\Models\Empleado $empleado) {
    $last = Asistencia::where('empleado_id', $empleado->id)->latest('marcada_en')->first();
    return response()->json([
        'ultima' => $last ? ['tipo' => $last->tipo, 'marcada_en' => $last->marcada_en] : null
    ]);
});




use App\Models\Huella;

// Catálogo para identificación local (la app .NET lo consume)
Route::get('/catalogo-fmds', function () {
  return \App\Models\Huella::select('empleado_id','fmd_xml')->get();
});


use App\Http\Controllers\EmpleadoController;

Route::get('/empleados', [EmpleadoController::class, 'index']); // opcional
Route::post('/empleados', [EmpleadoController::class, 'store']); // crear
