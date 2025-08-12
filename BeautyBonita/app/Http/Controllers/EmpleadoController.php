<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Listar (opcional, para ver lo creado)
    public function index()
    {
        return Empleado::latest()->get();
    }

    // Crear
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'   => 'required|string|max:150',
            'email'    => 'nullable|email|unique:empleados,email',
            'telefono' => 'nullable|string|max:30',
        ]);

        $empleado = Empleado::create($data);

        return response()->json([
            'ok'        => true,
            'empleado'  => $empleado
        ], 201);
    }
}
