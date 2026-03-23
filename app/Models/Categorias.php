<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    //
    protected $table = 'categorias';

    protected $fillable = [
        'nombre', 
        'descripcion'
    ];

    //Una categoria puede perteneces a muchas tareas
    public function tareas(){
        return $this->haveMany(Tareas::class, 'idCategoria', 'id');
    }
}
