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
            'correo' => 'El usuario o la contraseña son incorrectos.',
        ]);
    }

    // --- LOGIN BIOMÉTRICO ---
    public function loginBiometrico(Request $request)
    {
        $vectorEscaneado = $request->input('vector'); // Array de 128 números

        if (!$vectorEscaneado || !is_array($vectorEscaneado)) {
            return response()->json(['success' => false, 'message' => 'No se recibió el vector facial']);
        }

        // 1. Obtenemos todos los vectores registrados en la DB
        $registros = DB::table('usuarios_biometrico')->get();

        $usuarioIdEncontrado = null;
        $umbralSimilitud = 0.6; // Entre más bajo, más estricto. 0.6 es el estándar de face-api.

        foreach ($registros as $registro) {
            $vectorGuardado = json_decode($registro->vector);

            // 2. Calculamos la Distancia Euclidiana entre los dos vectores
            $distancia = $this->calcularDistancia($vectorEscaneado, $vectorGuardado);

            if ($distancia < $umbralSimilitud) {
                $usuarioIdEncontrado = $registro->usuario_id;
                break; // ¡Encontrado!
            }
        }

        if ($usuarioIdEncontrado) {
            $usuario = Usuario::find($usuarioIdEncontrado);
            Auth::login($usuario);

            // 3. Determinar a dónde mandarlo
            $esEmpleado = DB::table('empleados')->where('idUsuario', $usuario->id)->exists();
            $redirect = $esEmpleado ? route('empleado.dashboardEmpleado') : route('empleador.dashboardEmpleador');

            return response()->json([
                'success' => true,
                'redirect' => $redirect
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Rostro no reconocido']);
    }

    // Función matemática para comparar rostros
    private function calcularDistancia($v1, $v2) {
        $suma = 0;
        for ($i = 0; $i < count($v1); $i++) {
            $suma += pow($v1[$i] - $v2[$i], 2);
        }
        return sqrt($suma);
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