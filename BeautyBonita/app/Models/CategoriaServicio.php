<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriaServicio extends Model
{
    use HasFactory;

    protected $table = 'categorias_servicios';
    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'imagen',
        'estado'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Relación con servicios
     */
    public function servicios(): HasMany
    {
        return $this->hasMany(Servicio::class, 'id_categoria');
    }
}