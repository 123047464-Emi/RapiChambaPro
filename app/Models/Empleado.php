<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Empleado extends Authenticatable
{
    use Notifiable;

    protected $table = 'empleados';

    protected $fillable = ['nombre', 'correo', 'password'];

    protected $hidden = ['password', 'remember_token'];

    // 👇 Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'id'); 
        // Ajusta 'usuario_id' al nombre real de tu FK
    }
}
