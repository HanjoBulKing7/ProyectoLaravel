<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Mostrar todos los roles
     */
    public function index()
    {
        $roles = Role::with('user')->get(); // Incluye relación con usuario
        return response()->json($roles);
    }

    /**
     * Crear un nuevo rol
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_rol' => 'required|in:CLIENTE,EMPLEADO,ADMIN',
            'user_id' => 'required|exists:users,id'
        ]);

        // Verificar si el usuario ya tiene un rol
        if (Role::where('user_id', $validated['user_id'])->exists()) {
            return response()->json(['error' => 'El usuario ya tiene un rol asignado'], 400);
        }

        $role = Role::create($validated);

        return response()->json([
            'message' => 'Rol creado correctamente',
            'data' => $role
        ], 201);
    }

    /**
     * Mostrar un rol específico
     */
    public function show(Role $role)
    {
        return response()->json($role);
    }

    /**
     * Actualizar un rol
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'nombre_rol' => 'required|in:CLIENTE,EMPLEADO,ADMIN'
        ]);

        $role->update($validated);

        return response()->json([
            'message' => 'Rol actualizado correctamente',
            'data' => $role
        ]);
    }

    /**
     * Eliminar un rol
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json([
            'message' => 'Rol eliminado correctamente'
        ]);
    }
}
