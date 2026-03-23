<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoHabilidad extends Model
{
    protected $table = 'empleado_habilidad';

    protected $fillable = [
        'idEmpleado',
        'idHabilidad'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'id');
    }

    public function habilidad()
    {
        return $this->belongsTo(Habilidad::class, 'idHabilidad', 'id');
    }
}
