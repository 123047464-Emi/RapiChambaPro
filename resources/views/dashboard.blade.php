<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapichamba - Encuentra Chambas</title>
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
            border-bottom: 3px solid #1D40AE;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            border: 3px solid #1D40AE;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
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
        .hero-section {
            text-align: center;
            margin-bottom: 3rem;
        }

        /* User Type Toggle */
        .user-toggle {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .toggle-btn {
            padding: 10px 20px;
            border: none;
            background: white;
            color: #1D40AE;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .toggle-btn.active {
            background: #1D40AE;
            color: white;
        }

        .toggle-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(29, 64, 174, 0.3);
        }

        /* Views */
        .view-content {
            display: none;
        }

        .view-content.active {
            display: block;
        }

        /* TRABAJADOR VIEW */
        .hero-title {
            font-size: 2rem;
            color: #333;
            font-weight: 600;
            margin-bottom: 2rem;
        }

        .search-section {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .search-container {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .search-input {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #1D40AE;
            box-shadow: 0 0 0 3px rgba(29, 64, 174, 0.1);
        }

        .search-btn {
            background: #1D40AE;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 15px;
        }

        .search-btn:hover {
            background: #152e7f;
            transform: translateY(-2px);
        }

        .categories-grid {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .category-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0.5rem;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .category-item:hover {
            transform: translateY(-5px);
        }

        .category-icon {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .category-name {
            font-size: 0.85rem;
            color: #333;
            font-weight: 500;
        }

        .view-toggle {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .view-btn {
            padding: 8px 16px;
            border: none;
            background: white;
            color: #1D40AE;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .view-btn.active {
            background: #1D40AE;
            color: white;
        }

        .opportunities-section {
            margin-top: 3rem;
        }

        .section-title {
            color: #1D40AE;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .opportunities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .job-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            cursor: pointer;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(29, 64, 174, 0.2);
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 0.8rem;
        }

        .job-title {
            color: #333;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .job-price {
            color: #1D40AE;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .job-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 0.3rem;
        }

        .job-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 0.8rem;
            margin-bottom: 1rem;
        }

        .tag-small {
            background: #f5f5f5;
            color: #666;
            padding: 0.25rem 0.6rem;
            border-radius: 12px;
            font-size: 0.75rem;
            border: 1px solid #ddd;
        }

        .job-btn {
            width: 100%;
            padding: 10px;
            background: #1D40AE;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .job-btn:hover {
            background: #152e7f;
            transform: translateY(-2px);
        }

        /* EMPLEADOR VIEW */
        .employer-hero {
            text-align: center;
            margin-bottom: 3rem;
        }

        .employer-title {
            font-size: 1.8rem;
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

        .stats-section {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            text-align: center;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            color: #1D40AE;
            font-size: 2rem;
            font-weight: 700;
        }

        .professionals-section {
            margin-top: 3rem;
        }

        .professionals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
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
            width: 80px;
            height: 80px;
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
        }

        .professional-name {
            color: #333;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .professional-specialty {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .professional-rating {
            color: #1D40AE;
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }

        .professional-btn {
            width: 100%;
            padding: 10px;
            background: white;
            color: #1D40AE;
            border: 2px solid #1D40AE;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
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

        .professional-btn:hover {
            background: #1D40AE;
            color: white;
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

            .hero-title, .employer-title {
                font-size: 1.5rem;
            }

            .stats-section {
                gap: 1.5rem;
            }

            .stat-value {
                font-size: 1.5rem;
            }

            .opportunities-grid,
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
        <div class="logo-section">
            <div class="logo-circle">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo">
            </div>
            <div class="brand-name">RAPICHAMBA</div>
        </div>
        <nav class="nav-menu">
            <a href="{{route('home')}}" class="nav-link">Inicio</a>
            <a href="{{route('login')}}" class="nav-link">Perfil</a>
            <a href="{{ route('SinVista') }}" class="nav-link">Notificaciones</a>
        </nav>
    </header>

    <!-- Container -->
    <div class="container">
        <!-- User Type Toggle -->
        <div class="user-toggle">
            <button class="toggle-btn active" onclick="switchView('trabajador')">🏃 Soy Trabajador</button>
            <button class="toggle-btn" onclick="switchView('empleador')">💼 Soy Empleador</button>
        </div>

        <!-- TRABAJADOR VIEW -->
        <div id="trabajadorView" class="view-content active">
            <div class="hero-section">
                <h1 class="hero-title">Encuentra chambas cerca de ti</h1>

                <div class="search-section">
                    <div class="search-container">
                        <input type="text" class="search-input" placeholder="Buscar por oficio (ej: Plomero, Pintor)..." />
                        <button class="search-btn">Buscar</button>
                    </div>

                    <div class="categories-grid">
                        <div class="category-item">
                            <div class="category-icon">🧹</div>
                            <div class="category-name">Limpieza</div>
                        </div>
                        <div class="category-item">
                            <div class="category-icon">🔧</div>
                            <div class="category-name">Reparación</div>
                        </div>
                        <div class="category-item">
                            <div class="category-icon">⚙️</div>
                            <div class="category-name">Sistemas</div>
                        </div>
                        <div class="category-item">
                            <div class="category-icon">🚚</div>
                            <div class="category-name">Mudanza</div>
                        </div>
                        <div class="category-item">
                            <div class="category-icon">🎨</div>
                            <div class="category-name">Pintura</div>
                        </div>
                    </div>
                </div>

                <div class="view-toggle">
                    <button class="view-btn active">Trabajos</button>
                    <button class="view-btn">🗺️ MAPA</button>
                </div>
            </div>

            <div class="opportunities-section">
                <h2 class="section-title">Oportunidades Recientes</h2>
                <div class="opportunities-grid">
                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Reparación de Fuga</h3>
                                <div class="job-info">📍 Centro • ⏰ 20 min</div>
                            </div>
                            <div class="job-price">$500</div>
                        </div>
                        <div class="job-tags">
                            <span class="tag-small">Plomería</span>
                            <span class="tag-small">Urgente</span>
                        </div>
                        <button class="job-btn" onclick="window.location='{{ route('login') }}'">
                            Ver Detalles
                        </button>
                    </div>

                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Limpieza de Patio</h3>
                                <div class="job-info">💼 Jardinería • ⏰ 3 Horas</div>
                            </div>
                            <div class="job-price">$400</div>
                        </div>
                        <div class="job-tags">
                            <span class="tag-small">Jardín</span>
                            <span class="tag-small">Fin de semana</span>
                        </div>
                        <button class="job-btn" onclick="window.location='{{ route('login') }}'">
                            Ver Detalles
                        </button>
                    </div>

                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Formato de PC</h3>
                                <div class="job-info">📍 El Refugio • ⏰ 3 Horas</div>
                            </div>
                            <div class="job-price">$350</div>
                        </div>
                        <div class="job-tags">
                            <span class="tag-small">Tecnología</span>
                            <span class="tag-small">Software</span>
                        </div>
                        <button class="job-btn" onclick="window.location='{{ route('login') }}'">
                            Ver Detalles
                        </button>
                    </div>

                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Instalación Eléctrica</h3>
                                <div class="job-info">📍 Centro • ⏰ 2 Horas</div>
                            </div>
                            <div class="job-price">$600</div>
                        </div>
                        <div class="job-tags">
                            <span class="tag-small">Electricidad</span>
                        </div>
                        <button class="job-btn" onclick="window.location='{{ route('login') }}'">
                            Ver Detalles
                        </button>
                    </div>

                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Pintura de Casa</h3>
                                <div class="job-info">📍 Jurica • ⏰ 1 día</div>
                            </div>
                            <div class="job-price">$1,500</div>
                        </div>
                        <div class="job-tags">
                            <span class="tag-small">Pintura</span>
                        </div>
                        <button class="job-btn" onclick="window.location='{{ route('login') }}'">
                            Ver Detalles
                        </button>
                    </div>

                    <div class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">Mudanza Departamento</h3>
                                <div class="job-info">📍 Centro • ⏰ 4 Horas</div>
                            </div>
                            <div class="job-price">$800</div>
                        </div>
                        <div class="job-tags">
                            <span class="tag-small">Mudanza</span>
                        </div>
                        <button class="job-btn" onclick="window.location='{{ route('login') }}'">
                            Ver Detalles
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- EMPLEADOR VIEW -->
        <div id="empleadorView" class="view-content">
            <div class="employer-hero">
                <h1 class="employer-title">¿Tienes algo que reparar hoy?</h1>
                <p class="employer-subtitle">Publica tu chamba en segundos y recibe ofertas de trabajadores verificados.</p>
                <button class="publish-btn">+ Publicar Chamba Gratis</button>
            </div>

            <div class="stats-section">
                <div class="stat-card">
                    <div class="stat-label">En espera</div>
                    <div class="stat-value">2</div>
                    <div class="stat-label">Solicitudes</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">En progreso</div>
                    <div class="stat-value">1</div>
                    <div class="stat-label">Chamba activa</div>
                </div>
            </div>

            <div class="professionals-section">
                <h2 class="section-title">Profesionales Recomendados</h2>
                <div class="professionals-grid">
                    <div class="professional-card">
                        <div class="professional-avatar">JP</div>
                        <div class="professional-name">Juan Pérez ✓</div>
                        <div class="professional-specialty">Plomero Experto</div>
                        <div class="professional-rating">⭐ 4.9 (123 Reseñas)</div>
                        <button class="professional-btn">Ver Perfil</button>
                    </div>

                    <div class="professional-card">
                        <div class="professional-avatar">MG</div>
                        <div class="professional-name">María García ✓</div>
                        <div class="professional-specialty">Limpieza Profunda</div>
                        <div class="professional-rating">⭐ 5.0 (89 Reseñas)</div>
                        <button class="professional-btn">Ver Perfil</button>
                    </div>

                    <div class="professional-card">
                        <div class="professional-avatar">CR</div>
                        <div class="professional-name">Carlos Ruiz</div>
                        <div class="professional-specialty">Electricista</div>
                        <div class="professional-rating">⭐ 4.8 (76 Reseñas)</div>
                        <button class="professional-btn">Ver Perfil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchView(view) {
            // Update toggle buttons
            const buttons = document.querySelectorAll('.toggle-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            // Update views
            const trabajadorView = document.getElementById('trabajadorView');
            const empleadorView = document.getElementById('empleadorView');

            if (view === 'trabajador') {
                trabajadorView.classList.add('active');
                empleadorView.classList.remove('active');
            } else {
                trabajadorView.classList.remove('active');
                empleadorView.classList.add('active');
            }
        }
    </script>
</body>
</html>