<?php

namespace App\Http\Controllers;

use App\Models\empleadodetalle;
use Illuminate\Http\Request;

class EmpleadoDetalleController extends Controller
{
    public function index()
    {
        $empleadosDetalles = empleadodetalle::all();
        return view('empleados_detalles.index', compact('empleadosDetalles'));
    }

    public function create()
    {
        return view('empleados_detalles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'informacion_legal' => 'nullable|string|max:500',
            'IdUsuarios' => 'required|exists:users,id'
        ]);

        empleadodetalle::create($request->all());

        return redirect()->route('empleados_detalles.index')->with('success', 'Detalle de empleado creado correctamente');
    }

    public function show(empleadodetalle $empleadoDetalle)
    {
        return view('empleados_detalles.show', compact('empleadoDetalle'));
    }

    public function edit(empleadodetalle $empleadoDetalle)
    {
        return view('empleados_detalles.edit', compact('empleadoDetalle'));
    }

    public function update(Request $request, empleadodetalle $empleadoDetalle)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'informacion_legal' => 'nullable|string|max:500',
            'IdUsuarios' => 'required|exists:users,id'
        ]);

        $empleadoDetalle->update($request->all());

        return redirect()->route('empleados_detalles.index')->with('success', 'Detalle de empleado actualizado correctamente');
    }

    public function destroy(empleadodetalle $empleadoDetalle)
    {
        $empleadoDetalle->delete();
        return redirect()->route('empleados_detalles.index')->with('success', 'Detalle de empleado eliminado correctamente');
    }
}