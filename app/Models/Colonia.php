<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    //
    protected $table = 'colonias'; 

    protected $fillable = [
        'nombre',
        'codigoPostal',
        'idMunicipio'
    ];

    // Una colonia pertenece a un municipio
    public function municipios() {
        return $this->belongsTo(Municipios::class, 'idEstado', 'id');
    }

    // // Una colonia tiene muchas calles
    public function calles(){
        return $this->hasMany(Calles:: class, 'idColonia', 'id');
    }
}
