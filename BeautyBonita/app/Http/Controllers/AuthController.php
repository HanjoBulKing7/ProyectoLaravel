<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // <-- IMPORTANTE
use Illuminate\Support\Facades\Hash; // <-- Para encriptar la contraseña

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function showLogin()
    {
        return view('login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Obtener el usuario autenticado
            $user = Auth::user();

            // Redirigir según el rol
            switch ($user->role->nombrerol) {
                case 'ADMIN':
                    return redirect()->intended('/admin/dashboard'); // Panel Admin
                case 'EMPLEADO':
                    return redirect()->intended('/employee/dashboard'); // Panel Empleado
                case 'CLIENTE':
                    return redirect()->intended('/cliente/dashboard'); // Panel Cliente
                default:
                    Auth::logout();
                    return back()->with('error', 'Rol no válido. Contacta al administrador.');
            }
        }

        return back()->with('error', 'Correo o contraseña incorrectos');
    }


    // Mostrar registro de clientes
    public function showRegister() {
        return view('auth.register');
    }

    // Registrar cliente
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Buscar el rol CLIENTE en la tabla roles
        $role = \App\Models\Role::where('nombrerol', 'CLIENTE')->first();

        if (!$role) {
            return back()->with('error', 'El rol CLIENTE no existe. Por favor, crea los roles primero.');
        }

        // Crear el usuario con role_id
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role->id,
        ]);

        return redirect()->route('login.form')->with('success', 'Cuenta creada correctamente. Ingresa con tus datos.');
    }


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
