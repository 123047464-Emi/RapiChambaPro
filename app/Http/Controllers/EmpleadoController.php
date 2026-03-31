<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Contrato;
use App\Models\Calificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EmpleadoController extends Controller
{
    // ✅ YA LO TENÍAS (déjalo)
    public function dashboardEmpleado()
    {
        $empleados = Empleado::with('usuario')->get();
        return view('empleado.dashboardEmpleados', compact('empleados'));

    }

    // 🔥 NUEVO MÉTODO (EL IMPORTANTE)
    public function misChambas()
    {
        $usuario = Auth::user();

        if (!$usuario) {
            return redirect()->route('login');
        }

        $empleado = Empleado::where('idUsuario', $usuario->id)->first();

        if (!$empleado) {
            return view('empleado.misChambas', [
                'contratos' => collect(),
                'calificaciones' => collect(),
                'totalPostulaciones' => 0,
                'completados' => 0,
                'enProgreso' => 0,
                'cancelados' => 0,
                'totalGanado' => 0,
                'gananciasPorMes' => collect(),
                'trabajosPorMes' => collect(),
            ]);
        }

        // ✅ contratos
        $contratos = Contrato::where('idEmpleado', $empleado->id)
            ->with(['tarea.categoria', 'TiposContratos', 'estatus'])
            ->orderByDesc('FechaInicio')
            ->get();

        // ✅ estadísticas
        $totalPostulaciones = $contratos->count();

        $completados = $contratos->filter(fn($c) => $c->estatus?->Nombre === 'Completado')->count();
        $enProgreso  = $contratos->filter(fn($c) => $c->estatus?->Nombre === 'En progreso')->count();
        $cancelados  = $contratos->filter(fn($c) => $c->estatus?->Nombre === 'Cancelado')->count();

        $totalGanado = $contratos
            ->filter(fn($c) => $c->estatus?->Nombre === 'Completado')
            ->sum('MontoPact');

        // ✅ ganancias por mes
        $gananciasPorMes = $contratos
            ->filter(fn($c) => $c->estatus?->Nombre === 'Completado' && $c->Fecha_Fin)
            ->groupBy(fn($c) => Carbon::parse($c->Fecha_Fin)->format('Y-m'))
            ->map(fn($g) => $g->sum('MontoPact'))
            ->sortKeys()
            ->slice(-6);

        // ✅ trabajos por mes
        $trabajosPorMes = $contratos
            ->filter(fn($c) => $c->FechaInicio)
            ->groupBy(fn($c) => Carbon::parse($c->FechaInicio)->format('Y-m'))
            ->map(fn($g) => $g->count())
            ->sortKeys()
            ->slice(-6);

        // ✅ calificaciones
        $calificaciones = Calificaciones::where('idEmpleado', $empleado->id)
            ->orderByDesc('FechaCalificacion')
            ->take(5)
            ->get();

        return view('empleado.misChambas', compact(
            'contratos',
            'calificaciones',
            'totalPostulaciones',
            'completados',
            'enProgreso',
            'cancelados',
            'totalGanado',
            'gananciasPorMes',
            'trabajosPorMes'
        ));
    }
    public function perfilEmpleado()
    {
        $usuario = Auth::user();

        if (!$usuario) {
            return redirect()->route('login');
        }

        // Buscar el empleado ligado al usuario autenticado
        $empleado = Empleado::where('idUsuario', $usuario->id)->first();

        return view('empleado.perfil', compact('empleado'));
    }

}