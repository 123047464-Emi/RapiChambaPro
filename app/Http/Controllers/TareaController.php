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
use App\Models\Categorias;
use App\Models\Contrato;

class TareaController extends Controller
{
    // Mostrar formulario
    public function create()
    {
        $estados = Estado::all();
        $municipios = Municipio::all();
        $colonias = Colonia::all();
        $calles = Calle::all();
        $categorias = Categorias::all();

        return view('Empleador.crearTarea', compact('estados', 'municipios', 'colonias', 'calles', 'categorias'));
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
        
        //  Validar si ya tiene una tarea activa
        $tareaActiva = Tareas::where('idEmpleador', $empleador->id)
            ->where('idEstatus', 1) // 1 = activa (ajusta si usas otro valor)
            ->exists();

        if ($tareaActiva) {
            //return redirect()->route('planes.index') // crea esta ruta si no existe
            //    ->with('error', 'Ya tienes una tarea publicada. Contrata un plan para publicar más.');
        }
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
            'idEmpleador' => $empleador->id, 
        ]);

        return redirect()->route('empleador.dashboardEmpleador')
                        ->with('success', 'La tarea ha sido publicada con éxito');
    }
    
    public function update(Request $request, $id)
    {
        $tarea = Tareas::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'presupuesto' => 'required|numeric|min:0',
        ]);

        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->presupuesto = $request->presupuesto;
        $tarea->save();

        return response()->json(['success' => true]);
    }

    //Eliminar tarea (eliminación lógica)
    public function destroy($id)
    {
        $tarea = Tareas::findOrFail($id);
        $tarea->idEstatus = 4; // por ejemplo, 4 = Cancelada/Inactiva
        $tarea->save();

        return response()->json(['success' => true]);
    }

    public function verPostulados($id)
    {
        $tarea = Tareas::with(['contratos.empleado.usuario'])->findOrFail($id);
        return view('Empleador.postulados', compact('tarea'));
    }


}
