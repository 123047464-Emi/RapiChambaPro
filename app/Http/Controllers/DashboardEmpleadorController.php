<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tareas;
use Illuminate\Support\Facades\Auth; 

class DashboardEmpleadorController extends Controller
{
    public function index()
    {
        return view('Empleador.dashboardEmpleador');
    }

    public function tareasPublicadas()
    {
        $usuario = Auth::user();
        $empleador = $usuario->empleador; // relación User → Empleador

        if (!$empleador) {
            return redirect()->back()->withErrors('El usuario no tiene un empleador asociado.');
        }

        $tareas = Tareas::where('idEmpleador', $empleador->id)
            ->where('idEstatus', '!=', 4) // Excluir tareas canceladas/inactivas
            ->with(['estatus','categoria','contratos'])
            ->get();



        return view('empleador.tareasPublicadas', compact('tareas'));
    }


}