<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>RapiChamba – Postulados</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet"/>
<style>
  :root {
    --blue: #1a2ecc;
    --blue-dark: #1422a8;
    --blue-light: #e8ecff;
    --green: #22c55e;
    --red: #ef4444;
    --gray-bg: #f2f3f7;
    --gray-border: #e2e4ed;
    --text: #1e2140;
    --text-muted: #7b80a0;
    --white: #ffffff;
    --shadow: 0 2px 12px rgba(26,46,204,0.08);
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Nunito', sans-serif;
    background: var(--gray-bg);
    color: var(--text);
    min-height: 100vh;
  }

  /* ── NAV ── */
  nav {
    background: var(--white);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;
    height: 64px;
    box-shadow: 0 1px 0 var(--gray-border);
    position: sticky; top: 0; z-index: 100;
  }
    .brand-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
            letter-spacing: 1px;
    }
  .nav-logo {
    width: 42px; height: 42px; border-radius: 50%;
    border: 1.5px solid #c8cde8;
    overflow: hidden; flex-shrink: 0;
    background: #f4f5f9;
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
  .nav-logo img { width: 100%; height: 100%; object-fit: cover; display: block; }
  .nav-brand span { font-size: 1.15rem; font-weight: 800; color: var(--blue); letter-spacing: .5px; }
  .nav-links { display: flex; gap: 32px; }
  .nav-links a { font-weight: 600; font-size: .95rem; color: var(--text-muted); text-decoration: none; transition: color .2s; }
  .nav-links a:hover, .nav-links a.active { color: var(--blue); }

  /* ── DECO CIRCLES ── */
  .deco {
    position: fixed; border-radius: 50%;
    border: 28px solid var(--blue); opacity: .10; pointer-events: none; z-index: 0;
  }
  .deco-tr { width: 340px; height: 340px; top: -110px; right: -110px; }
  .deco-bl { width: 280px; height: 280px; bottom: -90px; left: -90px; }

  /* ── PAGE LAYOUT ── */
  .page { max-width: 1180px; margin: 0 auto; padding: 36px 24px; position: relative; z-index: 1; }

  /* ── TASK HEADER CARD ── */
  .task-header {
    background: var(--white);
    border-radius: 16px;
    padding: 24px 30px;
    box-shadow: var(--shadow);
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
  }
  .task-header-left h1 { font-size: 1.35rem; font-weight: 800; color: var(--text); }
  .task-header-left p { font-size: .9rem; color: var(--text-muted); margin-top: 4px; }
  .task-meta { display: flex; gap: 16px; flex-wrap: wrap; }
  .task-badge {
    background: var(--blue-light);
    color: var(--blue);
    font-size: .8rem; font-weight: 700;
    padding: 6px 14px; border-radius: 20px;
  }
  .task-price { font-size: 1.4rem; font-weight: 800; color: var(--blue); }

  /* ── TABS ── */
  .tabs { display: flex; gap: 8px; margin-bottom: 22px; }
  .tab-btn {
    padding: 10px 24px; border-radius: 10px; font-family: 'Nunito', sans-serif;
    font-size: .93rem; font-weight: 700; cursor: pointer; border: none; transition: all .2s;
  }
  .tab-btn.active { background: var(--blue); color: white; box-shadow: 0 4px 12px rgba(26,46,204,.25); }
  .tab-btn:not(.active) { background: var(--white); color: var(--text-muted); }
  .tab-btn:not(.active):hover { color: var(--blue); }

  /* ── TABLE / GRID ── */
  .candidates-grid { display: flex; flex-direction: column; gap: 14px; }

  .candidate-card {
    background: var(--white);
    border-radius: 14px;
    padding: 18px 24px;
    box-shadow: var(--shadow);
    display: flex;
    align-items: center;
    gap: 20px;
    transition: box-shadow .2s, transform .15s;
  }
  .candidate-card:hover { box-shadow: 0 6px 24px rgba(26,46,204,.13); transform: translateY(-1px); }

  /* Avatar */
  .avatar {
    width: 56px; height: 56px; border-radius: 50%; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.3rem; font-weight: 800; color: white;
  }

  /* Info */
  .candidate-info { flex: 1; min-width: 0; }
  .candidate-name { font-size: 1rem; font-weight: 800; color: var(--text); }
  .candidate-sub { font-size: .83rem; color: var(--text-muted); margin-top: 2px; }
  .stars { color: #f59e0b; font-size: .85rem; margin-top: 4px; }
  .stars span { color: var(--text-muted); font-size: .8rem; margin-left: 4px; }

  /* Tags */
  .tag-list { display: flex; gap: 6px; flex-wrap: wrap; margin-top: 6px; }
  .tag {
    background: var(--gray-bg); color: var(--text-muted);
    font-size: .75rem; font-weight: 700; padding: 3px 10px; border-radius: 20px;
  }

  /* Proposal */
  .candidate-proposal {
    flex: 1.2; min-width: 160px;
    background: var(--gray-bg); border-radius: 10px;
    padding: 12px 16px;
  }
  .candidate-proposal .prop-label { font-size: .75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .5px; }
  .candidate-proposal .prop-price { font-size: 1.25rem; font-weight: 800; color: var(--blue); margin: 2px 0; }
  .candidate-proposal .prop-msg { font-size: .82rem; color: var(--text-muted); line-height: 1.4; }

  /* Actions */
  .candidate-actions { display: flex; flex-direction: column; gap: 10px; flex-shrink: 0; }
  .btn-accept, .btn-reject, .btn-profile {
    padding: 10px 22px; border-radius: 10px; font-family: 'Nunito', sans-serif;
    font-size: .88rem; font-weight: 700; cursor: pointer; border: none; transition: all .2s;
    white-space: nowrap;
  }
  .btn-accept {
    background: var(--green); color: white;
    box-shadow: 0 3px 10px rgba(34,197,94,.25);
  }
  .btn-accept:hover { background: #16a34a; transform: translateY(-1px); }
  .btn-reject {
    background: #fef2f2; color: var(--red); border: 1.5px solid #fecaca;
  }
  .btn-reject:hover { background: #fee2e2; }
  .btn-profile {
    background: var(--blue-light); color: var(--blue); padding: 8px 16px; font-size: .8rem;
  }
  .btn-profile:hover { background: #d1d9ff; }

  /* Status badges for contracts tab */
  .status-badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: .78rem; font-weight: 700; padding: 4px 12px; border-radius: 20px;
  }
  .status-badge.aceptado { background: #dcfce7; color: #16a34a; }
  .status-badge.en-curso  { background: #fef9c3; color: #ca8a04; }
  .status-badge.completado{ background: var(--blue-light); color: var(--blue); }
  .status-dot { width: 7px; height: 7px; border-radius: 50%; background: currentColor; }

  /* Count pill */
  .count-pill {
    background: var(--blue); color: white; font-size: .72rem; font-weight: 800;
    padding: 2px 8px; border-radius: 20px; margin-left: 8px; vertical-align: middle;
  }

  /* Empty state */
  .empty { text-align: center; padding: 48px 0; color: var(--text-muted); font-size: .95rem; }

  /* Section separator  */
  .section-label {
    font-size: .78rem; font-weight: 700; color: var(--text-muted);
    text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; padding-left: 4px;
  }

  /* Tab pane hidden */
  .tab-pane { display: none; }
  .tab-pane.active { display: block; }

  /* ── HAMBURGER (mobile only) ── */
  .nav-hamburger {
    display: none; flex-direction: column; gap: 5px;
    cursor: pointer; padding: 6px; background: none; border: none;
  }
  .nav-hamburger span {
    display: block; width: 22px; height: 2px;
    background: var(--text); border-radius: 2px;
    transition: all .25s;
  }
  .nav-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
  .nav-hamburger.open span:nth-child(2) { opacity: 0; }
  .nav-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

  /* Mobile nav drawer */
  .nav-drawer {
    display: none; flex-direction: column; gap: 0;
    background: var(--white);
    border-top: 1px solid var(--gray-border);
    position: absolute; top: 64px; left: 0; right: 0;
    box-shadow: 0 8px 24px rgba(26,46,204,.08);
    z-index: 99;
  }
  .nav-drawer.open { display: flex; }
  .nav-drawer a {
    padding: 14px 24px; font-size: .95rem; font-weight: 600;
    color: var(--text-muted); text-decoration: none;
    border-bottom: 1px solid var(--gray-border);
    transition: background .15s, color .15s;
  }
  .nav-drawer a:hover { background: var(--blue-light); color: var(--blue); }

  /* ── TABLET  (≤ 900px) ── */
  @media (max-width: 900px) {
    .candidate-card {
      flex-wrap: wrap;
    }
    .candidate-proposal {
      flex: 1 1 100%;
      min-width: unset;
    }
    .candidate-actions {
      flex-direction: row;
      flex-wrap: wrap;
      width: 100%;
      gap: 8px;
    }
    .btn-accept, .btn-reject, .btn-profile {
      flex: 1 1 auto;
      text-align: center;
    }
  }

  /* ── MOBILE (≤ 600px) ── */
  @media (max-width: 600px) {
    nav {
      padding: 0 16px;
      position: relative;
    }
    .nav-links { display: none; }
    .nav-hamburger { display: flex; }

    .page { padding: 20px 14px; }

    .task-header {
      padding: 16px 18px;
      flex-direction: column;
      align-items: flex-start;
      gap: 12px;
    }
    .task-header-left h1 { font-size: 1.05rem; }
    .task-meta { gap: 8px; }
    .task-price { font-size: 1.2rem; }

    .tabs { gap: 6px; }
    .tab-btn { padding: 9px 16px; font-size: .82rem; }

    .candidate-card {
      padding: 14px 16px;
      gap: 12px;
    }
    .avatar { width: 46px; height: 46px; font-size: 1rem; }
    .candidate-name { font-size: .92rem; }
    .candidate-sub  { font-size: .75rem; }
    .stars          { font-size: .78rem; }

    .candidate-info { flex: 1 1 calc(100% - 58px); }

    .candidate-proposal {
      flex: 1 1 100%;
      padding: 10px 14px;
    }
    .candidate-proposal .prop-price { font-size: 1.1rem; }

    .candidate-actions {
      flex-direction: column;
      width: 100%;
      gap: 8px;
    }
    .btn-accept, .btn-reject, .btn-profile {
      width: 100%;
      padding: 11px;
      font-size: .86rem;
    }

    .deco-tr { width: 200px; height: 200px; top: -70px; right: -70px; border-width: 18px; }
    .deco-bl { width: 160px; height: 160px; bottom: -55px; left: -55px; border-width: 18px; }
    }
    /* =====================================================
    RAPICHAMBA – Estilos para tab de Postulados/Contratos
    Pega esto dentro de <style> en tu Blade o en tu CSS
    ===================================================== */

    :root {
    --blue:        #1a2ecc;
    --blue-light:  #e8ecff;
    --green:       #22c55e;
    --red:         #ef4444;
    --gray-bg:     #f2f3f7;
    --gray-border: #e2e4ed;
    --text:        #1e2140;
    --text-muted:  #7b80a0;
    --white:       #ffffff;
    --shadow:      0 2px 12px rgba(26, 46, 204, 0.08);
    }

    /* ── Etiqueta de sección ── */
    .section-label {
    font-family: 'Nunito', sans-serif;
    font-size: .72rem;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 12px;
    padding-left: 2px;
    }

    /* ── Grid de tarjetas ── */
    .candidates-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
    }

    /* ── Tarjeta individual ── */
    .candidate-card {
    background: var(--white);
    border-radius: 14px;
    padding: 18px 24px;
    box-shadow: var(--shadow);
    display: flex;
    align-items: center;
    gap: 20px;
    transition: box-shadow .2s, transform .15s;
    font-family: 'Nunito', sans-serif;
    }
    .candidate-card:hover {
    box-shadow: 0 6px 24px rgba(26, 46, 204, .13);
    transform: translateY(-1px);
    }

    /* ── Info del candidato ── */
    .candidate-info {
    flex: 1;
    min-width: 0;
    }
    .candidate-name {
    font-size: 1rem;
    font-weight: 800;
    color: var(--text);
    }
    .candidate-sub {
    font-size: .83rem;
    color: var(--text-muted);
    margin-top: 2px;
    }

    /* ── Caja de propuesta ── */
    .candidate-proposal {
    flex: 1.2;
    min-width: 160px;
    background: var(--gray-bg);
    border-radius: 10px;
    padding: 12px 16px;
    }
    .prop-label {
    font-size: .72rem;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: .5px;
    }
    .prop-price {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--blue);
    margin: 3px 0 4px;
    }
    .prop-msg {
    font-size: .82rem;
    color: var(--text-muted);
    line-height: 1.4;
    }

    /* ── Acciones ── */
    .candidate-actions {
    display: flex;
    flex-direction: column;
    gap: 8px;
    flex-shrink: 0;
    }

    /* Sobreescribe los btn de Bootstrap para que tengan el estilo RapiChamba */
    .candidate-actions .btn {
    font-family: 'Nunito', sans-serif;
    font-size: .86rem;
    font-weight: 700;
    padding: 9px 20px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    transition: all .2s;
    white-space: nowrap;
    }

    .candidate-actions .btn-success {
    background: var(--green);
    color: #fff;
    box-shadow: 0 3px 10px rgba(34, 197, 94, .25);
    }
    .candidate-actions .btn-success:hover {
    background: #16a34a;
    transform: translateY(-1px);
    color: #fff;
    }

    .candidate-actions .btn-danger {
    background: #fef2f2;
    color: var(--red);
    border: 1.5px solid #fecaca;
    box-shadow: none;
    }
    .candidate-actions .btn-danger:hover {
    background: #fee2e2;
    color: var(--red);
    }

    .candidate-actions .btn-info {
    background: var(--blue-light);
    color: var(--blue);
    box-shadow: none;
    }
    .candidate-actions .btn-info:hover {
    background: #d1d9ff;
    color: var(--blue);
    }

    /* ── Estado vacío ── */
    .candidates-grid > p {
    font-family: 'Nunito', sans-serif;
    font-size: .95rem;
    color: var(--text-muted);
    text-align: center;
    padding: 40px 0;
    }

    /* ══════════════════════════════
    RESPONSIVE
    ══════════════════════════════ */

    /* Tablet (≤ 900px) */
    @media (max-width: 900px) {
    .candidate-card {
        flex-wrap: wrap;
    }
    .candidate-proposal {
        flex: 1 1 100%;
        min-width: unset;
    }
    .candidate-actions {
        flex-direction: row;
        flex-wrap: wrap;
        width: 100%;
        gap: 8px;
    }
    .candidate-actions .btn {
        flex: 1 1 auto;
        text-align: center;
    }
    }

    /* Móvil (≤ 600px) */
    @media (max-width: 600px) {
    .candidate-card {
        padding: 14px 16px;
        gap: 12px;
    }
    .candidate-name { font-size: .92rem; }
    .candidate-sub  { font-size: .75rem; }

    .candidate-proposal { padding: 10px 14px; }
    .prop-price { font-size: 1.1rem; }

    .candidate-actions {
        flex-direction: column;
        width: 100%;
    }
    .candidate-actions .btn {
        width: 100%;
        padding: 11px;
        font-size: .86rem;
    }
    }
</style>
</head>
<body>

<!-- Deco -->
<div class="deco deco-tr"></div>
<div class="deco deco-bl"></div>

<!-- Nav -->
<nav>
  <a class="nav-brand" href="#">
    <div class="nav-logo">
      <img src="" alt="Logo RapiChamba"/>
    </div>
    <span>RAPICHAMBA</span>
  </a>
  <div class="nav-links">
    <a href="#">Inicio</a>
    <a href="#" class="active">Perfil</a>
    <a href="#">Notificaciones</a>
  </div>
  <button class="nav-hamburger" id="hamburger" aria-label="Menú">
    <span></span><span></span><span></span>
  </button>
</nav>
<div class="nav-drawer" id="navDrawer">
  <a href="#">Inicio</a>
  <a href="#">Perfil</a>
  <a href="#">Notificaciones</a>
</div>

<!-- Page -->
<div class="page">

  <!-- Task header -->
    <div class="task-header">
        <div class="task-header-left">
            <h1>{{ $tarea->nombre }} – {{ optional($tarea->ubicacion)->nombre }}</h1>
            <p>Publicado {{ $tarea->created_at->diffForHumans() }}</p>
        </div>
        <div class="task-meta">
            <span class="task-badge">{{ optional($tarea->categoria)->nombre ?? 'Sin categoría' }}</span>
            <span class="task-price">${{ number_format($tarea->presupuesto, 2) }}</span>
        </div>
    </div>


  <!-- Tabs -->
  <div class="tabs">
    <button class="tab-btn active" onclick="switchTab('postulados', this)">
      Postulados <span class="count-pill"></span>
    </button>
    <button class="tab-btn" onclick="switchTab('contratos', this)">
      Contratos <span class="count-pill"></span>
    </button>
  </div>

  <!-- === TAB: POSTULADOS === -->
  <div id="tab-postulados" class="tab-pane active">
    <div class="section-label">Personas interesadas en tu tarea</div>
    <div class="candidates-grid">
        @forelse($tarea->contratos as $contrato)
        <div class="candidate-card">
            <div class="candidate-info">
            <div class="candidate-name">
                {{ optional($contrato->empleado->usuario)->nombre ?? 'Sin usuario asignado' }}
                {{ optional($contrato->empleado->usuario)->apellido_paterno }}
                {{ optional($contrato->empleado->usuario)->apellido_materno }}
            </div>
            <div class="candidate-sub">
                {{ $contrato->empleado->experiencia }} años de experiencia · 
                {{ $contrato->empleado->numTareas }} chambas completadas
            </div>
            </div>

            <div class="candidate-proposal">
            <div class="prop-label">Propuesta</div>
            <div class="prop-price">${{ number_format($contrato->precio, 2) }}</div>
            <div class="prop-msg">{{ $contrato->mensaje }}</div>
            </div>

            <div class="candidate-actions">
            <a href="{{ route('Empleador.SiTerminarEmpleador') }}" class="btn btn-success">Aceptar</a>
            <a href="{{ route('Empleador.SiTerminarEmpleador') }}" class="btn btn-danger">Rechazar</a>
            <a href="{{ route('Empleador.SiTerminarEmpleador') }}" class="btn btn-info">Ver perfil</a>
            </div>
        </div>
        @empty
        <p>No hay postulados aún.</p>
        @endforelse

    </div>
    </div>


    </div>
  </div>

  <!-- === TAB: CONTRATOS === -->
  <div id="tab-contratos" class="tab-pane">
    <div class="candidates-grid">
        <!-- Aquí irían las tarjetas de los contratos activos/completados -->
        <p>Aún no has contratado a nadie para esta tarea.</p>
    </div>
  </div>
<script>
// Hamburger menu
const hamburger = document.getElementById('hamburger');
const navDrawer  = document.getElementById('navDrawer');
hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('open');
  navDrawer.classList.toggle('open');
});

function switchTab(id, btn) {
  document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  document.getElementById('tab-' + id).classList.add('active');
  btn.classList.add('active');
}

// Button interactions
document.querySelectorAll('.btn-accept').forEach(btn => {
  btn.addEventListener('click', function() {
    const card = this.closest('.candidate-card');
    card.style.opacity = '.5';
    card.style.pointerEvents = 'none';
    this.textContent = '✓ Aceptado';
    this.style.background = '#16a34a';
  });
});

document.querySelectorAll('.btn-reject').forEach(btn => {
  btn.addEventListener('click', function() {
    const card = this.closest('.candidate-card');
    card.style.transition = 'opacity .4s, transform .4s';
    card.style.opacity = '0';
    card.style.transform = 'translateX(40px)';
    setTimeout(() => card.remove(), 400);
  });
});
</script>
</body>
</html>