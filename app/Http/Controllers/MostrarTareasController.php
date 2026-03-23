<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use App\Models\Categorias; // 
use Carbon\Carbon;

class MostrarTareasController extends Controller
{
    public function dashboardEmpleado()
    {
        // Obtener tareas disponibles con sus relaciones
        $tareas = Tareas::with(['ubicacion', 'categoria', 'estatus', 'empleador.usuario'])
                       ->whereHas('estatus', function($query) {
                           $query->where('nombre', 'Activo');
                       })
                       ->orderBy('fechaPublicacion', 'desc')
                       ->get();

        // Agregar tiempo transcurrido
        foreach ($tareas as $tarea) {
            $tarea->tiempo_transcurrido = Carbon::parse($tarea->fechaPublicacion)->diffForHumans();
        }

        // Obtener categorías desde la BD
        $categorias = Categorias::all();

        // Pasar $tareas y $categorias a la vista
        return view('Empleado.dashboardEmpleado', compact('tareas', 'categorias'));
    }
}



