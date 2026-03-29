<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rapichamba - Trabajador</title>
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

        /* Nuevo Header estilo imagen */
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

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            position: relative;
            z-index: 1;
        }

        .search-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .search-container { display: flex; gap: 0.5rem; }

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

        .filter-btn {
            background: #000;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 15px;
        }

        .filter-btn:hover { 
            background: #333;
            transform: translateY(-2px);
        }

        .view-toggle {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            background: white;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .view-btn {
            padding: 12px 32px;
            border: none;
            background: white;
            color: #333;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 15px;
        }

        .view-btn.active { 
            background: #1D40AE;
            color: white;
        }

        .categories-section { margin-bottom: 2rem; }

        .section-title {
            color: #333;
            font-size: 28px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .categories-carousel {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
            scrollbar-width: thin;
            scrollbar-color: #1D40AE #f5f5f5;
        }

        .category-card {
            min-width: 100px;
            background: white;
            border-radius: 20px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 16px rgba(29, 64, 174, 0.2);
            border-color: #1D40AE;
        }

        .category-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            border-radius: 50%;
            margin: 0 auto 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .category-name {
            color: #333;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .feed-section {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .job-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            cursor: pointer;
            border: 1px solid #ddd;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(29, 64, 174, 0.2);
            border-color: #1D40AE;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .card-title {
            color: #333;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .card-price {
            color: #1D40AE;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .card-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .card-description {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .card-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .tag {
            background: #f5f5f5;
            color: #333;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            border: 1px solid #ddd;
        }

        .rating {
            color: #1D40AE;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .apply-btn {
            width: 100%;
            padding: 12px;
            background: #000;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 15px;
        }

        .apply-btn:hover { 
            background: #333;
            transform: translateY(-2px);
        }

        .map-container {
            display: none;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            height: 500px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 1.2rem;
            flex-direction: column;
            border: 1px solid #ddd;
        }

        .map-container.active { display: flex; }

        .feed-section.hidden { display: none; }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .section-title {
                font-size: 24px;
            }

            .feed-section {
                grid-template-columns: 1fr;
            }

            .circle-top-right,
            .circle-top-right-second,
            .circle-bottom-left {
                display: none;
            }

            .nav-menu {
                gap: 1rem;
                font-size: 0.9rem;
            }
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

    <!-- Nuevo Header -->
    <header class="header">
        <div class="logo-section">
                <div class="logo-circle">
                    <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="logo-img">
                </div>
            <span class="brand-name">RAPICHAMBA</span>
        </div>
        <nav class="nav-menu">
            <a href="#">Inicio</a>
            <a href="{{route('empleado.perfil')}}">Perfil</a>
            <a  href="{{ route('Empleado.SinTerminarEmpleado') }}">Notificaciones</a>
        </nav>
    </header>

    <div class="container">
        <div class="search-section">
            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" placeholder="Busca chambas cercanas" />
                
            </div>
        </div>

        <div class="view-toggle">
            <button class="view-btn active" onclick="switchView('lista')">📋 Lista</button>
            <button class="view-btn" onclick="switchView('mapa')">🗺️ Mapa</button>
        </div>

        <div class="categories-section">
            <h2 class="section-title">Categorías Populares</h2>
                <div class="categories-carousel">
                    {{-- Opción fija "Todas" --}}
                    <div class="category-card" onclick="filterByCategory('Todas')">
                        <div class="category-name">Todas</div>
                    </div>

                    {{-- Resto de categorías desde la BD --}}
                    @foreach($categorias as $categoria)
                        <div class="category-card" onclick="filterByCategory('{{ $categoria->nombre }}')">
                            <div class="category-name">{{ $categoria->nombre }}</div>
                        </div>
                    @endforeach
                </div>

        </div>

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

        <div id="mapView" style="height: 400px;"></div>

        <script>
            const tareas = @json($tareas);

            var map = L.map('mapView').setView([20.5931, -100.392], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            console.log(tareas);

            tareas.forEach(tarea => {

                let lat = tarea.ubicacion?.latitud;
                let lng = tarea.ubicacion?.longitud;

                // 🔥 convertir a número
                lat = parseFloat(lat);
                lng = parseFloat(lng);

                console.log("Coords:", lat, lng);

                if (!isNaN(lat) && !isNaN(lng)) {

                    L.marker([lat, lng])
                        .addTo(map)
                        .bindPopup(`
                            <strong>${tarea.nombre}</strong><br>
                            $${tarea.presupuesto}
                        `);

                    // 🔥 centrar mapa en el marcador
                    map.setView([lat, lng], 15);
                }

            });
        </script>

        <div class="feed-section" id="feedView">
            @forelse($tareas as $tarea)
            <div class="job-card" data-category="{{ $tarea->categoria->nombre ?? 'Sin categoría' }}">
                <div class="card-header">
                    <h3 class="card-title">{{ $tarea->nombre }}</h3>
                    <div class="card-price">${{ number_format($tarea->presupuesto, 0, '.', ',') }}</div>
                </div>
                <div class="card-info">
                    📍 {{ $tarea->ubicacion->calle->colonia->nombre ?? 'Ubicación no especificada' }},
                    {{ $tarea->ubicacion->calle->colonia->municipio->nombre ?? '' }},
                    {{ $tarea->ubicacion->calle->colonia->municipio->estado->nombre ?? '' }}

                </div>
                <div class="card-info">
                    ⏰ Publicado {{ $tarea->tiempo_transcurrido ?? 'hace un momento' }}
                </div>
                <p class="card-description">{{ Str::limit($tarea->descripcion, 120) }}</p>
                
                <div class="card-tags">
                    @if($tarea->categoria)
                    <span class="tag">{{ $tarea->categoria->nombre }}</span>
                    @endif
                    
                    @if($tarea->fechaLimite)
                    <span class="tag">Fecha límite: {{ \Carbon\Carbon::parse($tarea->fechaLimite)->format('d/m/Y') }}</span>
                    @endif
                </div>
                
                @if($tarea->empleador && $tarea->empleador->usuario)
                <div class="rating">⭐ Cliente: {{ $tarea->empleador->usuario->nombre ?? 'Anónimo' }}</div>
                @endif
                
                <button class="apply-btn" onclick="postularse({{ $tarea->id }})">Postularme</button>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 3rem; color: #666;">
                <h3>No hay tareas disponibles en este momento</h3>
                <p>Vuelve más tarde para encontrar nuevas oportunidades</p>
            </div>
            @endforelse
        </div>
    </div>

    <script>
        function switchView(view) {
            const buttons = document.querySelectorAll('.view-toggle .view-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            const mapView = document.getElementById('mapView');
            const feedView = document.getElementById('feedView');

            if (view === 'mapa') {
                mapView.classList.add('active');
                feedView.classList.add('hidden');
            } else {
                mapView.classList.remove('active');
                feedView.classList.remove('hidden');
            }
        }

        function filterByCategory(category) {
            const jobCards = document.querySelectorAll('.job-card');
            const categoryCards = document.querySelectorAll('.category-card');
            
            // Resaltar categoría seleccionada
            categoryCards.forEach(card => {
                card.style.backgroundColor = 'white';
                card.style.borderColor = '#ddd';
            });
            event.currentTarget.style.backgroundColor = '#e8f0fe';
            event.currentTarget.style.borderColor = '#1D40AE';
            
            // Filtrar trabajos
            jobCards.forEach(card => {
                const cardCategories = card.getAttribute('data-category');
                
                if (category === 'Todas') {
                    card.style.display = 'block';
                } else {
                    if (cardCategories && cardCategories.includes(category)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });

            // Actualizar título de sección
            const sectionTitle = document.querySelector('.section-title');
            if (category === 'Todas') {
                sectionTitle.textContent = 'Categorías Populares';
            } else {
                sectionTitle.textContent = `Categorías Populares - Mostrando: ${category}`;
            }
        }

        function postularse(tareaId) {
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
                    fetch(`/postularse/${tareaId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({}),
                        credentials: 'same-origin'
                    })
                    .then(async res => {
                        const data = await res.json().catch(() => ({}));
                        console.log('Status:', res.status);
                        console.log('Respuesta:', data);
                        if (res.ok) {
                            Swal.fire('¡Postulado!', data.message, 'success');
                        } else {
                            Swal.fire('Error', `Código ${res.status}: ${data.message || 'Error inesperado'}`, 'error');
                        }
                    })
                    .catch(err => {
                        console.error('Fetch error:', err);
                        Swal.fire('Error', 'Error de conexión o servidor', 'error');
                    });

                }
            });
        }


    </script>
</body>
</html>