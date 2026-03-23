<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calle extends Model
{
    //
    protected $table = 'calles'; 

    protected $fillable = [
        'nombre',
        'idColonia'
    ];

    // Una calle pertenece a una Colonia
    public function colonias() {
        return $this->belongsTo(Colonias::class, 'idColonia', 'id');
    }

    // // Una calle tiene muchas direcciones
    public function direcciones(){
        return $thi->hasMany(Direcciones:: class, 'idCalle', 'id');
    }
}
