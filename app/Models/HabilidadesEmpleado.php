<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabilidadesEmpleado extends Model
{
    //

    protected $table = 'empleado_habilidad'; 
    protected $fillable = ['idempleado', 'idhabilidad'];

    // Empleado.php
    public function habilidades()
    {
        return $this->belongsToMany(Habilidad::class, 'empleado_habilidad', 'idempleado', 'idhabilidad');
    }


}
