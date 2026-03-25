<?php

namespace App\Http\Controllers;



use App\Models\Empleado;
use Illuminate\Http\Request;


class EmpleadoController extends Controller
{
    public function dashboardEmpleado()
    {
        $empleados = Empleado::with('usuario')->get();
        return view('empleado.dashboardEmpleado', compact('empleados'));
    }
}

