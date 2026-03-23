<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    //
    protected $table = 'pagos';

    protected $fillable = [
        'montofinal',
        'fechaPago', 
        'idMetodo', 
        'idEstatus', 
        'idContrato'
    ];

    protected $dates=[
        'fechaPagos'
    ];

    //un pago pertenece a un estatus
    public function estatus(){
        return $this->belongsTo(Estatus::class, 'idEstatus', 'id');
    }

    //un pago tiene un metodo de pago
    public function metodospagos(){
        return $this->belongsTo(Metodospagos::class, 'idMetodo', 'id');
    }

    //Un pago pertenece a un contrato

    public function contratos(){
        return $this->belongsTo(Contratos::class, 'idContrato', 'id');
    }
}
