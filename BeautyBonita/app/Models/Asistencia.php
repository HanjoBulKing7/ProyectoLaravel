<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model {
  protected $fillable = ['empleado_id','tipo','marcada_en'];
  protected $casts = ['marcada_en'=>'datetime'];
  public function empleado(){ return $this->belongsTo(Empleado::class); }
}

