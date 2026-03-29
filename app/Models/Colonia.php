<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Municipio;
use App\Models\Calle;

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
    public function municipio() {
        return $this->belongsTo(Municipio::class, 'idMunicipio', 'id');
    }

    // // Una colonia tiene muchas calles
    public function calles(){
        return $this->hasMany(Calle::class, 'idColonia', 'id');
    }

}
