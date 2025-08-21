<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/interfaz', function () {
    return view('interfaz');
});
Route::get('/servicio', function () {
    return view('servicio');
});

Route::get('/anticipo', function () {
    return view('anticipo');
});
Route::get('/reserva', function () {
    return view('reserva');
});
Route::get('/sucursal', function () {
    return view('sucursal');
});
Route::get('/login', function () {
    return view('login');
});

use App\Http\Controllers\EmpleadoController;

Route::get('/empleados/crear', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');



use App\Http\Controllers\ClienteController;

Route::resource('clientes', ClienteController::class);

//Payment Stripe Controller
use App\Http\Controllers\PagoController; 
Route::get('/pagar', function () {return view('metodo_pago'); // Nombre del archivo sin extensión .blade.php
})->name('metodo.pago');

Route::get('/checkout', [PagoController::class, 'checkout'])->name('checkout');
Route::get('/success', [PagoController::class, 'success'])->name('success');
Route::get('/cancel', [PagoController::class, 'cancel'])->name('cancel');