<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RapiChamba - Tareas Publicadas</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
    }

    /* ── CIRCLES ── */
    .circle-decoration {
      position: fixed;
      border-radius: 50%;
      z-index: 0;
      pointer-events: none;
    }
    .circle-top-right {
      width: 450px; height: 450px;
      top: -100px; right: -300px;
      background: transparent;
      border: 50px solid #1D40AE;
    }
    .circle-top-right-second {
      width: 500px; height: 500px;
      top: -100px; right: -100px;
      background: transparent;
      border: 50px solid #1D40AE;
    }
    .circle-bottom-left {
      width: 550px; height: 550px;
      bottom: -225px; left: -200px;
      background: transparent;
      border: 60px solid #1D40AE;
    }

    td:last-child {   /* si Postulados es la última columna */
      text-align: center;       /* centra horizontalmente */
      vertical-align: middle;   /* alinea verticalmente con la fila */
    }

    .btn-ver {
      display: inline-block;
      margin-top: 0.5px;          /* espacio respecto al borde superior */
      padding: 6px 12px;
      background-color: #007bff;
      color: #fff;
      border-radius: 4px;
      text-decoration: none;
      font-size: 14px;
    }

    .btn-ver:hover {
      background-color: #0056b3;
    }

    /* ── HEADER ── */
    .header {
      background: white;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      position: relative;
      z-index: 10;
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
    .nav-menu {
      display: flex;
      gap: 2.5rem;
      align-items: center;
    }
    .nav-menu a {
      color: #333;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.97rem;
      transition: color 0.2s;
    }
    .nav-menu a:hover, .nav-menu a.active { color: #1D40AE; font-weight: 600; }

    /* ── CONTAINER ── */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2.5rem 2rem 4rem;
      position: relative;
      z-index: 1;
    }

    /* ── PAGE HEADER ── */
    .page-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 2rem;
    }
    .page-heading { font-size: 1.6rem; font-weight: 700; color: #333; }
    .page-heading span { color: #1D40AE; }
    .page-sub { font-size: 0.9rem; color: #888; margin-top: 3px; }

    .publish-btn {
      background: #1D40AE;
      color: white;
      border: none;
      padding: 12px 26px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 700;
      font-size: 0.92rem;
      box-shadow: 0 4px 12px rgba(29,64,174,0.3);
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s;
    }
    .publish-btn:hover {
      background: #152e7f;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(29,64,174,0.4);
    }

    /* ── STATS ── */
    .stats-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1.2rem;
      margin-bottom: 2rem;
    }
    .stat-card {
      background: white;
      border-radius: 15px;
      padding: 1.5rem 1.4rem 1.3rem;
      box-shadow: 0 2px 12px rgba(0,0,0,0.08);
      transition: all 0.3s;
      border-top: 4px solid transparent;
    }
    .stat-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 6px 20px rgba(29,64,174,0.15);
    }
    .stat-card.blue { border-top-color: #1D40AE; }
    .stat-card.green { border-top-color: #27ae60; }
    .stat-card.orange { border-top-color: #f39c12; }
    .stat-card.red { border-top-color: #e74c3c; }

    .stat-icon {
      font-size: 1.4rem;
      margin-bottom: 0.7rem;
    }
    .stat-val {
      font-size: 2rem;
      font-weight: 800;
      color: #1D40AE;
      line-height: 1;
      margin-bottom: 4px;
    }
    .stat-card.green .stat-val { color: #27ae60; }
    .stat-card.orange .stat-val { color: #f39c12; }
    .stat-card.red .stat-val { color: #e74c3c; }
    .stat-lbl { font-size: 0.82rem; color: #999; font-weight: 500; }
    .stat-delta { font-size: 0.75rem; margin-top: 6px; font-weight: 600; color: #27ae60; }
    .stat-delta.neutral { color: #aaa; }

    /* ── CHARTS ROW ── */
    .charts-row {
      display: grid;
      grid-template-columns: 1.3fr 1fr;
      gap: 1.2rem;
      margin-bottom: 2rem;
    }
    .chart-card {
      background: white;
      border-radius: 15px;
      padding: 1.5rem 1.6rem;
      box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    }
    .chart-title {
      font-size: 0.97rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 1.2rem;
    }

    /* Bar chart */
    .bars {
      display: flex;
      align-items: flex-end;
      gap: 10px;
      height: 100px;
    }
    .bar-wrap { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 5px; }
    .bar {
      width: 100%;
      border-radius: 6px 6px 0 0;
      background: #dde3f8;
      cursor: pointer;
      transition: background 0.2s;
    }
    .bar.current { background: #1D40AE; }
    .bar:hover { background: #4169E1; }
    .bar-lbl { font-size: 0.68rem; color: #aaa; font-weight: 600; }

    /* Donut */
    .donut-wrap { display: flex; align-items: center; gap: 20px; }
    .legend { flex: 1; }
    .leg-item { display: flex; align-items: center; gap: 8px; font-size: 0.83rem; margin-bottom: 9px; font-weight: 500; color: #555; }
    .leg-dot { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; }
    .leg-pct { margin-left: auto; color: #aaa; font-size: 0.78rem; font-weight: 700; }

    /* ── TASKS SECTION ── */
    .tasks-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.08);
      overflow: hidden;
    }
    .tasks-head {
      padding: 1.2rem 1.6rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #f0f0f0;
    }
    .tasks-head-left { display: flex; align-items: center; gap: 1rem; }
    .tasks-title { font-size: 1rem; font-weight: 700; color: #333; }

    .tabs {
      display: flex;
      background: #f5f5f5;
      border-radius: 8px;
      padding: 3px;
      gap: 3px;
    }
    .tab {
      padding: 5px 13px;
      border-radius: 6px;
      border: none;
      background: transparent;
      font-size: 0.78rem;
      font-weight: 600;
      color: #999;
      cursor: pointer;
      transition: all 0.2s;
    }
    .tab.active { background: white; color: #1D40AE; box-shadow: 0 1px 6px rgba(0,0,0,0.1); }

    .search-input {
      display: flex;
      align-items: center;
      gap: 7px;
      background: #f5f5f5;
      border-radius: 8px;
      padding: 6px 14px;
      font-size: 0.82rem;
      color: #aaa;
      cursor: pointer;
      border: 1.5px solid transparent;
      transition: border 0.2s;
    }
    .search-input:hover { border-color: #dde3f8; }

    table { width: 100%; border-collapse: collapse; }
    thead tr { background: #f9f9fb; }
    th {
      text-align: left;
      padding: 10px 18px;
      font-size: 0.72rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: #bbb;
      border-bottom: 1px solid #f0f0f0;
    }
    td {
      padding: 13px 18px;
      font-size: 0.88rem;
      border-bottom: 1px solid #f8f8f8;
      vertical-align: middle;
    }
    tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: #f9fbff; }

    .task-name { font-weight: 700; color: #333; margin-bottom: 2px; }
    .task-cat { font-size: 0.74rem; color: #aaa; }

    .badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 0.74rem;
      font-weight: 700;
    }
    .badge::before { content:''; width:6px; height:6px; border-radius:50%; background:currentColor; }
    .badge-active  { background:#eafaf2; color:#27ae60; }
    .badge-pending { background:#fef9ee; color:#f39c12; }
    .badge-done    { background:#eef1fc; color:#1D40AE; }
    .badge-cancelled { background:#fdeaea; color:#e74c3c; }

    .price { font-weight: 700; color: #333; font-size: 0.88rem; }
    .price.paid { color: #27ae60; }
    .props { font-weight: 700; color: #1D40AE; }

    .actions { display: flex; gap: 6px; }
    .act-btn {
      width: 30px; height: 30px;
      border-radius: 7px;
      border: 1.5px solid #e8e8e8;
      background: white;
      cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.82rem;
      color: #aaa;
      transition: all 0.18s;
    }
    .act-btn:hover.v { background:#eef1fc; border-color:#1D40AE; color:#1D40AE; }
    .act-btn:hover.e { background:#fef9ee; border-color:#f39c12; color:#f39c12; }
    .act-btn:hover.d { background:#fdeaea; border-color:#e74c3c; color:#e74c3c; }

    /* Pagination */
    .pag {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 18px;
      border-top: 1px solid #f0f0f0;
      font-size: 0.8rem;
      color: #aaa;
    }
    .pag-btns { display: flex; gap: 4px; }
    .pag-btn {
      width: 28px; height: 28px;
      border-radius: 7px;
      border: 1.5px solid #e8e8e8;
      background: white;
      font-size: 0.8rem;
      font-weight: 700;
      color: #999;
      cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      transition: all 0.15s;
    }
    .pag-btn.active { background: #1D40AE; border-color: #1D40AE; color: white; }
    .pag-btn:hover:not(.active) { background: #f0f3ff; }

    /* ── MODALS ── */
    .overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.35);
      backdrop-filter: blur(3px);
      z-index: 200;
      align-items: center;
      justify-content: center;
    }
    .overlay.open { display: flex; }

    .modal {
      background: white;
      border-radius: 18px;
      padding: 2rem;
      max-width: 500px;
      width: 92%;
      box-shadow: 0 20px 60px rgba(29,64,174,0.18);
      animation: popIn 0.22s ease;
    }
    @keyframes popIn {
      from { opacity:0; transform:translateY(18px) scale(0.97); }
      to   { opacity:1; transform:translateY(0) scale(1); }
    }
    .modal-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:1.4rem; }
    .modal-title { font-size:1.1rem; font-weight:800; color:#333; }
    .modal-x {
      width:28px; height:28px;
      border-radius:7px;
      border:1.5px solid #eee;
      background:transparent;
      cursor:pointer;
      color:#aaa;
      font-size:0.9rem;
      display:flex; align-items:center; justify-content:center;
      transition:all 0.15s;
    }
    .modal-x:hover { background:#fdeaea; border-color:#e74c3c; color:#e74c3c; }

    .m-grid { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
    .m-field { margin-bottom:0; }
    .m-label { font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; color:#bbb; margin-bottom:4px; }
    .m-val { font-size:0.9rem; color:#333; font-weight:600; }
    .m-val.big { font-size:1.5rem; font-weight:800; color:#1D40AE; }
    .m-desc { font-size:0.85rem; color:#888; line-height:1.6; margin-top:12px; }

    .m-footer { margin-top:1.4rem; display:flex; gap:10px; }
    .btn-sec {
      flex:1; background:#f5f5f5; border:1.5px solid #e8e8e8;
      border-radius:8px; padding:10px; font-size:0.88rem; font-weight:700;
      cursor:pointer; color:#666; transition:all 0.2s;
    }
    .btn-sec:hover { background:#e8e8e8; }
    .btn-blue {
      flex:1; background:#1D40AE; border:none;
      border-radius:8px; padding:10px; font-size:0.88rem; font-weight:700;
      cursor:pointer; color:white;
      box-shadow:0 4px 12px rgba(29,64,174,0.3);
      transition:all 0.2s; display:flex; align-items:center; justify-content:center; gap:6px;
    }
    .btn-blue:hover { background:#152e7f; }
    .btn-red {
      flex:1; background:#fdeaea; border:1.5px solid #e74c3c;
      border-radius:8px; padding:10px; font-size:0.88rem; font-weight:700;
      cursor:pointer; color:#e74c3c; transition:all 0.2s;
    }
    .btn-red:hover { background:#e74c3c; color:white; }

    .form-input {
      width:100%; background:#f5f5f5; border:1.5px solid #e8e8e8;
      border-radius:8px; padding:9px 12px; font-size:0.88rem; color:#333;
      font-family:inherit; outline:none; transition:border 0.2s;
    }
    .form-input:focus { border-color:#1D40AE; background:#f0f3ff; }
    textarea.form-input { resize:vertical; }

    /* Tooltip */
    [data-tip] { position:relative; }
    [data-tip]:hover::after {
      content:attr(data-tip);
      position:absolute; bottom:calc(100% + 5px); left:50%; transform:translateX(-50%);
      background:#333; color:white; font-size:0.7rem; padding:3px 8px;
      border-radius:6px; white-space:nowrap; pointer-events:none; z-index:99;
    }

    @media(max-width:900px){
      .stats-row { grid-template-columns:repeat(2,1fr); }
      .charts-row { grid-template-columns:1fr; }
    }
    @media(max-width:600px){
      .stats-row { grid-template-columns:1fr 1fr; }
      .circle-decoration { display:none; }
      .nav-menu { gap:1rem; }
    }
</style>
</head>
<body>

<!-- Circles -->
<div class="circle-decoration circle-top-right"></div>
<div class="circle-decoration circle-top-right-second"></div>
<div class="circle-decoration circle-bottom-left"></div>

<!-- Header -->
<header class="header">
    <div class="logo-section">
            <div class="logo-circle">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="logo-img">
            </div>
        <span class="brand-name">Empleador</span>
    </div>
  <nav class="nav-menu">
    <a href="{{ route('empleador.dashboardEmpleador') }}">Inicio</a>
    <a href="{{ route('empleador.perfil') }}">Perfil</a>
    <a href="{{ route('empleador.tareasPublicadas') }}" class="active">Tareas Publicadas</a>
    <a href="{{ route('Empleador.SiTerminarEmpleador') }}">Notificaciones</a>
  </nav>
</header>

<!-- Container -->
<div class="container">

  <!-- Page top -->
  <div class="page-top">
    <div>
      <div class="page-heading">Tareas <span>Publicadas</span></div>
      <div class="page-sub">Vista general de tu actividad como empleador</div>
    </div>
    <a href="{{ route('empleador.publicar') }}" class="publish-btn">+ Publicar Chamba</a>
  </div>

  <!-- Stats dinámicos -->
  <div class="stats-row">
    <div class="stat-card blue">
      <div class="stat-icon"></div>
      <div class="stat-val">{{ $tareas->count() }}</div>
      <div class="stat-lbl">Tareas publicadas</div>
    </div>

    <div class="stat-card green">
      <div class="stat-icon"></div>
      <div class="stat-val">
        ${{ number_format($tareas->sum('pagado'), 2) }}
      </div>
      <div class="stat-lbl">Total pagado</div>
    </div>

    <div class="stat-card orange">
      <div class="stat-icon"></div>
      <div class="stat-val">
        {{ $tareas->where('status.nombre','En curso')->count() }}
      </div>
      <div class="stat-lbl">En curso</div>
    </div>

    <div class="stat-card red">
      <div class="stat-icon"></div>
      <div class="stat-val">
        {{ $tareas->count() > 0 ? round(($tareas->where('status.nombre','Finalizada')->count() / $tareas->count()) * 100) : 0 }}%
      </div>
      <div class="stat-lbl">Finalizadas</div>
    </div>
  </div>

  <!-- ================== TABLA ================== -->
  <div class="tasks-card">

    <div class="tasks-head">

      <div class="tasks-head-left">
        <div class="tasks-title">Todas las Chambas</div>

        <div class="tabs">
          <button class="tab active">Todas</button>
          <button class="tab">En curso</button>
          <button class="tab">Pendiente</button>
          <button class="tab">Finalizada</button>
        </div>
      </div>

      <input type="text" class="search-input" placeholder="🔍 Buscar chamba...">

    </div>

    <table>
      <thead>
        <tr>
          <th>Chamba</th>
          <th>Estado</th>
          <th>Presupuesto</th>
          <th>Pagado</th>
          <th>Propuestas</th>
          <th>Publicado</th>
          <th>Acciones</th>
          <th>Postulados</th>
        </tr>
      </thead>

      <tbody>
        @forelse($tareas as $tarea)
        <tr>

          <td>
            <div class="task-name">{{ $tarea->nombre }}</div>
            <div class="task-cat">{{ $tarea->categoria->nombre ?? 'Sin categoría' }}</div>
          </td>

          <td>
            <span class="badge 
              @if($tarea->estatus->nombre == 'En curso') badge-active
              @elseif($tarea->estatus->nombre == 'Pendiente') badge-pending
              @elseif($tarea->estatus->nombre == 'Finalizada') badge-done
              @else badge-cancelled
              @endif
            ">
              {{ $tarea->estatus->nombre }}
            </span>
          </td>

          <td>${{ number_format($tarea->presupuesto, 2) }}</td>

          <td class="{{ ($tarea->pagado ?? 0) > 0 ? 'price paid' : 'price' }}">
            ${{ number_format($tarea->pagado ?? 0, 2) }}
          </td>

          <td class="props">{{ $tarea->contratos->count() }}</td>

          <td>{{ \Carbon\Carbon::parse($tarea->created_at)->format('d M Y') }}</td>

          <!-- ACCIONES -->
          <td>
            <div class="actions">

              <button class="act-btn v"
                onclick="openView(
                  {{ $tarea->id }},
                  '{{ $tarea->nombre }}',
                  '{{ $tarea->categoria->nombre ?? '' }}',
                  '{{ $tarea->presupuesto }}',
                  `{{ $tarea->descripcion ?? '' }}`
                )">👁️</button>

              <button class="act-btn e"
                onclick="openEdit(
                  {{ $tarea->id }},
                  '{{ $tarea->nombre }}',
                  '{{ $tarea->categoria->nombre ?? '' }}',
                  '{{ $tarea->presupuesto }}',
                  `{{ $tarea->descripcion ?? '' }}`
                )">✏️</button>

              <button class="act-btn d"
                onclick="openDelete({{ $tarea->id }}, '{{ $tarea->nombre }}')">🗑️</button>
            </div>
          </td>
          <td>
            <br>
            <a href="{{ route('tareas.postulados', $tarea->id) }}" class="btn-ver"> Ver postulaciones</a>
          </td>


        </tr>

        @empty
        <tr>
          <td colspan="7" style="text-align:center; padding:20px;">
            No tienes tareas publicadas 
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>

  </div>

  <!-- ================== MODAL VER ================== -->
  <div class="overlay" id="modalView">
    <div class="modal">
      <div class="modal-head">
        <div class="modal-title">👁️ Detalles</div>
        <button class="modal-x" onclick="closeModal('modalView')">✕</button>
      </div>

      <div class="m-grid">
        <div class="m-field" style="grid-column:1/-1">
          <div class="m-label">Nombre</div>
          <div class="m-val" id="vN"></div>
        </div>

        <div class="m-field">
          <div class="m-label">Categoría</div>
          <div class="m-val" id="vC"></div>
        </div>

        <div class="m-field">
          <div class="m-label">Presupuesto</div>
          <div class="m-val" id="vB"></div>
        </div>
      </div>

      <div class="m-desc" id="vDesc"></div>
    </div>
  </div>

  <!-- ================== MODAL EDITAR ================== -->
  <div class="overlay" id="modalEdit">
    <div class="modal">
      <div class="modal-head">
        <div class="modal-title">✏️ Editar Chamba</div>
        <button class="modal-x" onclick="closeModal('modalEdit')">✕</button>
      </div>

      <input type="hidden" id="editId">

      <div class="m-grid">
        <div class="m-field" style="grid-column:1/-1">
          <div class="m-label">Nombre</div>
          <input class="form-input" id="eN">
        </div>

        <div class="m-field">
          <div class="m-label">Categoría</div>
          <input class="form-input" id="eC">
        </div>

        <div class="m-field">
          <div class="m-label">Presupuesto</div>
          <input class="form-input" id="eB" type="number">
        </div>

        <div class="m-field" style="grid-column:1/-1">
          <div class="m-label">Descripción</div>
          <textarea class="form-input" id="eDesc"></textarea>
        </div>
      </div>

      <div class="m-footer">
        <button class="btn-sec" onclick="closeModal('modalEdit')">Cancelar</button>
        <button class="btn-blue" onclick="saveEdit()">💾 Guardar</button>
      </div>
    </div>
  </div>

  <!-- ================== MODAL ELIMINAR ================== -->
  <div class="overlay" id="modalDel">
    <div class="modal" style="max-width:400px">
      <div class="modal-head">
        <div class="modal-title">🗑️ Eliminar</div>
        <button class="modal-x" onclick="closeModal('modalDel')">✕</button>
      </div>

      <input type="hidden" id="deleteId">

      <p style="color:#888">
        ¿Eliminar <strong id="delN"></strong>?
      </p>

      <div class="m-footer">
        <button class="btn-sec" onclick="closeModal('modalDel')">Cancelar</button>
        <button class="btn-red" onclick="confirmDel()">Eliminar</button>
      </div>
    </div>
  </div>


  <!-- ================== SCRIPT ================== -->
  <script>
  function openDelete(id, nombre){
    document.getElementById('deleteId').value = id;
    document.getElementById('delN').innerText = nombre;
    document.getElementById('modalDel').classList.add('open');
  }

  function confirmDel(){
    let id = document.getElementById('deleteId').value;

    fetch(`/tareas/${id}`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    })
    .then(res => {
      if (!res.ok) throw new Error("Error en la petición");
      return res.json();
    })
    .then(data => {
      console.log("RESPUESTA:", data);
      if(data.success){
        location.reload();
      }
    })
    .catch(err => console.error("ERROR:", err));
  }

  function closeModal(id){
    document.getElementById(id).classList.remove('open');
  }
  function openView(id,n,c,b,d){
    vN.innerText=n; vC.innerText=c; vB.innerText='$'+b; vDesc.innerText=d;
    modalView.classList.add('open');
  }

  function openEdit(id,n,c,b,d){
    editId.value=id; eN.value=n; eC.value=c; eB.value=b; eDesc.value=d;
    modalEdit.classList.add('open');
  }

  function closeModal(id){
    document.getElementById(id).classList.remove('open');
  }

  function saveEdit(){
    fetch(`/tareas/${editId.value}`, {
      method:'PUT',
      headers:{
        'Content-Type':'application/json',
        'X-CSRF-TOKEN':'{{ csrf_token() }}'
      },
      body:JSON.stringify({
        nombre:eN.value,
        descripcion:eDesc.value,
        presupuesto:eB.value
      })
    })
    .then(res => res.json())
    .then(data => {
      if(data.success){
        location.reload();
      }
    })
    .catch(err => console.error("ERROR:", err));
  }


  </script>

</body>
</html>