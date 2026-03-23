<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapichamba - Mi Chamba Publicada</title>
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

        .edit-btn {
            background: #1D40AE;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
        }

        .edit-btn:hover {
            background: #152e7f;
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
            margin-bottom: 2rem;
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

        /* Status Section */
        .status-section {
            padding: 2rem;
            background: #f5f5f5;
            border-bottom: 1px solid #ddd;
        }

        .status-title {
            color: #333;
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 1rem;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 4px;
            background: #ddd;
            z-index: 0;
        }

        .progress-fill {
            position: absolute;
            top: 20px;
            left: 0;
            height: 4px;
            background: #1D40AE;
            z-index: 1;
            transition: width 0.5s ease;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 2;
            position: relative;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 4px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s;
        }

        .step-circle.active {
            border-color: #1D40AE;
            background: #1D40AE;
            color: white;
            transform: scale(1.1);
        }

        .step-circle.completed {
            border-color: #1D40AE;
            background: #1D40AE;
            color: white;
        }

        .step-label {
            font-size: 0.8rem;
            color: #666;
            font-weight: 600;
            text-align: center;
            max-width: 80px;
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

        /* Applicants Section */
        .applicants-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .applicant-card {
            display: flex;
            gap: 1rem;
            padding: 1.5rem;
            background: #f5f5f5;
            border-radius: 15px;
            align-items: center;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .applicant-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .applicant-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            border: 3px solid white;
            flex-shrink: 0;
        }

        .applicant-info {
            flex: 1;
        }

        .applicant-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.3rem;
        }

        .applicant-rating {
            color: #1D40AE;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .applicant-stats {
            display: flex;
            gap: 1rem;
            font-size: 0.85rem;
            color: #666;
            flex-wrap: wrap;
        }

        .applicant-actions {
            display: flex;
            gap: 0.5rem;
            flex-direction: column;
        }

        .btn-small {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            white-space: nowrap;
        }

        .btn-accept {
            background: #27ae60;
            color: white;
        }

        .btn-accept:hover {
            background: #229954;
        }

        .btn-message {
            background: white;
            color: #1D40AE;
            border: 2px solid #1D40AE;
        }

        .btn-message:hover {
            background: #f5f5f5;
        }

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

        .btn-danger {
            background: white;
            border: 2px solid #e74c3c;
            color: #e74c3c;
        }

        .btn-danger:hover {
            background: #ffe6e6;
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

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #999;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
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

            .applicant-card {
                flex-direction: column;
                text-align: center;
            }

            .applicant-actions {
                width: 100%;
            }

            .btn-small {
                width: 100%;
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
        <div class="header-title">Mi Chamba Publicada</div>
        <button class="edit-btn">✏️ Editar</button>
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
                        <span>👁️</span>
                        <span>48 vistas</span>
                    </div>
                    <div class="meta-item">
                        <span>👥</span>
                        <span>5 postulantes</span>
                    </div>
                </div>
            </div>

            <!-- Status Section -->
            <div class="status-section">
                <h3 class="status-title">📊 Estado del Servicio</h3>
                <div class="progress-bar">
                    <div class="progress-line"></div>
                    <div class="progress-fill" style="width: 33.33%;"></div>
                    
                    <div class="progress-step">
                        <div class="step-circle completed">📝</div>
                        <div class="step-label">Publicado</div>
                    </div>
                    
                    <div class="progress-step">
                        <div class="step-circle active">✓</div>
                        <div class="step-label">Trabajador Seleccionado</div>
                    </div>
                    
                    <div class="progress-step">
                        <div class="step-circle">🔧</div>
                        <div class="step-label">En Progreso</div>
                    </div>
                    
                    <div class="progress-step">
                        <div class="step-circle">🎉</div>
                        <div class="step-label">Completado</div>
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
                        <span><strong>Colonia Centro</strong></span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-danger">
                    🗑️ Cancelar Publicación
                </button>
                <button class="btn btn-primary">
                    💳 Pagar y Confirmar Trabajador
                </button>
            </div>
        </div>

        <!-- Applicants Section -->
        <div class="applicants-section">
            <h2 class="section-title">👥 Postulantes (5)</h2>
            
            <div class="applicant-card">
                <div class="applicant-avatar"></div>
                <div class="applicant-info">
                    <div class="applicant-name">Juan Pérez</div>
                    <div class="applicant-rating">⭐ 4.9 estrellas (87 reseñas)</div>
                    <div class="applicant-stats">
                        <span>✓ Verificado</span>
                        <span>💼 156 trabajos completados</span>
                        <span>🧹 Experto en Limpieza</span>
                    </div>
                </div>
                <div class="applicant-actions">
                    <button class="btn-small btn-accept">✓ Aceptar</button>
                    <button class="btn-small btn-message">💬 Mensaje</button>
                </div>
            </div>

            <div class="applicant-card">
                <div class="applicant-avatar"></div>
                <div class="applicant-info">
                    <div class="applicant-name">Carlos Ramírez</div>
                    <div class="applicant-rating">⭐ 4.7 estrellas (52 reseñas)</div>
                    <div class="applicant-stats">
                        <span>✓ Verificado</span>
                        <span>💼 89 trabajos completados</span>
                        <span>🧹 Limpieza</span>
                    </div>
                </div>
                <div class="applicant-actions">
                    <button class="btn-small btn-accept">✓ Aceptar</button>
                    <button class="btn-small btn-message">💬 Mensaje</button>
                </div>
            </div>

            <div class="applicant-card">
                <div class="applicant-avatar"></div>
                <div class="applicant-info">
                    <div class="applicant-name">Ana Martínez</div>
                    <div class="applicant-rating">⭐ 5.0 estrellas (34 reseñas)</div>
                    <div class="applicant-stats">
                        <span>✓ Verificado</span>
                        <span>💼 67 trabajos completados</span>
                        <span>🧹 Limpieza y Jardinería</span>
                    </div>
                </div>
                <div class="applicant-actions">
                    <button class="btn-small btn-accept">✓ Aceptar</button>
                    <button class="btn-small btn-message">💬 Mensaje</button>
                </div>
            </div>

            <div class="applicant-card">
                <div class="applicant-avatar"></div>
                <div class="applicant-info">
                    <div class="applicant-name">Luis Hernández</div>
                    <div class="applicant-rating">⭐ 4.6 estrellas (28 reseñas)</div>
                    <div class="applicant-stats">
                        <span>✓ Verificado</span>
                        <span>💼 45 trabajos completados</span>
                    </div>
                </div>
                <div class="applicant-actions">
                    <button class="btn-small btn-accept">✓ Aceptar</button>
                    <button class="btn-small btn-message">💬 Mensaje</button>
                </div>
            </div>

            <div class="applicant-card">
                <div class="applicant-avatar"></div>
                <div class="applicant-info">
                    <div class="applicant-name">Roberto Silva</div>
                    <div class="applicant-rating">⭐ 4.8 estrellas (61 reseñas)</div>
                    <div class="applicant-stats">
                        <span>✓ Verificado</span>
                        <span>💼 103 trabajos completados</span>
                        <span>🧹 Especialista en Limpieza</span>
                    </div>
                </div>
                <div class="applicant-actions">
                    <button class="btn-small btn-accept">✓ Aceptar</button>
                    <button class="btn-small btn-message">💬 Mensaje</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>