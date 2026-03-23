<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = [
        'FechaInicio', 
        'FechaFin', 
        'idEstatus', 
        'idTarea', 
        'idEmpleado', 
        'idTipo'
    ];

    // Un contrato pertenece a un estatus
    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'idEstatus', 'id');
    }

    // Un contrato pertenece a un empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'id');
    }

    // Un contrato pertenece a una tarea
    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'idTarea', 'id');
    }

    // Un contrato pertenece a un tipo de contrato
    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'idTipo', 'id');
    }
}

