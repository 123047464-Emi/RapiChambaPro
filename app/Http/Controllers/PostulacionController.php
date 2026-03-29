<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Empleado;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Tareas;

class PostulacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $tareaId)
    {
        $usuario = auth()->user();

        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Debes iniciar sesión primero'
            ], 401);
        }

        // ✅ Validar que la tarea exista
        if (!Tareas::find($tareaId)) {
            return response()->json([
                'success' => false,
                'message' => 'La tarea no existe'
            ], 404);
        }

        // Obtener o crear perfil de empleado
        $empleado = $usuario->empleado;
        if (!$empleado) {
            $empleado = Empleado::create([
                'idUsuario' => $usuario->id,
                'experiencia' => 'Sin especificar',
                'numTareas' => 0,
                'idHabilidades' => null
            ]);
        }

        // Verificar si ya existe contrato
        $existe = Contrato::where('idEmpleado', $empleado->id)
            ->where('idTarea', $tareaId)
            ->first();

        if ($existe) {
            return response()->json([
                'success' => false,
                'message' => 'Ya te has postulado a esta tarea'
            ]);
        }

        try {
            $contrato = Contrato::create([
                'FechaInicio' => now(),
                'FechaFin' => null,
                'idEstatus' => 1,
                'idTarea' => $tareaId,
                'idEmpleado' => $empleado->id,
                'idTipo' => 1
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Te has postulado correctamente',
                'contrato' => $contrato
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al registrar la postulación',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
