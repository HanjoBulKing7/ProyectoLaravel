<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huella extends Model {
  protected $fillable = ['empleado_id','formato','fmd_xml'];
  public function empleado(){ return $this->belongsTo(Empleado::class); }
}

