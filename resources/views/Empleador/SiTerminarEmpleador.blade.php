<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RapiChamba - En Construcción</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Decorative circles */
        .circle-decoration {
            position: fixed;
            border-radius: 50%;
            background: transparent;
            border: 120px solid #1D40AE;
            z-index: 0;
        }

        .circle-1 {
            width: 800px;
            height: 800px;
            top: -400px;
            right: -400px;
        }

        .circle-2 {
            width: 700px;
            height: 700px;
            bottom: -350px;
            left: -350px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px; /* también puedes reducir el espacio entre logo y texto */
        }

        .logo-placeholder {
            width: 30px;   /* antes 50px */
            height: 30px;  /* antes 50px */
            border-radius: 50%;
            background: #f5f5f5;
            border: 2px dashed #ddd;
            font-size: 8px; /* más pequeño para el texto dentro */
            color: #999;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .logo-img {
            width: 60px;   /* ajusta según lo que quieras */
            height: 60px;
            object-fit: contain; /* mantiene proporción */
        }

        .brand-name {
            font-size: 24px;
            font-weight: bold;
            color: #1D40AE;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-menu a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #1D40AE;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 5;
            padding: 40px 20px;
        }

        .construction-container {
            max-width: 700px;
            text-align: center;
            background: white;
            border-radius: 30px;
            padding: 60px 40px;
            box-shadow: 0 20px 60px rgba(29, 64, 174, 0.15);
        }

        .construction-icon {
            font-size: 120px;
            margin-bottom: 30px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .main-title {
            font-size: 48px;
            color: #1D40AE;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 24px;
            color: #666;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .description {
            font-size: 18px;
            color: #888;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .feature-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            transition: all 0.3s;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(29, 64, 174, 0.1);
        }

        .feature-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .feature-text {
            color: #333;
            font-weight: 500;
            font-size: 16px;
        }

        .back-btn {
            display: inline-block;
            padding: 15px 40px;
            background: #1D40AE;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(29, 64, 174, 0.3);
        }

        .back-btn:hover {
            background: #152f7f;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(29, 64, 174, 0.4);
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e0e0e0;
            border-radius: 10px;
            margin: 30px 0;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #1D40AE, #4169E1);
            border-radius: 10px;
            animation: progress 2s ease-in-out infinite;
        }

        @keyframes progress {
            0% {
                width: 0%;
            }
            50% {
                width: 70%;
            }
            100% {
                width: 0%;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 20px 30px;
                flex-direction: column;
                gap: 20px;
            }

            .nav-menu {
                flex-direction: column;
                gap: 15px;
            }

            .construction-container {
                padding: 40px 30px;
            }

            .main-title {
                font-size: 36px;
            }

            .subtitle {
                font-size: 20px;
            }

            .construction-icon {
                font-size: 80px;
            }

            .circle-1, .circle-2 {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Decorative Circles -->
    <div class="circle-decoration circle-1"></div>
    <div class="circle-decoration circle-2"></div>

    <!-- Header -->
    <header class="header">
        <div class="logo-container">
            <div class="logo-circle">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="logo-img">
            </div>
            <div class="brand-name">RAPICHAMBA</div>
        </div>
        <nav class="nav-menu">
            <a href="{{ route('empleador.dashboardEmpleador') }}">← Volver</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="construction-container">
            <div class="construction-icon">🛠️</div>
            
            <h1 class="main-title">¡Seguimos Chambeando!</h1>
            <p class="subtitle">Estamos trabajando en esta sección</p>
            
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
            
            <p class="description">
                Nuestro equipo está dándole duro para traerte las mejores herramientas. 
                Esta función estará lista muy pronto. ¡No te despegues!
            </p>

            <div class="features">
                <div class="feature-item">
                    <div class="feature-icon">⚡</div>
                    <div class="feature-text">Rápido y Eficiente</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🎯</div>
                    <div class="feature-text">Muy Pronto</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">💪</div>
                    <div class="feature-text">Vale la Pena</div>
                </div>
            </div>

            <a href="{{ route('empleador.dashboardEmpleador') }}" class="back-btn">Volver al Inicio</a>
        </div>
    </div>
</body>
</html>