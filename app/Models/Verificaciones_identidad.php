<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verificaciones_identidad extends Model
{
    //
    protected $table = 'verificaciones_identidad';

    protected $fillable = [
        'idUsuario',
        'documento', 
        'isEstatus', 
        'fechaSolicitud', 
        'fechaVerificacion'
    ];

    // Una verificación pertenece a un usuario
    public function usuarios(){
        return $this->belongsTo(Usuarios::class, 'idUsuario');
    }

    // Una verificación pertenece a un estatus
    public function estatus(){
        return $this->belongsTo(Estatus::class, 'idEstatus');
    }

    
}
