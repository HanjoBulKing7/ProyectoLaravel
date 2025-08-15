<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsistenciaController extends Controller {
  public function store(Request $request) {
    $data = $request->validate([
      'empleado_id' => 'required|exists:empleados,id',
      'tipo' => 'required|in:entrada,salida',
      'marcada_en' => 'nullable|date'
    ]);
    $asis = Asistencia::create([
      'empleado_id' => $data['empleado_id'],
      'tipo' => $data['tipo'],
      'marcada_en' => $data['marcada_en'] ?? now(),
    ]);
    return response()->json(['ok'=>true,'asistencia_id'=>$asis->id]);
  }
}

