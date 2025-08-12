<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model {
  protected $fillable = ['nombre','email','telefono'];
  public function huellas(){ return $this->hasMany(Huella::class); }
  public function asistencias(){ return $this->hasMany(Asistencia::class); }
}

