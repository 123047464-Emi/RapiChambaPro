<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rapichamba - Detalle de Tarea</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

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

        .brand-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
            letter-spacing: 1px;
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

        .nav-menu a:hover { color: #1D40AE; }

        /* Container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            position: relative;
            z-index: 1;
        }

        /* Page title */
        .page-title {
            text-align: center;
            font-size: 1.1rem;
            font-weight: 700;
            color: #1D40AE;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        /* Header card (dark blue) */
        .task-header-card {
            background: #1D40AE;
            border-radius: 20px;
            padding: 1.5rem 1.8rem;
            color: #fff;
            margin-bottom: 1rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }

        .task-header-card h1 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .task-price {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .task-price .currency {
            font-size: .85rem;
            font-weight: 500;
            opacity: .75;
            margin-left: 4px;
        }

        .task-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 10px;
            font-size: .78rem;
            opacity: .85;
        }

        .task-meta span {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Stepper */
        .stepper-card {
            background: white;
            border-radius: 20px;
            padding: 1.2rem 1.8rem;
            margin-bottom: 1rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border: 1px solid #ddd;
        }

        .stepper {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            position: relative;
        }

        .stepper::before {
            content: '';
            position: absolute;
            top: 18px;
            left: 8%;
            width: 84%;
            height: 2px;
            background: #ddd;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            flex: 1;
            position: relative;
            z-index: 1;
        }

        .step-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #f0f0f0;
            border: 2px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .9rem;
        }

        .step.done .step-icon {
            background: #1D40AE;
            border-color: #1D40AE;
            color: white;
        }

        .step.current .step-icon {
            background: white;
            border-color: #1D40AE;
            color: #1D40AE;
        }

        .step-label {
            font-size: .72rem;
            font-weight: 600;
            color: #999;
            text-align: center;
        }

        .step.done .step-label { color: #1D40AE; }
        .step.current .step-label { color: #1D40AE; }

        /* Section cards */
        .section-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem 1.8rem;
            margin-bottom: 1rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border: 1px solid #ddd;
        }

        .section-heading {
            font-size: 1rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Description */
        .description-text {
            color: #666;
            font-size: .9rem;
            line-height: 1.65;
        }

        /* Details grid */
        .details-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .detail-chip {
            background: #f5f5f5;
            border-radius: 10px;
            padding: 10px 14px;
            border: 1px solid #ddd;
        }

        .chip-label {
            font-size: .72rem;
            color: #999;
            font-weight: 600;
            margin-bottom: 3px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .chip-value {
            font-weight: 600;
            color: #333;
            font-size: .85rem;
        }

        /* Tags */
        .card-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag {
            background: #1D40AE;
            color: white;
            padding: 0.3rem 0.9rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Location */
        .location-badge {
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: .88rem;
            font-weight: 600;
            color: #333;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Publisher */
        .publisher-row {
            display: flex;
            align-items: center;
            gap: 14px;
            background: #f5f5f5;
            border-radius: 12px;
            padding: 14px 16px;
            border: 1px solid #ddd;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #1D40AE;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .publisher-name {
            font-weight: 700;
            font-size: .95rem;
            color: #333;
        }

        .publisher-rating {
            font-size: .8rem;
            color: #1D40AE;
            font-weight: 600;
        }

        .publisher-rating span { color: #666; }

        .publisher-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 4px;
        }

        .pub-badge {
            font-size: .72rem;
            color: #666;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .verified { color: #22c55e; }

        /* Action buttons */
        .actions {
            display: flex;
            gap: 1rem;
            margin-top: 6px;
        }

        .btn-message {
            flex: 1;
            padding: 13px;
            background: white;
            color: #333;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: .92rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-message:hover {
            border-color: #1D40AE;
            color: #1D40AE;
            transform: translateY(-2px);
        }

        .btn-apply {
            flex: 1;
            padding: 13px;
            background: #000;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: .92rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-apply:hover {
            background: #333;
            transform: translateY(-2px);
        }


        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .container { padding: 1rem; }

            .header {
                padding: .8rem 1rem;
            }

            .logo-circle { width: 46px; height: 46px; font-size: 1.1rem; }
            .brand-name { font-size: 1.2rem; }

            .nav-menu { gap: 1.2rem; }
            .nav-menu a { font-size: .85rem; }

            .circle-top-right,
            .circle-top-right-second,
            .circle-bottom-left { display: none; }

            .task-price { font-size: 1.5rem; }

            .task-meta { gap: .6rem; font-size: .72rem; }

            .details-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stepper::before { left: 10%; width: 80%; }

            .step-label { font-size: .65rem; }
        }

        @media (max-width: 480px) {
            .nav-menu { gap: .8rem; }
            .nav-menu a { font-size: .78rem; }

            .details-grid {
                grid-template-columns: 1fr 1fr;
            }

            .actions { flex-direction: column; }

            .stepper { gap: 4px; }
            .step-icon { width: 32px; height: 32px; font-size: .8rem; }
        }
        /* ===== Responsividad adicional ===== */
@media (max-width: 1024px) {
    .container {
        padding: 1.5rem;
    }

    .nav-menu {
        gap: 1.5rem;
    }

    .search-container {
        flex-direction: column;
    }

    .search-input, .filter-btn {
        width: 100%;
    }

    .view-toggle {
        flex-direction: column;
        gap: 0.5rem;
    }

    .view-btn {
        width: 100%;
        text-align: center;
        padding: 10px 0;
    }

    .categories-carousel {
        gap: 0.8rem;
    }

    .category-card {
        min-width: 80px;
        padding: 0.8rem;
    }
}

@media (max-width: 768px) {
    .feed-section {
        grid-template-columns: 1fr;
    }

    .section-title {
        font-size: 22px;
    }

    .category-card {
        min-width: 90px;
        font-size: 0.85rem;
    }

    .logo-circle {
        width: 50px;
        height: 50px;
    }

    .brand-name {
        font-size: 1.2rem;
    }

    .nav-menu {
        font-size: 0.9rem;
    }

    .search-section {
        padding: 1rem;
    }

    .apply-btn {
        font-size: 14px;
    }

    .card-title {
        font-size: 1rem;
    }

    .card-price {
        font-size: 1.1rem;
    }

    .card-info, .card-description, .tag {
        font-size: 0.85rem;
    }

    .map-container {
        padding: 1rem;
        height: 400px;
        font-size: 1rem;
    }
    }

    @media (max-width: 480px) {
        .logo-section {
            flex-direction: column;
            gap: 0.5rem;
        }

        .nav-menu {
            flex-direction: column;
            gap: 0.5rem;
            align-items: flex-start;
        }

        .view-toggle {
            flex-direction: column;
        }

        .view-btn {
            font-size: 14px;
            padding: 8px 0;
        }

        .categories-carousel {
            gap: 0.5rem;
        }

        .category-card {
            min-width: 70px;
            padding: 0.6rem;
        }

        .card-tags {
            gap: 0.3rem;
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
        <div class="logo-section">
            <div class="logo-circle">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo">
            </div>
            <div class="brand-name">RAPICHAMBA</div>
        </div>
        <nav class="nav-menu">
            <a href="#">Inicio</a>
            <a href="#">Perfil</a>
            <a href="#">Notificaciones</a>
        </nav>
    </header>

    <div class="container">

        <p class="page-title">Detalle de la Tarea</p>

        <!-- Header Card -->
        <div class="task-header-card">
            <h1>Limpieza de patio trasero</h1>
            <div class="task-price">$400.00 <span class="currency">MXN</span></div>
            <div class="task-meta">
                <span>📢 Publicado hace 2 horas</span>
                <span>📅 Fecha: 22 Nov 2025</span>
                <span>⏱ Duración: 3-4 horas</span>
            </div>
        </div>

        <!-- Stepper -->
        <div class="stepper-card">
            <div class="stepper">
                <div class="step done">
                    <div class="step-icon">📋</div>
                    <span class="step-label">Solicitado</span>
                </div>
                <div class="step done">
                    <div class="step-icon">✔</div>
                    <span class="step-label">Aceptado</span>
                </div>
                <div class="step current">
                    <div class="step-icon">🔧</div>
                    <span class="step-label">En progreso</span>
                </div>
                <div class="step">
                    <div class="step-icon">🎉</div>
                    <span class="step-label">Completado</span>
                </div>
            </div>
        </div>

        <!-- Descripción -->
        <div class="section-card">
            <div class="section-heading">📝 Descripción del trabajo</div>
            <p class="description-text">
                Necesito ayuda para limpiar mi patio trasero. El trabajo incluye barrer, recoger hojas, limpiar el área de jardín y organizar algunas macetas. El patio tiene aproximadamente 30 metros cuadrados. Prefiero que el trabajo se realice el sábado por la mañana. Cuento con todas las herramientas necesarias (escoba, rastrillo, bolsas de basura).
            </p>
        </div>

        <!-- Detalles y requisitos -->
        <div class="section-card">
            <div class="section-heading">📋 Detalles y requisitos</div>
            <div class="details-grid">
                <div class="detail-chip">
                    <div class="chip-label">👥 Personas</div>
                    <div class="chip-value">1 persona</div>
                </div>
                <div class="detail-chip">
                    <div class="chip-label">🧰 Herramientas</div>
                    <div class="chip-value">Incluidas</div>
                </div>
                <div class="detail-chip">
                    <div class="chip-label">📐 Área</div>
                    <div class="chip-value">30 m²</div>
                </div>
                <div class="detail-chip" style="grid-column: span 2;">
                    <div class="chip-label">⭐ Experiencia</div>
                    <div class="chip-value">No requerida</div>
                </div>
            </div>
        </div>

        <!-- Categorías -->
        <div class="section-card">
            <div class="section-heading">🏷 Categorías</div>
            <div class="card-tags">
                <span class="tag">Limpieza</span>
                <span class="tag">Jardinería</span>
                <span class="tag">Fin de semana</span>
                <span class="tag">Pago efectivo</span>
            </div>
        </div>

        <!-- Ubicación -->
        <div class="section-card">
            <div class="section-heading">📍 Ubicación</div>
            <div class="location-badge">
                📍 Colonia Centro, a 2.5 km de tu ubicación
            </div>
        </div>

        <!-- Publicado por -->
        <div class="section-card">
            <div class="section-heading">👤 Publicado por</div>
            <div class="publisher-row">
                <div class="avatar">M</div>
                <div>
                    <div class="publisher-name">María González</div>
                    <div class="publisher-rating">★★★★★ 4.8 <span>(24 reseñas)</span></div>
                    <div class="publisher-badges">
                        <span class="pub-badge"><span class="verified">✔</span> Verificado</span>
                        <span class="pub-badge">🏅 Miembro desde 2024</span>
                        <span class="pub-badge">💼 12 trabajos publicados</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones -->
        <div class="actions">
            <button class="btn-message" onclick="enviarMensaje()">💬 Enviar mensaje</button>
            <button class="btn-apply" onclick="postularse()">Postularme</button>
        </div>

    </div>

    <script>
        function postularse() {
            Swal.fire({
                title: '¿Deseas postularte a esta tarea?',
                text: "Se enviará tu solicitud al empleador",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#1D40AE',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, postularme',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('¡Postulado!', 'Tu postulación se registró correctamente', 'success');
                }
            });
        }

        function enviarMensaje() {
            Swal.fire({
                title: 'Enviar mensaje',
                input: 'textarea',
                inputPlaceholder: 'Escribe tu mensaje aquí...',
                showCancelButton: true,
                confirmButtonColor: '#1D40AE',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    Swal.fire('¡Enviado!', 'Tu mensaje fue enviado correctamente', 'success');
                }
            });
        }
    </script>
</body>
</html>