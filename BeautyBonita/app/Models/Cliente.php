<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente (mass assignable)
     * Corresponden exactamente a los campos de tu formulario
     */
    protected $fillable = [
        'nombre',
        'email', 
        'telefono',
        'direccion'
    ];

    /**
     * Los tipos de datos a los que deben convertirse los atributos
     * (Opcional pero recomendado)
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validación para creación de clientes
     * (Coincide con lo que necesitas en el controlador)
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:clientes',
        'telefono' => 'required|string|max:20',
        'direccion' => 'nullable|string'
    ];

    /**
     * Mensajes de validación personalizados (opcional)
     */
    public static $messages = [
        'nombre.required' => 'El nombre es obligatorio',
        'email.required' => 'El correo electrónico es obligatorio',
        'email.email' => 'Debe ingresar un correo válido',
        'email.unique' => 'Este correo ya está registrado',
        'telefono.required' => 'El teléfono es obligatorio'
    ];
}