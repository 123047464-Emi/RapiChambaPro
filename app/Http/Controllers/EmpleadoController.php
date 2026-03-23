<?php

namespace App\Http\Controllers;



use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadorDashboardController extends Controller
{
    public function index()
    {
        // Traemos empleados con su usuario relacionado
        $empleados = Empleado::with('usuario')->get();

        return view('empleador.dashboardEmpleador', compact('empleados'));
    }
}