<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre', 
        'descripcion'
    ];

    // Una categoría puede tener muchas tareas
    public function tareas(){
        return $this->hasMany(Tareas::class, 'idCategoria', 'id');
    }
}
