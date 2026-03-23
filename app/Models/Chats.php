<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chats extends Model
{
    //
    protected $table = 'mensajes';

    protected $fillable = [
        'fechaCreacion',
    ];
}
