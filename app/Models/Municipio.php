<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
    protected $table = 'municipios';
    
        protected $fillable = [
        'nombre',
        'idEstado'
    ];

    // Un municipio pertenece a un estado
    public function estados() {
        return $this->belongsTo(Estado::class, 'idEstado', 'id');
    }

    // Un municipio tiene muchas colonias
    public function colonias(){
        return $this->hasMany(Colonias:: class, 'idMunicipio', 'id');
    }

}
