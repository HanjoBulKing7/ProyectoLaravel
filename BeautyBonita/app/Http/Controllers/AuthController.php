<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // <-- IMPORTANTE
use Illuminate\Support\Facades\Hash;

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

            $user = Auth::user();

            // Redirigir según el role_id
            switch ($user->role_id) {
                case 3: // ADMIN
                    return redirect()->intended('/admin/home');
                case 2: // EMPLEADO
                    return redirect()->intended('/employee/dashboard');
                case 1: // CLIENTE
                    return redirect()->intended('/home');
                default:
                    Auth::logout();
                    return back()->with('error', 'Rol no válido. Contacta al administrador.');
            }
        }

        return back()->with('error', 'Correo o contraseña incorrectos');
    }

    // Mostrar formulario de registro de clientes
    public function showRegister()
    {
        return view('auth.register');
    }

    // Registrar cliente
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Crear el usuario con role_id = 1 (CLIENTE)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
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
