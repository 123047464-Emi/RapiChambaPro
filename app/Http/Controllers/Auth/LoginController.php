<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // IMPORTANTE: Añade esta línea

class LoginController extends Controller
{
    // --- LOGIN TRADICIONAL ---
    public function login(Request $request)
    {
        $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('correo', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redireccionarSegunRol(Auth::user());
        }

        return back()->withErrors([
            'correo' => 'Las credenciales no son correctas.',
        ]);
    }

    // --- NUEVO: LOGIN BIOMÉTRICO ---
    public function loginBiometrico(Request $request)
    {
        $vectorLogin = $request->input('vector');

        if (!$vectorLogin) {
            return response()->json(['success' => false, 'message' => 'No se detectó rostro.'], 400);
        }

        // 1. Obtener todos los vectores registrados
        $registros = DB::table('usuarios_biometrico')->get();

        foreach ($registros as $registro) {
            $vectorGuardado = json_decode($registro->vector);

            // 2. Comparar (Distancia Euclidiana)
            $distancia = 0;
            for ($i = 0; $i < count($vectorLogin); $i++) {
                $distancia += pow($vectorLogin[$i] - $vectorGuardado[$i], 2);
            }
            $distancia = sqrt($distancia);

            // Umbral de 0.6 (estándar para face-api.js)
            if ($distancia < 0.6) {
                // 3. Loguear al usuario
                Auth::loginUsingId($registro->usuario_id);
                $request->session()->regenerate();

                // 4. Obtener URL de redirección según el rol
                $usuario = Auth::user();
                $url = route('home');

                if ($usuario->empleador) { $url = route('empleador.dashboardEmpleador'); }
                elseif ($usuario->empleado) { $url = route('empleado.dashboardEmpleado'); }

                return response()->json([
                    'success' => true,
                    'redirect' => $url
                ]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Rostro no reconocido.']);
    }

    // --- FUNCIÓN PRIVADA PARA EVITAR REPETIR CÓDIGO ---
    private function redireccionarSegunRol($usuario)
    {
        if ($usuario->empleador) {
            return redirect()->route('empleador.dashboardEmpleador');
        }
        if ($usuario->empleado) {
            return redirect()->route('empleado.dashboardEmpleado');
        }
        return redirect()->route('home');
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