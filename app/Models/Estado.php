<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados'; // Si tu tabla se llama así

    protected $fillable = ['nombre'];

    // Un estado tiene muchos municipios
    public function municipios() {
        return $this->hasMany(Municipio::class, 'idEstado', 'id');
    }
}
