
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta - RAPICHAMBA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Círculos decorativos */
        .circle-decoration {
            position: absolute;
            border-radius: 50%;
            z-index: 0;
        }

        .circle-top-right {
            width: 450px;
            height: 450px;
            top: -100px;
            right: -300px;
            background: transparent;
            border: 50px solid #1D40AE;
            position: absolute;
            border-radius: 50%;
        }

        .circle-top-right-second {
            width: 500px;
            height: 500px;
            top: -100px;       /* muévelo hacia abajo */
            right: -100px;    /* misma posición horizontal */
            background: transparent;
            border: 50px solid #1D40AE;
            position: absolute;
            border-radius: 50%;
        }
        .circle-bottom-left {
            width: 550px;
            height: 550px;
            bottom: -225px; 
            left: -200px;
            background: transparent;
            border: 60px solid #1D40AE;
        }

        /* Contenedor principal */
        .signup-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 40px 50px;
            width: 100%;
            max-width: 420px;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        /* Logo */
        .logo-container {
            margin-bottom: 25px;
        }

        .logo {
            width: 180px;
            height: 180px;
            margin: 0 auto;
            border: 4px solid #1D40AE;
            border-radius: 50%;
            padding: 10px;
            background: white;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Título */
        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .subtitle {
            font-size: 15px;
            color: #666;
            margin-bottom: 25px;
        }

        /* Formulario */
        .form-group {
            margin-bottom: 18px;
            text-align: left;
        }

        .form-label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #1D40AE;
            box-shadow: 0 0 0 3px rgba(29, 64, 174, 0.1);
        }

        .forgot-password {
            text-align: right;
            margin-top: 6px;
        }

        .forgot-password a {
            color: #1D40AE;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Botón principal */
        .btn-primary {
            width: 100%;
            padding: 12px;
            background: #000;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 18px;
        }

        .btn-primary:hover {
            background: #333;
            transform: translateY(-2px);
        }

        /* Separador */
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: #999;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #ddd;
        }

        .divider::before {
            margin-right: 12px;
        }

        .divider::after {
            margin-left: 12px;
        }

        /* Botón de Google */
        .btn-google {
            width: 100%;
            padding: 12px;
            background: #f5f5f5;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-google:hover {
            background: #e8e8e8;
            border-color: #ccc;
        }

        .google-icon {
            width: 18px;
            height: 18px;
        }

        /* Footer del formulario */
        .form-footer {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
            line-height: 1.5;
        }

        .form-footer a {
            color: #1D40AE;
            text-decoration: none;
            font-weight: 500;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Texto de registro */
        .signup-text {
            margin-top: 20px;
            font-size: 13px;
            color: #666;
        }

        .signup-text a {
            color: #1D40AE;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-text a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .signup-container {
                padding: 30px 25px;
                margin: 15px;
                max-width: 95%;
            }

            .logo {
                width: 150px;
                height: 150px;
            }

            h1 {
                font-size: 24px;
            }

            .circle-decoration {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Círculos decorativos -->
    <div class="circle-decoration circle-top-right"></div>
    <div class="circle-decoration circle-top-right-second"></div>
    <div class="circle-decoration circle-bottom-left"></div>


    <!-- Contenedor principal -->
    <div class="signup-container">
        <!-- Logo -->
        <div class="logo-container">
            <div class="logo">
                <img src="img/Logo.png" alt="Logo Rapichamba">
            </div>
        </div>

        <!-- Título -->
        <h1>Bienvenido de nuevo</h1>
        <p class="subtitle">Introduce tus credenciales para acceder</p>

        <!-- Formulario -->
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <input 
                    type="email" 
                    name="correo"   
                    class="form-input" 
                    placeholder="email@gmail.com"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <input 
                    type="password" 
                    name="password" 
                    class="form-input" 
                    placeholder="••••••••"
                    required
                >
                <div class="forgot-password">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>
            </div>

            @if ($errors->any())
                <div style="color: red; font-size: 13px; margin-bottom: 10px; text-align: left;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn-primary">
                Iniciar sesión
            </button>
        </form>

        <!-- Separador -->
        <div class="divider">o continuar con</div>

        <!-- Botón de Google -->
        <button class="btn-google">
            <svg class="google-icon" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
            </svg>
            Google
        </button>

                <!-- Botón para ir al registro -->
        <div class="signup-text">
            ¿No tienes cuenta? <a href="{{ route('registro') }}">Regístrate</a>
        </div>


        <!-- Footer -->
        <div class="form-footer">
            Al hacer clic en continuar, aceptas nuestro <a href="#">Términos de servicio</a> y <a href="#">Política de privacidad</a>
        </div>

    </div>
</body>
</html>