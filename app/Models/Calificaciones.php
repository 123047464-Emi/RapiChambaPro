<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    //
    protected $table = 'calificaciones';

    protected $fillable = [
        'idEmpleado',
        'idEmpleador', 
        'puntuacion', 
        'fechaCalificacion', 
        'comentario', 
        'idTarea' 
    ];

    // Relación con el empleado calificado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'id');
    }

    // Relación con el empleador que califica
    public function empleador()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleador', 'id');
        // o Usuario::class si el empleador es un usuario
    }

    // Relación con la tarea
    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'idTarea', 'id');
    }

}
