<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;
use App\Models\Colonia;

class Municipio extends Model
{
    //
    protected $table = 'municipios';
    
        protected $fillable = [
        'nombre',
        'idEstado'
    ];

    // Un municipio pertenece a un estado
    public function estado() {
        return $this->belongsTo(Estado::class, 'idEstado', 'id');
    }

    // Un municipio tiene muchas colonias
    public function colonias(){
    return $this->hasMany(Colonia::class, 'idMunicipio', 'id');
    }


}
