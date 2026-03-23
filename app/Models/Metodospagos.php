<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metodospagos extends Model
{
    //
    protected $table='metodospagos';

    protected $fillable=[
        'nombre'
    ];

    //un metodo pertenece a muchos pagos
    public function pagos(){
        return $this->hasMany(Pagos::class, 'idMetodo', 'id');
    }
}
