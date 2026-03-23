<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // --- INICIAR SESIÓN ---
    public function login(Request $request)
    {
        // 1. Validar
        $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Tomar credenciales
        $credentials = $request->only('correo', 'password');

        // 3. Intentar entrar
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $usuario = Auth::user();

            // 4. Determinar rol según relaciones
            if ($usuario->empleador) {
                return redirect()->route('empleador.dashboardEmpleador');
            }

            if ($usuario->empleado) {
                return redirect()->route('empleado.dashboardEmpleado');
            }

            // Si no es ni empleador ni empleado, mándalo a home
            return redirect()->route('home');
        }

        // 5. Si falla
        return back()->withErrors([
            'correo' => 'Las credenciales no son correctas.',
        ]);
    }

    // --- CERRAR SESIÓN ---
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // --- Campo de login ---
    protected function username()
    {
        return 'correo';
    }
}
