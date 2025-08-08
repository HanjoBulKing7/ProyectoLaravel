<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Laravel por defecto usará la tabla "empleados"
    // Si fuera diferente, podrías especificarlo con: protected $table = 'otra_tabla';

    // Permitir asignación masiva de estos campos
    protected $fillable = [
        'nombre',
        'celular',
    ];
}
