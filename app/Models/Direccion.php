<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Colonia;
use App\Models\Calle;

class Direccion extends Model
{
    // Nombre de la tabla en la BD
    protected $table = 'direcciones'; // 👈 cámbialo si tu tabla se llama distinto

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'idCalle',
        'numInterior',
        'numExterior', 
        'latitud',
        'longitud'
    ];

    // Relaciones opcionales
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idEstado');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'idMunicipio');
    }

    public function colonia()
    {
        return $this->belongsTo(Colonia::class, 'idColonia');
    }

    public function calle()
    {
        return $this->belongsTo(Calle::class, 'idCalle');
    }
}
