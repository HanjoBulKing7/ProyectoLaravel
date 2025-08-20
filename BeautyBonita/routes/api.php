<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PuenteToken;


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
