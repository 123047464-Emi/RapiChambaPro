<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idUsuario',
        'experiencia',
        'numTareas',
        //'idHabilidades'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'id');
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'idEmpleado', 'id');
    }
    public function habilidades()
    {
        return $this->belongsToMany(
            Habilidad::class, 
            'empleado_habilidad', // El nombre real de tu tabla pivote
            'idEmpleado',         // La llave en la tabla pivote que apunta a empleados
            'idHabilidad'         // La llave en la tabla pivote que apunta a habilidades
        );
    }
}
