<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    protected $table = 'mensajes';

    protected $fillable = [
        'IdChat',
        'IdUsuarioEmisor',
        'IdUsuarioReceptor',
        'Contenido',
        'FechaYHora',
        'IdEstatus'
    ];

    // Relación con Chat
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'IdChat');
    }

    // Relación con Usuario (Emisor)
    public function emisor()
    {
        return $this->belongsTo(Usuario::class, 'IdUsuarioEmisor');
    }

    // Relación con Usuario (Receptor)
    public function receptor()
    {
        return $this->belongsTo(Usuario::class, 'IdUsuarioReceptor');
    }

    // Relación con Estatus
    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'IdEstatus');
    }
}