<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Direccion;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Colonia;
use App\Models\Calle;
use App\Models\Tareas;

class TareaController extends Controller
{
    // Mostrar formulario
    public function create()
    {
        $estados = Estado::all();
        $municipios = Municipio::all();
        $colonias = Colonia::all();
        $calles = Calle::all();

        return view('Empleador.crearTarea', compact('estados', 'municipios', 'colonias', 'calles'));
    }

    // Guardar en BD
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'presupuesto' => 'required|numeric|min:0',
            'fechaPublicacion' => 'required|date',
            'fechaLimite' => 'required|date|after:fechaPublicacion',
            'calle' => 'required|exists:calles,id',
            'colonia' => 'required|exists:colonias,id',
            'municipio' => 'required|exists:municipios,id',
            'estado' => 'required|exists:estados,id',
        ]);

        // Guardar dirección
        $direccion = Direccion::create([
            'idCalle' => $request->calle,
        ]);

        // Buscar el empleador vinculado al usuario autenticado
        $empleador = Auth::user()->empleador;
        

        if (!$empleador) {
            return redirect()->back()->withErrors('El usuario autenticado no tiene un empleador asociado.');
        }

        // Guardar tarea
        Tareas::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'presupuesto' => $request->presupuesto,
            'fechaPublicacion' => $request->fechaPublicacion,
            'fechaLimite' => $request->fechaLimite,
            'idUbicacion' => $direccion->id,
            'idCategoria' => 1,
            'idEstatus' => 1,
            'idEmpleador' => $empleador->id, // 👈 aquí va el id de la tabla empleadores
        ]);

        return redirect()->route('empleador.dashboardEmpleador')
                        ->with('success', 'La tarea ha sido publicada con éxito');
    }

}
