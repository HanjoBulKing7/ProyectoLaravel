<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'celular' => 'required|string|max:20',
        ]);

        Empleado::create([
            'nombre' => $request->nombre,
            'celular' => $request->celular,
        ]);

        return redirect()->back()->with('success', 'Empleado registrado correctamente');
    }
}