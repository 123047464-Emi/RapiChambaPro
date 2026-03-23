<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    //
    protected $table = 'estatus';

    protected $fillable = [
        'nombre', 
    ];

    //Una estatus puede perteneces a muchas tareas 
    public function tareas(){
        return $this->hasMany(Tareas::class, 'idEstatus', 'id');
    }

    //Una estatus puede perteneces a muchos pagos
    public function pagos(){
        return $this->hasMany(Pagos::class, 'idEstatus', 'id');
    }
    //Una estatus puede perteneces a muchos contratos
    public function contratos(){
        return $this->hasMany(Contratos::class, 'idEstatus', 'id');
    }
    //Una estatus puede perteneces a muchos mensajes
    public function mensajes(){
        return $this->hasMany(Mensajes::class, 'idEstatus', 'id');
    }
    //Una estatus puede perteneces a muchos usuarios
    public function usuarios(){
        return $this->hasMany(Usuarios::class, 'idEstatus', 'id');
    }
    //Una estatus puede perteneces a muchas verificaciones
    public function verificaciones_identidad(){
        return $this->hasMany(Verificaciones_identidad::class, 'idEstatus', 'id');
    }
    //Una estatus puede perteneces a muchas notificaciones
}
