<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';
    
    protected $fillable = [
        'nombre_servicio',
        'descripcion',
        'precio',
        'duracion_minutos',
        'estado',
        'imagen',
        'id_categoria', // ← Ahora es llave foránea
        'descuento',          
        'caracteristicas'     
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'duracion_minutos' => 'integer',
        'descuento' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Relación con las citas
     */
    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_servicio');
    }
    /**
     * Relación con la categoría
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(CategoriaServicio::class, 'id_categoria');
    }
}