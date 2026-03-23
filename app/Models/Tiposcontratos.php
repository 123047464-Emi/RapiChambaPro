<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiposcontratos extends Model
{
    //
    protected $table = 'tiposcontratos';

    protected $fillable = [
        'nombre'
    ]; 

     // Un tipo de contrato puede tener muchos contratos
     public function contratos(){
        return $this->hasMany(Contratos::class, 'idTipo');
     }
}
