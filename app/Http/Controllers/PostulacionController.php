<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Empleado;
use Illuminate\Support\Carbon;

class PostulacionController extends Controller
{
    public function store(Request $request, $tareaId)
    {
        $usuario = auth()->user();

        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Debes iniciar sesión primero'
            ], 401);
        }

        // Buscar o crear perfil de empleado
        $empleado = $usuario->empleado;
        if (!$empleado) {
            $empleado = Empleado::create([
                'IdUsuario' => $usuario->id,
                'Experiencia' => 'Sin especificar',
                'NumTareas' => 0,
                'IdHabilidades' => null
            ]);
        }

        // Verificar si ya existe un contrato para esta tarea
        $existe = Contrato::where('idEmpleado', $empleado->Id)
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
                'FechaInicio' => Carbon::now(),
                'FechaFin' => null,              // o calcula según tu lógica
                'idEstatus' => 1,                // pendiente
                'idTarea' => $tareaId,
                'idEmpleado' => $empleado->Id,
                'idTipo' => 1                     // tipo de contrato predeterminado
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Te has postulado correctamente',
                'contrato' => $contrato
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}
