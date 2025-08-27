<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CategoriaServicioController;
use Illuminate\Support\Facades\Auth;

// Rutas Públicas (Cliente)
Route::get('/home', function () {
    return view('cliente.home');
})->name('cliente.home');

Route::get('/servicio', function () {
    return view('cliente.servicio');
})->name('cliente.servicio');

Route::get('/anticipo', function () {
    return view('cliente.anticipo');
})->name('cliente.anticipo');

Route::get('/reserva', function () {
    return view('cliente.reserva');
})->name('cliente.reserva');

Route::get('/sucursal', function () {
    return view('cliente.sucursal');
})->name('cliente.sucursal');

// Rutas de Autenticación
Route::get('/login', function () {
    return view('login');
})->name('login.form');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Registro de clientes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Rutas de Administración
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', function () {
        // Verificar rol directamente
        if (!Auth::check() || Auth::user()->role_id != 3) {
            return redirect('/login')->with('error', 'No tienes permisos para acceder a esta sección.');
        }
        return view('admin.dashboard');
    })->name('dashboard');

    

    Route::get('/empleados', function () {
        if (!Auth::check() || Auth::user()->role_id != 3) {
            return redirect('/login')->with('error', 'No tienes permisos para acceder a esta sección.');
        }
        return view('admin.empleados.index');
    })->name('empleados.index');

    Route::get('/citas', function () {
        if (!Auth::check() || Auth::user()->role_id != 3) {
            return redirect('/login')->with('error', 'No tienes permisos para acceder a esta sección.');
        }
        return view('admin.citas.index');
    })->name('citas.index');

    Route::get('/clientes', function () {
        if (!Auth::check() || Auth::user()->role_id != 3) {
            return redirect('/login')->with('error', 'No tienes permisos para acceder a esta sección.');
        }
        return view('admin.clientes.index');
    })->name('clientes.index');

    Route::resource('servicios', ServicioController::class)->names('servicios');
    // Categorías de servicios - CRUD completo
    Route::resource('categoriaservicios', CategoriaServicioController::class)
        ->parameters(['categoriaservicios' => 'categoria']);
});






Route::get('/empleados/crear', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');



Route::resource('clientes', ClienteController::class);

// Rutas de Payment Stripe
Route::get('/pagar', function () {
    return view('metodo_pago');
})->name('metodo.pago');

Route::get('/checkout', [PagoController::class, 'checkout'])->name('checkout');
Route::get('/success', [PagoController::class, 'success'])->name('success');
Route::get('/cancel', [PagoController::class, 'cancel'])->name('cancel');



// Ruta de diagnóstico
Route::get('/debug-auth', function () {
    return response()->json([
        'auth_check' => Auth::check(),
        'auth_user' => Auth::user(),
        'session_id' => session()->getId(),
        'all_session' => session()->all()
    ]);
});
