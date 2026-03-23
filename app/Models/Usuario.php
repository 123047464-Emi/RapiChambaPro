<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'telefono',
        'contrasena',
        'fechainscripcion',
        'idUbicacion',
        'idEstatus',
    ];

    protected $hidden = [
        'contrasena',
    ];

    // Campo de contraseña
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    // Campo de login
    public function getAuthIdentifierName()
    {
        return 'id'; // 👈 el identificador real en la BD
    }
    // Relaciones
    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'idDireccion', 'id');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'idEstatus', 'id');
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'idUsuario', 'id');
    }

    public function empleador()
    {
        return $this->hasOne(Empleador::class, 'idUsuario', 'id');
    }



}
