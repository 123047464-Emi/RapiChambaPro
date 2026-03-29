<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Usuario;
use App\Models\Empleado;
use App\Models\Empleador;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Colonia;
use App\Models\Calle;
use App\Models\Direccion;
use App\Models\Habilidad;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function registrar(Request $request)
    {
        // Reglas comunes
        $rules = [
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'required|digits:10',
            'contrasena' => 'required|string|min:8',
            'codigo_postal' => 'required|digits:5',
            'estado' => 'required|string',
            'municipio' => 'required|string',
            'colonia' => 'required|string',
            'calle' => 'required|string',
            'numero_exterior' => 'required|string',
            'numero_interior' => 'nullable|string',
            'fotografia' => 'nullable|string', 
            'tipo_usuario' => 'required|in:empleado,empleador',
        ];

        // Reglas específicas
        if ($request->tipo_usuario === 'empleado') {
            $rules['experiencia'] = 'required|string';
            $rules['habilidades'] = 'nullable|string'; // JSON
        }

        if ($request->tipo_usuario === 'empleador') {
            $rules['descripcion'] = 'required|string';
            $rules['nombre_empresa'] = 'required|string|max:255';
        }

        $validated = $request->validate($rules);

        DB::beginTransaction();

        try {
            // --- DIRECCIÓN ---
            $estado = Estado::firstOrCreate(['nombre' => $validated['estado']]);
            $municipio = Municipio::firstOrCreate(['nombre' => $validated['municipio'], 'idEstado' => $estado->id]);
            $colonia = Colonia::firstOrCreate(['nombre' => $validated['colonia'], 'idMunicipio' => $municipio->id, 'CodigoPostal' => $validated['codigo_postal']]);
            $calle = Calle::firstOrCreate(['nombre' => $validated['calle'], 'idColonia' => $colonia->id]);
            
            $direccion = Direccion::create([
                'nombre' => $validated['calle'],
                'idCalle' => $calle->id,
                'numInterior' => $validated['numero_interior'] ?? null,
                'numExterior' => $validated['numero_exterior']
            ]);

            // --- USUARIO ---
            $usuario = new Usuario();
            $usuario->nombre = $validated['nombre'];
            $usuario->apellido_paterno = $validated['apellido_paterno'];
            $usuario->apellido_materno = $validated['apellido_materno'];
            $usuario->correo = $validated['correo'];
            $usuario->telefono = $validated['telefono'];
            $usuario->contrasena = Hash::make($validated['contrasena']);
            $usuario->fechainscripcion = Carbon::now();
            $usuario->idEstatus = 1; // activo
            $usuario->idUbicacion = $direccion->id;

            if ($request->hasFile('fotografia')) {
                $path = $request->file('fotografia')->store('public/fotografias');
                $usuario->fotografia = basename($path);
            }

            $usuario->save();

            // --- FACE ID BIOMÉTRICO ---
            if ($request->filled('vector_facial')) {
                $vectorData = $request->input('vector_facial');
                $fotoData = $request->input('foto_base64');

                DB::table('usuarios_biometrico')->insert([
                    'usuario_id' => $usuario->id,
                    'vector'     => $vectorData,
                    'foto'       => $fotoData,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // --- LÓGICA POR TIPO DE USUARIO ---
            if ($validated['tipo_usuario'] === 'empleado') {
                $empleado = new Empleado();
                $empleado->idUsuario = $usuario->id;
                $empleado->experiencia = $validated['experiencia'] ?? 'Sin experiencia';
                $empleado->numTareas = 0;
                $empleado->save();

                // Manejo de Habilidades (Tabla: empleado_habilidad)
                if (!empty($validated['habilidades'])) {
                    $habilidadesArray = is_array($validated['habilidades']) 
                        ? $validated['habilidades'] 
                        : json_decode($validated['habilidades'], true);

                    if ($habilidadesArray) {
                        foreach ($habilidadesArray as $nombreHab) {
                            $habilidad = DB::table('habilidades')->where('nombre', trim($nombreHab))->first();

                            if ($habilidad) {
                                DB::table('empleado_habilidad')->insert([
                                    'idEmpleado'  => $empleado->id,
                                    'idHabilidad' => $habilidad->id,
                                    'created_at'  => now(),
                                    'updated_at'  => now(),
                                ]);
                            }
                        }
                    }
                }
            } elseif ($validated['tipo_usuario'] === 'empleador') {
                $empleador = new Empleador();
                $empleador->idUsuario = $usuario->id;
                $empleador->nombre = $validated['nombre_empresa'];
                $empleador->descripcion = $validated['descripcion'];
                $empleador->numTareas = 0;
                $empleador->save();
            }

            DB::commit();

            Auth::login($usuario);
            $request->session()->regenerate();

            // Redirección final
            if ($validated['tipo_usuario'] === 'empleado') {
                return redirect()->route('empleado.dashboardEmpleado')
                    ->with('success', '¡Bienvenido a RapiChamba, ' . $validated['nombre'] . '!');
            } else {
                return redirect()->route('empleador.dashboardEmpleador')
                    ->with('success', '¡Bienvenido a RapiChamba, ' . $validated['nombre'] . '!');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => 'Error en el registro: ' . $e->getMessage()]);
        }
    }

        // Mostrar formulario de registro
    public function showRegistro()
    {
        $estados = Estado::all();
        $habilidades = Habilidad::all();
        return view('auth.registro', compact('estados','habilidades'));
    }

    public function getMunicipios($idEstado)
    {
        $municipios = Municipio::where('idEstado', $idEstado)->get();
        return response()->json($municipios);
    }
    public function getColonias($idMunicipio)
    {
        $colonias = Colonia::where('idMunicipio', $idMunicipio)->get();
        return response()->json($colonias);
    }

    public function getCalles($coloniaId)
    {
        $calles = Calle::where('idColonia', $coloniaId)->get();
        return response()->json($calles);
    }



}