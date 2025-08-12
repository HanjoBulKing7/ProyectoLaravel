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
            'email' => 'required|string|max:50',
            'telefono' => 'required|string|max:20',

        ]);

        Empleado::create([
            'nombre' => $request->nombre,
            'email' => $request->celular,
            'telefono' => $request->telefono,

        ]);

        return redirect()->back()->with('success', 'Empleado registrado correctamente');
    }
}