<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';
    protected $primaryKey = 'id_cita';
    
    protected $fillable = [
        'id_cliente',
        'id_servicio',
        'id_empleado',
        'fecha_cita',
        'hora_cita',
        'estado_cita',
        'observaciones'
    ];

    protected $casts = [
        'fecha_cita' => 'date',
        'hora_cita' => 'datetime:H:i'
    ];

    /**
     * Relación con el cliente
     */
    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente', 'id_usuario');
    }

    /**
     * Relación con el empleado
     */
    public function empleado()
    {
        return $this->belongsTo(User::class, 'id_empleado', 'id_usuario');
    }

    /**
     * Relación con el servicio
     */
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    /**
     * Relación con los pagos
     */
    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_cita');
    }
}