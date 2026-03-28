<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapichamba - Dashboard Empleador</title>
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
            position: relative;
            overflow-x: hidden;
        }

        /* Círculos decorativos */
        .circle-decoration {
            position: fixed;
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
        }

        .circle-top-right-second {
            width: 500px;
            height: 500px;
            top: -100px;
            right: -100px;
            background: transparent;
            border: 50px solid #1D40AE;
        }

        .circle-bottom-left {
            width: 550px;
            height: 550px;
            bottom: -225px; 
            left: -200px;
            background: transparent;
            border: 60px solid #1D40AE;
        }

        /* Header */
        .header {
            background: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
        
        .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            gap: 3rem;
            align-items: center;
        }

        .nav-menu a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #1D40AE;
        }

        .nav-link {
            color: #1D40AE;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: opacity 0.3s;
        }

        .nav-link:hover {
            opacity: 0.7;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
            position: relative;
            z-index: 1;
        }

        /* Hero Section */
        .employer-hero {
            text-align: center;
            margin-bottom: 3rem;
        }

        .employer-title {
            font-size: 2rem;
            color: #333;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .employer-subtitle {
            color: #666;
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .publish-btn {
            background: #1D40AE;
            color: white;
            border: none;
            padding: 14px 32px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(29, 64, 174, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .publish-btn:hover {
            background: #152e7f;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(29, 64, 174, 0.4);
        }

        /* Stats Section */
        .stats-section {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            text-align: center;
            background: white;
            padding: 2rem 3rem;
            border-radius: 15px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(29, 64, 174, 0.2);
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            color: #1D40AE;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .stat-description {
            color: #666;
            font-size: 0.9rem;
        }

        /* Professionals Section */
        .professionals-section {
            margin-top: 3rem;
        }

        .section-title {
            color: #333;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
        }

        .professionals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .professional-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            text-align: center;
        }

        .professional-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(29, 64, 174, 0.2);
        }

        .professional-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            border: 4px solid #f5f5f5;
            box-shadow: 0 4px 12px rgba(29, 64, 174, 0.2);
        }
        .brand-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
            letter-spacing: 1px;
        }

        
        .brand-name {
            font-size: 1.2rem;
        }

        .professional-name {
            color: #333;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .verified-badge {
            color: #27ae60;
            font-size: 1rem;
        }

        .professional-specialty {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 0.8rem;
        }

        .professional-rating {
            color: #1D40AE;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
        }

        .professional-btn {
            width: 100%;
            padding: 12px;
            background: white;
            color: #1D40AE;
            border: 2px solid #1D40AE;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 15px;
        }

        .professional-btn:hover {
            background: #1D40AE;
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 2rem 1rem;
            }

            .nav-menu {
                gap: 1rem;
            }

            .nav-link {
                font-size: 14px;
            }

            .employer-title {
                font-size: 1.5rem;
            }

            .stats-section {
                flex-direction: column;
                gap: 1.5rem;
            }

            .stat-card {
                padding: 1.5rem 2rem;
            }

            .stat-value {
                font-size: 2rem;
            }

            .professionals-grid {
                grid-template-columns: 1fr;
            }

            .circle-decoration {
                display: none;
            }
        }
        
    </style>
</head>
<body>
    <!-- Círculos decorativos -->
    <div class="circle-decoration circle-top-right"></div>
    <div class="circle-decoration circle-top-right-second"></div>
    <div class="circle-decoration circle-bottom-left"></div>

    <!-- Header -->
    <header class="header">
        <div class="logo-container">
            <div class="logo-circle">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="logo-img">
            </div>
            <div class="brand-name">RAPICHAMBA</div>
        </div>
        <nav class="nav-menu">
            <a href="{{ route('empleador.dashboardEmpleador') }}">Inicio</a>
            <a href="{{ route('empleador.perfil') }}">Perfil</a>
            <a href="{{ route('Empleador.SiTerminarEmpleador') }}">Notificaciones</a>
        </nav>
    </header>

    <!-- Container -->
    <div class="container">
        <!-- Hero Section -->
        <div class="employer-hero">
            <h1 class="employer-title">¿Tienes algo que reparar hoy?</h1>
            <p class="employer-subtitle">Publica tu chamba en segundos y recibe ofertas de trabajadores verificados.</p>
            <a href="{{ route('empleador.publicar') }}" class="publish-btn">
                + Publicar Chamba Gratis
            </a>
        </div>

        <!-- Stats Section -->
        <div class="stats-section">
            <div class="stat-card">
                <div class="stat-label">En espera</div>
                <div class="stat-value">2</div>
                <div class="stat-description">Solicitudes</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">En progreso</div>
                <div class="stat-value">1</div>
                <div class="stat-description">Chamba activa</div>
            </div>
        </div>

        <!-- Professionals Section -->
 <!-- Professionals Section -->
        <div class="professionals-section">
            <h2 class="section-title">Profesionales Recomendados</h2>
            <div class="professionals-grid">
                @foreach($empleados as $empleado)
                    <div class="professional-card">
                        <!-- Avatar: iniciales del nombre -->
                        <div class="professional-avatar">
                            {{ strtoupper(substr($empleado->usuario->nombre,0,1)) }}{{ strtoupper(substr($empleado->usuario->apellido_paterno,0,1)) }}
                        </div>

                        <!-- Nombre completo -->
                        <div class="professional-name">
                            {{ $empleado->usuario->nombre }} {{ $empleado->usuario->apellido_paterno }} {{ $empleado->usuario->apellido_materno }}
                            @if($empleado->usuario->estatus && $empleado->usuario->estatus->nombre === 'Verificado')
                                <span class="verified-badge">✓</span>
                            @endif
                        </div>

                        <!-- Especialidad / experiencia -->
                        <div class="professional-specialty">
                            {{ $empleado->experiencia }}
                        </div>

                        <!-- Rating simulado: podrías calcularlo con tareas o contratos -->
                        <div class="professional-rating">
                            ⭐ {{ number_format(rand(4,5) + (rand(0,9)/10), 1) }} ({{ $empleado->numTareas }} Reseñas)
                        </div>

                        <button class="professional-btn">Ver Perfil</button>
                    </div>
                @endforeach
            </div>
        </div>
@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('success') }}",
            text: "Tu cuenta se ha creado correctamente 🎉",
            imageUrl: "{{ asset('img/Logo.png') }}", 
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: "Logo RapiChamba",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif
</body>
</html>