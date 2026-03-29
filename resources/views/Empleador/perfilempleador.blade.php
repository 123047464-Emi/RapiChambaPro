@php
    use Illuminate\Support\Facades\Auth;

    $usuario = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil Empleador</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #eef0f7;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
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
        /* ── Decoraciones ── */
        .wave-top-right {
            position: fixed;
            top: 85px; right: 0;
            width: 560px; height: 420px;
            background: #1D40AE;
            clip-path: ellipse(68% 52% at 100% 18%);
            z-index: 0;
            pointer-events: none;
        }
        .wave-bottom-left {
            position: fixed;
            bottom: 0; left: 0;
            width: 380px; height: 320px;
            background: #1D40AE;
            clip-path: ellipse(58% 48% at 0% 100%);
            z-index: 0;
            pointer-events: none;
        }

        /* ── Header ── */
        .header {
            padding: 1.2rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 10;
            background: white;
            box-shadow: 0 1px 0 rgba(0,0,0,.06);
        }
        .logo-section {
            display: flex;
            align-items: center;
            gap: 0.85rem;
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

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-circle {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
        }

        .logo-circle img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

            
        .logo-circle {
                width: 70px;
                height: 70px;
        }
        .brand-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
            letter-spacing: 1px;
        }

        /* ── Layout principal ── */
        .main-content {
            max-width: 960px;
            margin: 1.2rem auto 5rem;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: 1.3rem;
        }

        /* ── Tarjeta de perfil ── */
        .profile-card {
            background: white;
            border-radius: 22px;
            padding: 2.6rem 2.5rem 2rem;
            box-shadow: 0 4px 24px rgba(0,0,0,.07);
            text-align: center;
        }
        .company-logo {
            width: 120px; height: 120px;
            background: #f4f5fb;
            border: 2px dashed #c8cfe8;
            border-radius: 16px;
            margin: 0 auto 1.3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aac8;
            font-size: 0.75rem;
            line-height: 1.5;
            overflow: hidden;
        }
        .company-logo img {
            width: 100%; height: 100%;
            object-fit: contain;
            border-radius: 14px;
        }
        .company-name {
            font-size: 1.85rem;
            color: #111827;
            font-weight: 800;
            letter-spacing: -0.6px;
            margin-bottom: 0.85rem;
        }
        .verified-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.38rem;
            background: #1D40AE;
            color: white;
            padding: 0.4rem 1.1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            letter-spacing: 0.2px;
        }
        .rating {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.2rem;
            margin-bottom: 0.25rem;
        }
        .star { color: #FBBF24; font-size: 1.3rem; }
        .star.empty { color: #dde0ec; }
        .rating-text {
            color: #9099b8;
            font-size: 0.85rem;
            margin-bottom: 1.8rem;
        }

        /* Stats */
        .stats {
            display: flex;
            justify-content: space-around;
            padding-top: 1.6rem;
            border-top: 1.5px solid #eef0f7;
        }
        .stat-item { text-align: center; flex: 1; }
        .stat-value {
            font-size: 2.1rem;
            color: #1D40AE;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 0.25rem;
        }
        .stat-label {
            color: #9099b8;
            font-size: 0.78rem;
            font-weight: 500;
        }

        /* ── Secciones de info ── */
        .info-section {
            background: white;
            border-radius: 18px;
            padding: 1.7rem 2rem;
            box-shadow: 0 2px 14px rgba(0,0,0,.06);
            position: relative;
        }
        .section-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #1D40AE;
            font-weight: 700;
            font-size: 0.97rem;
            margin-bottom: 1.35rem;
            padding-bottom: 0.75rem;
            border-bottom: 1.5px solid #eef0f7;
        }
        .edit-link {
            position: absolute;
            top: 1.7rem; right: 2rem;
            color: #1D40AE;
            text-decoration: none;
            font-size: 0.78rem;
            font-weight: 600;
            opacity: .7;
            transition: opacity .2s;
        }
        .edit-link:hover { opacity: 1; }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem 2.5rem;
        }
        .info-item {
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }
        .info-label {
            color: #b0b8d0;
            font-size: 0.68rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.8px;
        }
        .info-value {
            color: #111827;
            font-size: 0.93rem;
            font-weight: 500;
        }

        /* Skills */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.65rem;
        }
        .skill-badge {
            background: #1D40AE;
            color: white;
            padding: 0.45rem 1.1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Description */
        .description-text {
            color: #4b5268;
            line-height: 1.75;
            font-size: 0.92rem;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .header { padding: 1rem 1.2rem; }
            .nav-links { gap: 1.5rem; }
            .main-content { padding: 0 1rem; }
            .info-grid { grid-template-columns: 1fr; }
            .stats { flex-direction: column; gap: 1.4rem; }
            .wave-top-right, .wave-bottom-left { display: none; }
        }
    </style>
</head>
<body>

    <div class="circle-decoration circle-top-right"></div>
    <div class="circle-decoration circle-top-right-second"></div>
    <div class="circle-decoration circle-bottom-left"></div>

<!-- ── Header ── -->
<header class="header">
    <div class="logo-section">
            <div class="logo-circle">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="logo-img">
            </div>
        <span class="brand-name">Empleador</span>
    </div>
    <nav class="nav-menu">
        <a href="{{ route('empleador.dashboardEmpleador') }}">Inicio</a>
        <a href="{{ route('Empleador.SiTerminarEmpleador') }}">Mensajes</a>
        <a href="{{ route('empleador.tareasPublicadas') }}">Tareas Publicadas</a>
        <a href="{{ route('Empleador.SiTerminarEmpleador') }}">Notificaciones</a>
    </nav>
</header>

@if($usuario)

@php
    $empleador = \App\Models\Empleador::where('idUsuario', $usuario->id)->first();

    /* ── Estadísticas ── */
    $trabajosPublicados = $empleador?->trabajos_publicados ?? 0;
    $tasaFinalizacion   = $empleador?->tasa_finalizacion   ?? 0;
    $aniosPlataforma    = $empleador?->anios_plataforma    ?? 0;

    /* ── Rating ── */
    $rating       = $empleador?->calificacion   ?? 0;
    $totalResenas = $empleador?->total_resenas  ?? 0;

    /* ── Habilidades ── */
    $habilidades = $empleador?->habilidades ?? [];

    /* 🔥 NUEVO: DIRECCIÓN */
    $direccion = \App\Models\Direccion::find($usuario->idUbicacion);
    $calle = $direccion ? \App\Models\Calle::find($direccion->idCalle) : null;
    $colonia = $calle ? \App\Models\Colonia::find($calle->idColonia) : null;
    $municipio = $colonia ? \App\Models\Municipio::find($colonia->idMunicipio) : null;
    $estado = $municipio ? \App\Models\Estado::find($municipio->idEstado) : null;
@endphp

<div class="main-content">

    <!-- ── Tarjeta principal ── -->
    <div class="profile-card">

        <div class="company-logo">
            @if($empleador?->logo)
                <img src="{{ asset('storage/' . $empleador->logo) }}" alt="Logo empresa">
            @else
                Logo de<br>la Empresa
            @endif
        </div>

        <h1 class="company-name">
            {{ $empleador?->nombre ?? ($usuario->nombre . ' ' . $usuario->apellido_paterno) }}
        </h1>

        <div class="verified-badge">
            💼 Empleador Verificado
        </div>

        <div class="rating">
            @for($i = 1; $i <= 5; $i++)
                @if($i <= floor($rating))
                    <span class="star">★</span>
                @else
                    <span class="star empty">★</span>
                @endif
            @endfor
        </div>
        <p class="rating-text">{{ number_format($rating, 1) }} · {{ $totalResenas }} reseñas</p>

        <div class="stats">
            <div class="stat-item">
                <div class="stat-value">{{ $trabajosPublicados }}</div>
                <div class="stat-label">Trabajos publicados</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">{{ $tasaFinalizacion }}%</div>
                <div class="stat-label">Tasa de Finalización</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">{{ $aniosPlataforma }}</div>
                <div class="stat-label">Años en la plataforma</div>
            </div>
        </div>
    </div>

    <!-- ── Datos Personales ── -->
    <div class="info-section">
        <div class="section-header">🪪 Datos Personales</div>
        <a href="{{ url('/perfil/editar') }}" class="edit-link">Información es pública ✎</a>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Nombre Completo</span>
                <span class="info-value">
                    {{ $usuario->nombre }}
                    {{ $usuario->apellido_paterno }}
                    {{ $usuario->apellido_materno }}
                </span>
            </div>
            <div class="info-item">
                <span class="info-label">Teléfono</span>
                <span class="info-value">{{ $usuario->telefono }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Email</span>
                <span class="info-value">{{ $usuario->correo }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Miembro desde</span>
                <span class="info-value">
                    {{ \Carbon\Carbon::parse($usuario->created_at)->translatedFormat('F Y') }}
                </span>
            </div>
        </div>
    </div>

    @if($empleador)

    <!-- ── Información de la Empresa ── -->
    <div class="info-section">
        <div class="section-header">🏢 Información de la Empresa</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Nombre de la Empresa</span>
                <span class="info-value">{{ $empleador->nombre }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Industria</span>
                <span class="info-value">{{ $empleador->industria }}</span>
            </div>
        </div>
    </div>

    <!-- ── Dirección ── -->
    <div class="info-section">
        <div class="section-header">📍 Dirección</div>
        <div class="info-grid">

            <div class="info-item">
                <span class="info-label">Calle</span>
                <span class="info-value">
                    {{ $calle?->nombre }} #{{ $direccion?->numExterior }}
                </span>
            </div>

            <div class="info-item">
                <span class="info-label">Colonia</span>
                <span class="info-value">{{ $colonia?->nombre }}</span>
            </div>

            <div class="info-item">
                <span class="info-label">Municipio</span>
                <span class="info-value">{{ $municipio?->nombre }}</span>
            </div>

            <div class="info-item">
                <span class="info-label">Estado</span>
                <span class="info-value">{{ $estado?->nombre }}</span>
            </div>

        </div>
    </div>

    <!-- ── Habilidades Buscadas ── -->
    @if(!empty($habilidades) && count($habilidades) > 0)
    <div class="info-section">
        <div class="section-header">🔧 Habilidades Buscadas</div>
        <div class="skills-container">
            @foreach($habilidades as $habilidad)
                <span class="skill-badge">
                    {{ is_string($habilidad) ? $habilidad : $habilidad->nombre }}
                </span>
            @endforeach
        </div>
    </div>
    @endif

    <!-- ── Descripción ── -->
    @if($empleador->descripcion)
    <div class="info-section">
        <div class="section-header">⚡ Descripción</div>
        <p class="description-text">{{ $empleador->descripcion }}</p>
    </div>
    @endif

    @endif

</div>

@else
    <div style="text-align:center; padding: 4rem; color: #666;">
        No hay usuario logueado.
    </div>
@endif

</body>