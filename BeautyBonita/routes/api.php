<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PuenteToken;

//Agregar el controlador de EventoController 
use App\Http\Controllers\EventoController;  


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
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\HuellaController;

Route::middleware(PuenteToken::class)->group(function () {
    // Empleados
    Route::post('/empleados', [EmpleadoController::class, 'store']);

    // Huellas (enrolar)  POST /empleados/{empleado}/huellas
    Route::post('/empleados/{empleado}/huellas', [HuellaController::class, 'store']);

    // Asistencia (marcar entrada/salida)
    Route::post('/asistencias', [AsistenciaController::class, 'store']);
});
Route::get('/empleados', [EmpleadoController::class, 'index']);

Route::get('/ping', fn() => ['pong' => now()])
    ->middleware(PuenteToken::class);
