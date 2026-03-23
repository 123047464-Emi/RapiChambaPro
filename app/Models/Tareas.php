<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    //
    protected $table = 'tareas';

    protected $fillable = [
        'nombre',
        'fechaPublicacion',
        'fechaLimite',
        'descripcion',
        'presupuesto',
        'idUbicacion',
        'idCategoria',
        'idEstatus', 
        'idEmpleador'
    ];

    //Una tarea pertenece a una ubicación 
    public function ubicacion()
    {
        return $this->belongsTo(Direccion::class, 'idUbicacion', 'id');
    }

    //Una tarea pertenece a una categoría
    public function categoria(){
        return $this->belongsTo(Categorias::class,'idCategoria', 'id');
    }

    //Una tarea pretenece a un estatus
    public function estatus(){
        return $this->belongsTo(Estatus::class, 'idEstatus', 'id');
    }

    //Una tarea pertenece a un empleador
    public function empleador(){
        return $this->belongsTo(Empleador::class, 'idEmpleador', 'id');
    }
}
