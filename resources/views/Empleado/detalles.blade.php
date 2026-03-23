<<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapichamba - Detalle de Chamba</title>
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
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
        }

        .back-btn {
            background: #f5f5f5;
            border: 1px solid #ddd;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .back-btn:hover {
            background: #e8e8e8;
            transform: scale(1.05);
        }

        .header-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }

        .share-btn {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .share-btn:hover {
            transform: scale(1.1);
        }

        /* Container */
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            position: relative;
            z-index: 1;
        }

        /* Main Card */
        .detail-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        /* Header Section */
        .card-header {
            padding: 2rem;
            background: linear-gradient(135deg, #1D40AE 0%, #2952CC 100%);
            color: white;
        }

        .job-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .price-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .price {
            font-size: 3rem;
            font-weight: 800;
        }

        .price-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .meta-info {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        /* Content Section */
        .card-content {
            padding: 2rem;
        }

        .section {
            margin-bottom: 2rem;
        }

        .section-title {
            color: #333;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .description {
            color: #666;
            line-height: 1.8;
            font-size: 1rem;
        }

        /* Location Map */
        .map-container {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, #f5f5f5, #e8e8e8);
            border-radius: 15px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 1rem;
            margin-bottom: 1rem;
            position: relative;
            overflow: hidden;
        }

        .map-placeholder {
            text-align: center;
        }

        .map-marker {
            position: absolute;
            font-size: 3rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .address {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-size: 1rem;
            padding: 0.8rem;
            background: #f5f5f5;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        /* Requirements & Details */
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .detail-item {
            background: #f5f5f5;
            padding: 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            border: 1px solid #ddd;
        }

        .detail-icon {
            font-size: 1.5rem;
        }

        .detail-text {
            flex: 1;
        }

        .detail-label {
            font-size: 0.8rem;
            color: #999;
            font-weight: 600;
        }

        .detail-value {
            font-size: 1rem;
            color: #333;
            font-weight: 700;
        }

        /* Tags */
        .tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .tag {
            background: #1D40AE;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* Employer Info */
        .employer-card {
            display: flex;
            gap: 1rem;
            padding: 1.5rem;
            background: #f5f5f5;
            border-radius: 15px;
            align-items: center;
            border: 1px solid #ddd;
        }

        .employer-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            border: 3px solid white;
        }

        .employer-info {
            flex: 1;
        }

        .employer-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.3rem;
        }

        .employer-rating {
            color: #1D40AE;
            font-size: 0.9rem;
        }

        .employer-stats {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #666;
        }

        /* Action Buttons */
        .action-buttons {
            padding: 2rem;
            background: white;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            flex: 1;
            min-width: 200px;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-secondary {
            background: white;
            border: 2px solid #1D40AE;
            color: #1D40AE;
        }

        .btn-secondary:hover {
            background: #f5f5f5;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: #000;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: #333;
            transform: translateY(-2px);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .modal-title {
            color: #333;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .modal-text {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .job-title {
                font-size: 1.5rem;
            }

            .price {
                font-size: 2rem;
            }

            .meta-info {
                gap: 1rem;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                min-width: 100%;
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
        <button class="back-btn" onclick="history.back()">←</button>
        <div class="header-title">Detalle de Chamba</div>
        <button class="share-btn">⤴️</button>
    </header>

    <!-- Container -->
    <div class="container">
        <!-- Main Detail Card -->
        <div class="detail-card">
            <!-- Card Header -->
            <div class="card-header">
                <h1 class="job-title">Limpieza de patio trasero</h1>
                <div class="price-section">
                    <div class="price">$400</div>
                    <div class="price-label">MXN</div>
                </div>
                <div class="meta-info">
                    <div class="meta-item">
                        <span>📅</span>
                        <span>Publicado hace 2 horas</span>
                    </div>
                    <div class="meta-item">
                        <span>⏰</span>
                        <span>Fecha: 22 Nov 2025</span>
                    </div>
                    <div class="meta-item">
                        <span>🕐</span>
                        <span>Duración: 3-4 horas</span>
                    </div>
                </div>
            </div>

            <!-- Card Content -->
            <div class="card-content">
                <!-- Description Section -->
                <div class="section">
                    <h3 class="section-title">📋 Descripción del Trabajo</h3>
                    <p class="description">
                        Necesito ayuda para limpiar mi patio trasero. El trabajo incluye barrer, recoger hojas, 
                        limpiar el área de jardín y organizar algunas macetas. El patio tiene aproximadamente 
                        30 metros cuadrados. Prefiero que el trabajo se realice el sábado por la mañana. 
                        Cuento con todas las herramientas necesarias (escoba, rastrillo, bolsas de basura).
                    </p>
                </div>

                <!-- Details Grid -->
                <div class="section">
                    <h3 class="section-title">📝 Detalles y Requisitos</h3>
                    <div class="details-grid">
                        <div class="detail-item">
                            <div class="detail-icon">👥</div>
                            <div class="detail-text">
                                <div class="detail-label">Personas</div>
                                <div class="detail-value">1 persona</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🧰</div>
                            <div class="detail-text">
                                <div class="detail-label">Herramientas</div>
                                <div class="detail-value">Incluidas</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">📏</div>
                            <div class="detail-text">
                                <div class="detail-label">Área</div>
                                <div class="detail-value">30 m²</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">💼</div>
                            <div class="detail-text">
                                <div class="detail-label">Experiencia</div>
                                <div class="detail-value">No requerida</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="section">
                    <h3 class="section-title">🏷️ Categorías</h3>
                    <div class="tags">
                        <span class="tag">Limpieza</span>
                        <span class="tag">Jardinería</span>
                        <span class="tag">Fin de semana</span>
                        <span class="tag">Pago efectivo</span>
                    </div>
                </div>

                <!-- Location Section -->
                <div class="section">
                    <h3 class="section-title">📍 Ubicación</h3>
                    <div class="map-container">
                        <div class="map-marker">📍</div>
                        <div class="map-placeholder">
                            Vista de Mapa<br>
                            <small>Integración con Google Maps / Mapbox</small>
                        </div>
                    </div>
                    <div class="address">
                        <span>📍</span>
                        <span><strong>Colonia Centro</strong>, a 2.5 km de tu ubicación</span>
                    </div>
                </div>

                <!-- Employer Info -->
                <div class="section">
                    <h3 class="section-title">👤 Publicado por</h3>
                    <div class="employer-card">
                        <div class="employer-avatar"></div>
                        <div class="employer-info">
                            <div class="employer-name">María González</div>
                            <div class="employer-rating">⭐ 4.8 estrellas (24 reseñas)</div>
                            <div class="employer-stats">
                                <span>✓ Verificado</span>
                                <span>📅 Miembro desde 2024</span>
                                <span>💼 12 trabajos publicados</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-secondary" onclick="openChat()">
                    💬 Enviar Mensaje
                </button>
                <button class="btn btn-primary" onclick="handleApply()">
                    👍 Postularme
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Actions -->
    <div class="modal" id="actionModal">
        <div class="modal-content">
            <div class="modal-icon">✓</div>
            <h2 class="modal-title">¡Postulación Enviada!</h2>
            <p class="modal-text">
                Tu postulación ha sido enviada exitosamente. El empleador recibirá una notificación 
                y podrá contactarte pronto.
            </p>
            <div class="modal-buttons">
                <button class="btn btn-secondary" onclick="closeModal()">Cerrar</button>
                <button class="btn btn-primary" onclick="openChat()">Enviar Mensaje</button>
            </div>
        </div>
    </div>

    <script>
        function handleApply() {
            const modal = document.getElementById('actionModal');
            modal.classList.add('active');
        }

        function openChat() {
            alert('Redirigiendo al chat... 💬\nAquí se abriría la pantalla de mensajería.');
            closeModal();
        }

        function closeModal() {
            const modal = document.getElementById('actionModal');
            modal.classList.remove('active');
        }
    </script>
</body>
</html>