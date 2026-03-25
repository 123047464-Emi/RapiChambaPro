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
        'idHabilidades'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario', 'id');
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'idEmpleado', 'id');
    }
}
