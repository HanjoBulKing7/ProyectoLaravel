<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HuellaController extends Controller {
  public function store(Request $request, Empleado $empleado) {
    $data = $request->validate([
      'fmd_xml' => 'required|string',
      'formato' => 'nullable|string'
    ]);
    $huella = Huella::create([
      'empleado_id' => $empleado->id,
      'formato' => $data['formato'] ?? 'DP/ANSI',
      'fmd_xml' => $data['fmd_xml'],
    ]);
    return response()->json(['ok'=>true,'huella_id'=>$huella->id]);
  }
}

