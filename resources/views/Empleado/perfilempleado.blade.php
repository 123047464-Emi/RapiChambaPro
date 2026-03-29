@php
    use Illuminate\Support\Facades\Auth;

    $usuario = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RapiChamba - Mi Perfil</title>
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

        /* Profile Container */
        .profile-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 30px;
            position: relative;
            z-index: 5;
        }

        .profile-header {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(29, 64, 174, 0.1);
            margin-bottom: 30px;
            text-align: center;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            font-weight: bold;
            border: 5px solid white;
            box-shadow: 0 5px 20px rgba(29, 64, 174, 0.3);
        }

        .profile-name {
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-type {
            display: inline-block;
            background: #1D40AE;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .profile-stats {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #1D40AE;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Profile Sections */
        .profile-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(29, 64, 174, 0.1);
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 24px;
            color: #1D40AE;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .info-item {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .info-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-tag {
            background: #1D40AE;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }

        .btn-primary {
            background: #1D40AE;
            color: white;
        }

        .btn-primary:hover {
            background: #152f7f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(29, 64, 174, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #1D40AE;
            border: 2px solid #1D40AE;
        }

        .btn-secondary:hover {
            background: #f8f9fa;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 5px;
            justify-content: center;
            margin-top: 10px;
        }

        .star {
            color: #FFD700;
            font-size: 20px;
        }

        .rating-value {
            color: #666;
            margin-left: 5px;
            font-size: 14px;
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

            .profile-stats {
                flex-direction: column;
                gap: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .circle-1, .circle-2 {
                display: none;
            }
        }
        .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 24px; /* cuadrado redondeado en vez de círculo */
        background: linear-gradient(135deg, #1D40AE, #4169E1);
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 42px;
        font-weight: bold;
        box-shadow: 0 8px 28px rgba(29, 64, 174, 0.4);
    }

    .profile-name {
        font-size: 30px;
        color: #1a1a2e;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .verified-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #EEF2FF;
        border: 1.5px solid #c7d2fe;
        border-radius: 10px;
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        color: #1D40AE;
        margin-bottom: 14px;
    }

    .verified-badge::before {
        content: '';
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #1D40AE;
        animation: blink 2s ease-in-out infinite;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50%       { opacity: 0.3; }
    }

    .rating {
        display: flex;
        align-items: center;
        gap: 3px;
        justify-content: center;
        margin-bottom: 4px;
    }

    .rating .star     { color: #FFD700; font-size: 22px; }
    .rating .star.empty { color: #dde3ff; font-size: 22px; }

    .rating-text {
        color: #888;
        font-size: 14px;
        margin-bottom: 28px;
    }

    .stats-container {
        display: flex;
        justify-content: center;
        gap: 0;
        border-top: 1.5px solid #eef2ff;
        padding-top: 24px;
        margin-top: 4px;
    }

    .stat-item {
        flex: 1;
        text-align: center;
        padding: 0 20px;
        border-right: 1.5px solid #eef2ff;
    }

    .stat-item:last-child { border-right: none; }

    .stat-icon {
        font-size: 22px;
        margin-bottom: 4px;
        display: block;
    }

    .stat-number {
        font-size: 28px;
        font-weight: 800;
        color: #1D40AE;
        display: block;
        line-height: 1;
        margin-bottom: 4px;
    }

    .stat-label {
        color: #999;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
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
            <div class="brand-name">Empleado</div>
        </div>
        <nav class="nav-menu">
            <a href="{{ route('empleado.dashboardEmpleado') }}">Inicio</a>
            <a href="{{ route('empleado.misChambas') }}" class="active">Mis Chambas</a>
            <a href="{{ route('Empleado.SinTerminarEmpleado') }}">Mensajes</a>
            <a href="{{ route('Empleado.SinTerminarEmpleado') }}">Notificaciones</a>
        </nav>
    </header>

    @if($usuario)

    @php
        // Obtener el modelo completo del empleado
        $empleado = \App\Models\Empleado::where('idUsuario', $usuario->id)->first();

        // ── Estadísticas ──
        $trabajosCompletados = $empleado?->trabajos_completados ?? 0;
        $tasaExito           = $empleado?->tasa_exito ?? 0;
        $aniosPlataforma     = $empleado?->anios_plataforma ?? 0;

        // ── Rating ──
        $rating       = $empleado?->calificacion ?? 0;
        $totalResenas = $empleado?->total_resenas ?? 0;

        // ── Habilidades ──
        $habilidades = $empleado?->habilidades ?? [];

        // ── Dirección ──
        $direccion = \App\Models\Direccion::find($usuario->idUbicacion);
        $calle = $direccion ? \App\Models\Calle::find($direccion->idCalle) : null;
        $colonia = $calle ? \App\Models\Colonia::find($calle->idColonia) : null;
        $municipio = $colonia ? \App\Models\Municipio::find($colonia->idMunicipio) : null;
        $estado = $municipio ? \App\Models\Estado::find($municipio->idEstado) : null;
    @endphp

    <!-- Profile Container -->
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar">
                {{ strtoupper(substr($usuario->nombre, 0, 1)) }}{{ strtoupper(substr($usuario->apellido_paterno, 0, 1)) }}
            </div>

            <h1 class="profile-name">{{ $usuario->nombre }} {{ $usuario->apellido_paterno }}</h1>

            <div class="verified-badge">Trabajador Verificado</div>

            <div class="rating">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= floor($rating))
                        ★
                    @else
                        <span class="empty">★</span>
                    @endif
                @endfor
            </div>
            <div class="rating-text">{{ number_format($rating,1) }} - {{ $totalResenas }} reseñas</div>

            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-number">{{ $trabajosCompletados }}</div>
                    <div class="stat-label">Trabajos completados</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $tasaExito }}%</div>
                    <div class="stat-label">Tasa de éxito</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $aniosPlataforma }}</div>
                    <div class="stat-label">Años en la plataforma</div>
                </div>
            </div>
        </div>

        <!-- Información Personal -->
        <div class="profile-section">
            <h2 class="section-title">📋 Información Personal</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">EMAIL</span>
                    <span class="info-value">{{ $usuario->correo }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">TELÉFONO</span>
                    <span class="info-value">{{ $usuario->telefono }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">UBICACIÓN</span>
                    <span class="info-value">
                        {{ $calle?->nombre ?? '' }},
                        {{ $colonia?->nombre ?? '' }},
                        {{ $municipio?->nombre ?? '' }},
                        {{ $estado?->nombre ?? '' }}
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">MIEMBRO DESDE</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($usuario->created_at)->translatedFormat('F Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Habilidades -->
        <div class="profile-section">
            <h2 class="section-title">🎯 Habilidades</h2>
            <div class="skills-container">
                @forelse($habilidades as $habilidad)
                    <span class="skill-tag">{{ is_string($habilidad) ? $habilidad : $habilidad->nombre }}</span>
                @empty
                    <span class="skill-tag">Plomería</span>
                    <span class="skill-tag">Electricidad</span>
                    <span class="skill-tag">Carpintería</span>
                @endforelse
            </div>
        </div>

        <!-- Sobre mí -->
        <div class="profile-section">
            <h2 class="section-title">✍️ Sobre mí</h2>
            <p class="about-text">{{ $empleado?->descripcion ?? 'Soy un profesional con más de 10 años de experiencia...' }}</p>
        </div>
    </div>

    @else
        <div style="text-align:center; padding: 4rem; color: #666;">
            No hay usuario logueado.
        </div>
    @endif
</body>