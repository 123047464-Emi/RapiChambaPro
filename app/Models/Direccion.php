<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //
    protected $table = 'direcciones';

    protected $fillable = [
        'nombre', 
        'numero_interior',
        'numero_exterior', 
        'idCalle'
    ];

    //Una dirección pertenece a una calle
    public function calles(){
        return $this->belongsTo(Calles::class, 'idCalle', 'id');
    }
}
