<?php

namespace App\Http\Controllers;
use App\Services\GeocodingService;
use Illuminate\Http\Request;
use App\Models\Tareas; 
use App\Models\Categorias;
use App\Models\Empleado;
use Carbon\Carbon;

class MostrarTareasController extends Controller
{
    public function dashboardEmpleado()
    {
        // Obtener tareas con relaciones
        $tareas = Tareas::with([
            'ubicacion.calle.colonia.municipio.estado',
            'categoria',
            'estatus',
            'empleador.usuario'
        ])  
            ->whereHas('estatus', fn($q) => $q->where('nombre', 'Activo'))
            ->orderBy('fechaPublicacion', 'desc')
            ->get();

        // Agregar tiempo transcurrido
        foreach ($tareas as $tarea) {
            $tarea->tiempo_transcurrido = Carbon::parse($tarea->fechaPublicacion)->diffForHumans();
        }

        // Traer categorías
        $categorias = Categorias::all();

        // Traer empleados con su usuario
        $empleados = Empleado::with('usuario')->get();

        return view('Empleado.dashboardEmpleado', compact('tareas', 'categorias', 'empleados'));
    }
}
