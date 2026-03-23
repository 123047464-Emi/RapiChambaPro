<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    protected $table = 'habilidades';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    // Relación muchos a muchos con Empleado
    public function empleados()
    {
        return $this->belongsToMany(
            Empleado::class,            
            'empleado_habilidad',      
            'idHabilidad',              
            'idEmpleado'                
        )->withTimestamps();
    }
}
