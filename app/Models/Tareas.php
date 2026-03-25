<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    protected $table = 'tareas';

    protected $fillable = [
        'nombre',
        'fechaPublicacion',
        'fechaLimite',
        'descripcion',
        'presupuesto',
        'idUbicacion',
        'idCategoria',
        'idEstatus', 
        'idEmpleador'
    ];

    // 🔹 Relación: Tarea → Dirección
    public function ubicacion()
    {
        return $this->belongsTo(Direccion::class, 'idUbicacion', 'id');
    }

    // 🔹 Relación: Tarea → Categoría
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'idCategoria', 'id');
    }

    // 🔹 Relación: Tarea → Estatus
    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'idEstatus', 'id');
    }

    // 🔹 Relación: Tarea → Empleador
    public function empleador()
    {
        return $this->belongsTo(Empleador::class, 'idEmpleador', 'id');
    }
}