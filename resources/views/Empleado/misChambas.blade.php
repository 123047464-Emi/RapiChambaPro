@php
    use Illuminate\Support\Facades\Auth;
    $usuario = Auth::user();
    $empleado = \App\Models\Empleado::where('idUsuario', $usuario->id)->first();

    // ── Contratos del empleado ──
    $contratos = \App\Models\Contrato::where('idEmpleado', $empleado?->id)
        ->with(['tarea', 'estatus', 'TiposContratos'])
        ->orderByDesc('FechaInicio')
        ->get();

    // ── Stats generales ──
    $totalPostulaciones  = $contratos->count();
    $completados         = $contratos->where('estatus.Nombre', 'Completado')->count();
    $enProgreso          = $contratos->where('estatus.Nombre', 'En progreso')->count();
    $cancelados          = $contratos->where('estatus.Nombre', 'Cancelado')->count();
    $totalGanado         = $contratos->where('estatus.Nombre', 'Completado')->sum('MontoPact');

    // ── Ganancias por mes (últimos 6 meses) ──
    $gananciasPorMes = $contratos
        ->where('estatus.Nombre', 'Completado')
        ->groupBy(fn($c) => \Carbon\Carbon::parse($c->Fecha_Fin)->format('Y-m'))
        ->map(fn($g) => $g->sum('MontoPact'))
        ->sortKeys()
        ->take(-6);

    // ── Trabajos por mes (últimos 6 meses) ──
    $trabajosPorMes = $contratos
        ->groupBy(fn($c) => \Carbon\Carbon::parse($c->Fecha_Inicio)->format('Y-m'))
        ->map(fn($g) => $g->count())
        ->sortKeys()
        ->take(-6);

    // ── Calificaciones recientes ──
    $calificaciones = \App\Models\Calificaciones::where('idEmpleado', $empleado?->id)
        ->orderByDesc('FechaCalificacion')
        ->take(5)
        ->get();
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RapiChamba – Mis Chambas</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        html {
            font-size: 18px;
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

        /* ── Header ── */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 60px;
            background: white;
            box-shadow: 0 2px 12px rgba(29,64,174,0.1);
            position: relative;
            z-index: 10;
        }
        .brand-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
            letter-spacing: 1px;
        }
        .nav-menu { display: flex; gap: 30px; align-items: center; }
        .nav-menu a { color: #555; text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.2s; }
        .nav-menu a:hover, .nav-menu a.active { color: #1D40AE; font-weight: 600; }
        .nav-menu a.active { border-bottom: 2.5px solid #1D40AE; padding-bottom: 2px; }

        /* ── Page wrapper ── */
        .page { max-width: 1100px; margin: 40px auto; padding: 0 30px 60px; position: relative; z-index: 5; }

        /* ── Page title ── */
        .page-title {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 26px;
            font-weight: 800;
            color: #0d1f6e;
            margin-bottom: 6px;
        }
        .page-subtitle { font-size: 14px; color: #888; margin-bottom: 32px; }

        /* ── Stats cards row ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: white;
            border-radius: 18px;
            padding: 20px 18px;
            box-shadow: 0 6px 24px rgba(29,64,174,0.08);
            display: flex;
            flex-direction: column;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            border-radius: 18px 18px 0 0;
        }
        .stat-card.blue::before  { background: #1D40AE; }
        .stat-card.green::before { background: #16a34a; }
        .stat-card.amber::before { background: #d97706; }
        .stat-card.red::before   { background: #dc2626; }
        .stat-card.teal::before  { background: #0891b2; }

        .stat-icon {
            width: 40px; height: 40px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 19px;
        }
        .stat-icon.blue  { background: #EEF2FF; }
        .stat-icon.green { background: #f0fdf4; }
        .stat-icon.amber { background: #fffbeb; }
        .stat-icon.red   { background: #fef2f2; }
        .stat-icon.teal  { background: #ecfeff; }

        .stat-num {
            font-family: 'Sora', sans-serif;
            font-size: 26px;
            font-weight: 800;
            color: #0d1f6e;
            line-height: 1;
        }
        .stat-lbl { font-size: 12px; color: #999; text-transform: uppercase; letter-spacing: 0.4px; }

        /* ── Charts row ── */
        .charts-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 28px;
        }
        .chart-card {
            background: white;
            border-radius: 20px;
            padding: 26px 28px;
            box-shadow: 0 6px 24px rgba(29,64,174,0.08);
        }
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .chart-title {
            font-family: 'Sora', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: #0d1f6e;
        }
        .chart-subtitle { font-size: 12px; color: #aaa; margin-top: 2px; }
        .chart-badge {
            background: #EEF2FF;
            color: #1D40AE;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 8px;
        }
        canvas { width: 100% !important; }

        /* ── Donut card ── */
        .donut-card {
            background: white;
            border-radius: 20px;
            padding: 26px 28px;
            box-shadow: 0 6px 24px rgba(29,64,174,0.08);
            margin-bottom: 28px;
        }
        .donut-inner {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 32px;
            align-items: center;
        }
        .donut-legend { display: flex; flex-direction: column; gap: 14px; }
        .legend-item { display: flex; align-items: center; gap: 10px; }
        .legend-dot { width: 12px; height: 12px; border-radius: 50%; flex-shrink: 0; }
        .legend-lbl { font-size: 13px; color: #555; font-weight: 500; }
        .legend-val { font-family: 'Sora', sans-serif; font-size: 15px; font-weight: 700; color: #0d1f6e; margin-left: auto; }

        /* ── Tables section ── */
        .tables-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .table-card {
            background: white;
            border-radius: 20px;
            padding: 26px 28px;
            box-shadow: 0 6px 24px rgba(29,64,174,0.08);
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .table-title {
            font-family: 'Sora', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: #0d1f6e;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .table-title-icon {
            width: 32px; height: 32px;
            background: #EEF2FF;
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
        }

        /* Filtros de tabla */
        .tab-filters { display: flex; gap: 8px; }
        .tab-btn {
            padding: 6px 14px;
            border-radius: 8px;
            border: 1.5px solid #e0e7ff;
            background: transparent;
            color: #888;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .tab-btn.active, .tab-btn:hover {
            background: #1D40AE;
            color: white;
            border-color: #1D40AE;
        }

        table { width: 100%; border-collapse: collapse; }
        thead tr { border-bottom: 1.5px solid #eef2ff; }
        th {
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0 0 12px;
        }
        td {
            padding: 14px 0;
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #f5f7ff;
            vertical-align: middle;
        }
        tr:last-child td { border-bottom: none; }

        .job-name { font-weight: 600; color: #0d1f6e; margin-bottom: 2px; }
        .job-cat  { font-size: 12px; color: #aaa; }

        /* Status badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; }
        .badge-green  { background: #f0fdf4; color: #16a34a; }
        .badge-green::before  { background: #16a34a; }
        .badge-blue   { background: #EEF2FF; color: #1D40AE; }
        .badge-blue::before   { background: #1D40AE; }
        .badge-amber  { background: #fffbeb; color: #d97706; }
        .badge-amber::before  { background: #d97706; }
        .badge-red    { background: #fef2f2; color: #dc2626; }
        .badge-red::before    { background: #dc2626; }
        .badge-gray   { background: #f9fafb; color: #6b7280; }
        .badge-gray::before   { background: #6b7280; }

        .monto { font-family: 'Sora', sans-serif; font-weight: 700; color: #16a34a; }
        .monto-pending { color: #d97706; }
        .fecha { font-size: 13px; color: #aaa; }

        /* Stars */
        .stars { color: #FFD700; font-size: 14px; letter-spacing: 1px; }
        .stars .off { color: #e5e7eb; }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 40px 0;
            color: #ccc;
            font-size: 14px;
        }
        .empty-state .emoji { font-size: 36px; margin-bottom: 10px; display: block; }

        @media (max-width: 900px) {
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .charts-row { grid-template-columns: 1fr; }
            .donut-inner { grid-template-columns: 1fr; }
            .header { padding: 16px 24px; flex-direction: column; gap: 14px; }
            .nav-menu { flex-wrap: wrap; justify-content: center; gap: 14px; }
            .circle-1, .circle-2 { display: none; }
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
    <div class="logo-section">
            <div class="logo-circle">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="logo-img">
            </div>
        <span class="brand-name">Empleado</span>
    </div>
    <nav class="nav-menu">
        <a href="{{ route('empleado.dashboardEmpleado') }}">Inicio</a>
        <a href="{{ route('empleado.misChambas') }}" class="active">Mis Chambas</a>
        <a href="{{ route('Empleado.SinTerminarEmpleado') }}">Mensajes</a>
        <a href="{{ route('Empleado.SinTerminarEmpleado') }}">Notificaciones</a>
    </nav>
</header>

<div class="page">

    <h1 class="page-title">Mis Chambas</h1>
    <p class="page-subtitle">Resumen de tu actividad, contratos y ganancias en RapiChamba</p>

    <!-- ── Stats Row ── -->
    <div class="stats-row">
        <div class="stat-card blue">
            <div class="stat-icon blue"></div>
            <div class="stat-num">{{ $totalPostulaciones }}</div>
            <div class="stat-lbl">Total postulaciones</div>
        </div>
        <div class="stat-card green">
            <div class="stat-icon green"></div>
            <div class="stat-num">{{ $completados }}</div>
            <div class="stat-lbl">Completados</div>
        </div>
        <div class="stat-card amber">
            <div class="stat-icon amber"></div>
            <div class="stat-num">{{ $enProgreso }}</div>
            <div class="stat-lbl">En progreso</div>
        </div>
        <div class="stat-card red">
            <div class="stat-icon red"></div>
            <div class="stat-num">{{ $cancelados }}</div>
            <div class="stat-lbl">Cancelados</div>
        </div>
        <div class="stat-card teal">
            <div class="stat-icon teal"></div>
            <div class="stat-num">${{ number_format($totalGanado, 0) }}</div>
            <div class="stat-lbl">Total ganado</div>
        </div>
    </div>

    <!-- ── Charts Row ── -->
    <div class="charts-row">

        <!-- Ganancias por mes -->
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <div class="chart-title">Ganancias mensuales</div>
                    <div class="chart-subtitle">Últimos 6 meses</div>
                </div>
                <div class="chart-badge">MXN</div>
            </div>
            <canvas id="chartGanancias" height="200"></canvas>
        </div>

        <!-- Trabajos por mes -->
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <div class="chart-title">Chambas por mes</div>
                    <div class="chart-subtitle">Últimos 6 meses</div>
                </div>
                <div class="chart-badge">Contratos</div>
            </div>
            <canvas id="chartTrabajos" height="200"></canvas>
        </div>

    </div>

    <!-- ── Donut: Distribución de estados ── -->
    <div class="donut-card">
        <div class="chart-header">
            <div>
                <div class="chart-title">Distribución de contratos</div>
                <div class="chart-subtitle">Por estado actual</div>
            </div>
        </div>
        <div class="donut-inner">
            <canvas id="chartDonut" height="200"></canvas>
            <div class="donut-legend">
                <div class="legend-item">
                    <div class="legend-dot" style="background:#1D40AE"></div>
                    <span class="legend-lbl">Completados</span>
                    <span class="legend-val">{{ $completados }}</span>
                </div>
                <div class="legend-item">
                    <div class="legend-dot" style="background:#d97706"></div>
                    <span class="legend-lbl">En progreso</span>
                    <span class="legend-val">{{ $enProgreso }}</span>
                </div>
                <div class="legend-item">
                    <div class="legend-dot" style="background:#dc2626"></div>
                    <span class="legend-lbl">Cancelados</span>
                    <span class="legend-val">{{ $cancelados }}</span>
                </div>
                <div class="legend-item">
                    <div class="legend-dot" style="background:#0891b2"></div>
                    <span class="legend-lbl">Otros</span>
                    <span class="legend-val">{{ $totalPostulaciones - $completados - $enProgreso - $cancelados }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ── Tabla de contratos ── -->
    <div class="tables-row">
        <div class="table-card">
            <div class="table-header">
                <div class="table-title">
                    <div class="table-title-icon"></div>
                    Historial de chambas
                </div>
                <div class="tab-filters">
                    <button class="tab-btn active" onclick="filtrarTabla('todos', this)">Todos</button>
                    <button class="tab-btn" onclick="filtrarTabla('Completado', this)">Completados</button>
                    <button class="tab-btn" onclick="filtrarTabla('En progreso', this)">En progreso</button>
                    <button class="tab-btn" onclick="filtrarTabla('Cancelado', this)">Cancelados</button>
                </div>
            </div>

            @if($contratos->count() > 0)
            <table id="tablaContratos">
                <thead>
                    <tr>
                        <th>Chamba</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Monto</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contratos as $contrato)
                    @php
                        $statusNombre = $contrato->status?->Nombre ?? 'Pendiente';
                        $badgeClass = match($statusNombre) {
                            'Completado'  => 'badge-green',
                            'En progreso' => 'badge-amber',
                            'Cancelado'   => 'badge-red',
                            'Postulado'   => 'badge-blue',
                            default       => 'badge-gray',
                        };
                    @endphp
                    <tr data-status="{{ $statusNombre }}">
                        <td>
                            <div class="job-name">{{ $contrato->tarea?->nombre ?? 'Sin nombre' }}</div>
                            <div class="job-cat">{{ $contrato->tarea?->categoria?->Nombre ?? '' }}</div>
                        </td>
                        <td><span class="fecha">{{ \Carbon\Carbon::parse($contrato->FechaInicio)->format('d/m/Y') }}</span></td>
                        <td><span class="fecha">{{ $contrato->FechaFin ? \Carbon\Carbon::parse($contrato->FechaFin)->format('d/m/Y') : '—' }}</span></td>
                        <td>
                            <span class="monto {{ $statusNombre !== 'Completado' ? 'monto-pending' : '' }}">
                                ${{ number_format($contrato->tarea?->presupuesto ?? 0, 0) }}
                            </span>
                        </td>
                        <td><span class="badge {{ $badgeClass }}">{{ $statusNombre }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="empty-state">
                    <span class="emoji">🔍</span>
                    Aún no tienes chambas registradas.
                </div>
            @endif
        </div>

        <!-- Calificaciones recientes -->
        <div class="table-card">
            <div class="table-header">
                <div class="table-title">
                    <div class="table-title-icon">⭐</div>
                    Calificaciones recientes
                </div>
            </div>

            @if($calificaciones->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Puntuación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calificaciones as $cal)
                    <tr>
                        <td>
                            <div class="job-name">
                                {{ $cal->usuario?->nombre ?? 'Usuario' }} {{ $cal->usuario?->apellido_paterno ?? '' }}
                            </div>
                        </td>
                        <td><span class="fecha">{{ \Carbon\Carbon::parse($cal->FechaCalificacion)->format('d/m/Y') }}</span></td>
                        <td>
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $cal->Puntuacion)
                                        ★
                                    @else
                                        <span class="off">★</span>
                                    @endif
                                @endfor
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="empty-state">
                    <span class="emoji">💬</span>
                    Aún no tienes calificaciones.
                </div>
            @endif
        </div>

    </div>
</div>

<script>
// ── Datos desde PHP ──
const gananciasMeses = @json($gananciasPorMes->keys()->map(fn($m) => \Carbon\Carbon::createFromFormat('Y-m', $m)->translatedFormat('M Y')));
const gananciasVals  = @json($gananciasPorMes->values());

const trabajosMeses  = @json($trabajosPorMes->keys()->map(fn($m) => \Carbon\Carbon::createFromFormat('Y-m', $m)->translatedFormat('M Y')));
const trabajosVals   = @json($trabajosPorMes->values());

const colores = {
    blue:  '#1D40AE',
    blueL: 'rgba(29,64,174,0.12)',
    green: '#16a34a',
    greenL:'rgba(22,163,74,0.12)',
};

// ── Chart: Ganancias ──
new Chart(document.getElementById('chartGanancias'), {
    type: 'bar',
    data: {
        labels: gananciasMeses,
        datasets: [{
            label: 'Ganancias MXN',
            data: gananciasVals,
            backgroundColor: colores.blueL,
            borderColor: colores.blue,
            borderWidth: 2,
            borderRadius: 10,
            borderSkipped: false,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            x: { grid: { display: false }, ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#aaa' } },
            y: { grid: { color: '#f0f4ff' }, ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#aaa', callback: v => '$' + v.toLocaleString() } }
        }
    }
});

// ── Chart: Trabajos por mes ──
new Chart(document.getElementById('chartTrabajos'), {
    type: 'line',
    data: {
        labels: trabajosMeses,
        datasets: [{
            label: 'Contratos',
            data: trabajosVals,
            borderColor: colores.green,
            backgroundColor: colores.greenL,
            borderWidth: 2.5,
            pointBackgroundColor: colores.green,
            pointRadius: 5,
            fill: true,
            tension: 0.4,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            x: { grid: { display: false }, ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#aaa' } },
            y: { grid: { color: '#f0f4ff' }, ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#aaa', stepSize: 1 } }
        }
    }
});

// ── Chart: Donut distribución ──
new Chart(document.getElementById('chartDonut'), {
    type: 'doughnut',
    data: {
        labels: ['Completados', 'En progreso', 'Cancelados', 'Otros'],
        datasets: [{
            data: [
                {{ $completados }},
                {{ $enProgreso }},
                {{ $cancelados }},
                {{ $totalPostulaciones - $completados - $enProgreso - $cancelados }}
            ],
            backgroundColor: ['#1D40AE', '#d97706', '#dc2626', '#0891b2'],
            borderWidth: 0,
            hoverOffset: 6,
        }]
    },
    options: {
        responsive: true,
        cutout: '72%',
        plugins: {
            legend: { display: false },
            tooltip: { callbacks: { label: ctx => ` ${ctx.label}: ${ctx.parsed}` } }
        }
    }
});

// ── Filtro de tabla ──
function filtrarTabla(status, btn) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('#tablaContratos tbody tr').forEach(row => {
        row.style.display = (status === 'todos' || row.dataset.status === status) ? '' : 'none';
    });
}
</script>

</body>
</html>