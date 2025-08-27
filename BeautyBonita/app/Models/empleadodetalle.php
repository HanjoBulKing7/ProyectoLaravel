<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoDetalle extends Model
{
    use HasFactory;

    protected $table = 'empleados_detalles';
    protected $primaryKey = 'id_EmpleadoDetalles';
    
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'informacion_legal',
        'id_usuarios'
    ];

    /**
     * Relación con el usuario
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuarios', 'id_usuario');
    }
}