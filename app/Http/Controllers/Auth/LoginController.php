<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // --- LOGIN TRADICIONAL ---
    public function login(Request $request)
    {
        $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Laravel usa 'email' y 'password' por defecto, 
        // pero mapeamos 'correo' según tus credenciales
        $credentials = [
            'correo' => $request->correo,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redireccionarSegunRol(Auth::user());
        }

        return back()->withErrors([
            'correo' => 'Las credenciales no son correctas.',
        ]);
    }

    // --- LOGIN BIOMÉTRICO ---
    public function loginBiometrico(Request $request)
    {
        $vectorLogin = $request->input('vector');

        if (!$vectorLogin) {
            return response()->json(['success' => false, 'message' => 'No se detectó rostro.'], 400);
        }

        $registros = DB::table('usuarios_biometrico')->get();

        foreach ($registros as $registro) {
            $vectorGuardado = json_decode($registro->vector);

            // Comparar (Distancia Euclidiana)
            $distancia = 0;
            for ($i = 0; $i < count($vectorLogin); $i++) {
                $distancia += pow($vectorLogin[$i] - $vectorGuardado[$i], 2);
            }
            $distancia = sqrt($distancia);

            if ($distancia < 0.6) {
                // Verificar que el usuario aún exista en la tabla principal
                $usuarioExiste = DB::table('usuarios')->where('id', $registro->usuario_id)->exists();
                
                if (!$usuarioExiste) {
                    continue; // Si el usuario fue borrado, seguir con el siguiente registro
                }

                // Loguear al usuario
                Auth::loginUsingId($registro->usuario_id);
                $request->session()->regenerate();

                // Obtener URL usando la función centralizada de roles
                $url = $this->obtenerUrlPorRol($registro->usuario_id);

                return response()->json([
                    'success' => true,
                    'redirect' => $url
                ]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Rostro no reconocido.']);
    }

    // --- LÓGICA DE REDIRECCIÓN CENTRALIZADA ---

    private function redireccionarSegunRol($usuario)
    {
        $url = $this->obtenerUrlPorRol($usuario->id);
        return redirect()->to($url);
    }

    private function obtenerUrlPorRol($usuarioId)
    {
        // Consultamos directamente las tablas que me mostraste
        $esEmpleador = DB::table('empleadores')->where('idUsuario', $usuarioId)->exists();
        $esEmpleado = DB::table('empleados')->where('idUsuario', $usuarioId)->exists();

        if ($esEmpleador) {
            return route('empleador.dashboardEmpleador');
        }

        if ($esEmpleado) {
            return route('empleado.dashboardEmpleado');
        }

        return route('home');
    }

    // --- CERRAR SESIÓN ---
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}