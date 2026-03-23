<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rapichamba - Pagos</title>
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
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border: 2px solid #1D40AE;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .logo-text {
            font-size: 1.3rem;
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
            font-size: 14px;
            transition: opacity 0.3s;
        }

        .nav-link:hover {
            opacity: 0.7;
        }

        /* Contenedor principal */
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 3rem 2rem;
            position: relative;
            z-index: 1;
        }

        /* Sección de título */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 28px;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #666;
            font-size: 15px;
        }

        /* Balance Card */
        .balance-card {
            background: linear-gradient(135deg, #1D40AE 0%, #2952CC 100%);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 10px 40px rgba(29, 64, 174, 0.3);
            position: relative;
            overflow: hidden;
        }

        .balance-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .balance-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin-bottom: 8px;
        }

        .balance-amount {
            color: white;
            font-size: 42px;
            font-weight: 700;
            position: relative;
        }

        /* Métodos de Pago */
        .section {
            margin-bottom: 2.5rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
            color: #333;
            font-weight: 600;
        }

        .add-btn {
            background: #1D40AE;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .add-btn:hover {
            background: #152e7f;
            transform: translateY(-2px);
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1rem;
        }

        .payment-card {
            background: linear-gradient(135deg, #1D40AE 0%, #2952CC 100%);
            border-radius: 15px;
            padding: 1.5rem;
            color: white;
            box-shadow: 0 4px 12px rgba(29, 64, 174, 0.2);
            position: relative;
            overflow: hidden;
        }

        .payment-card::before {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .card-type {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        .card-number {
            font-size: 18px;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
        }

        .card-holder {
            opacity: 0.9;
        }

        .card-expiry {
            opacity: 0.9;
        }

        /* Historial de Transacciones */
        .transaction-list {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .transaction-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 0.75rem;
            transition: all 0.3s;
            cursor: pointer;
        }

        .transaction-item:hover {
            background: #f5f5f5;
        }

        .transaction-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .transaction-icon.income {
            background: #d4f4dd;
            color: #27ae60;
        }

        .transaction-icon.expense {
            background: #ffd4d4;
            color: #e74c3c;
        }

        .transaction-info {
            flex: 1;
        }

        .transaction-title {
            color: #333;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .transaction-date {
            color: #999;
            font-size: 13px;
        }

        .transaction-status {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-badge.completed {
            background: #d4f4dd;
            color: #27ae60;
        }

        .status-badge.pending {
            background: #fff4d4;
            color: #f39c12;
        }

        .transaction-amount {
            font-size: 16px;
            font-weight: 700;
        }

        .transaction-amount.positive {
            color: #27ae60;
        }

        .transaction-amount.negative {
            color: #e74c3c;
        }

        @media (max-width: 768px) {
            .container {
                padding: 2rem 1rem;
            }

            .balance-amount {
                font-size: 32px;
            }

            .payment-methods {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                gap: 1rem;
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
            <div class="logo-icon">🏃</div>
            <div class="logo-text">Rapichamba</div>
        </div>
        <nav class="nav-menu">
            <a href="#" class="nav-link">Inicio</a>
            <a href="#" class="nav-link">Perfil</a>
            <a href="#" class="nav-link">Notificaciones</a>
        </nav>
    </header>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Header de página -->
        <div class="page-header">
            <h1 class="page-title">
                💰 Pagos
            </h1>
            <p class="page-subtitle">Administra tus pagos y métodos de pago.</p>
        </div>

        <!-- Balance Card -->
        <div class="balance-card">
            <div class="balance-label">Balance disponible</div>
            <div class="balance-amount">$3,450.00 MXN</div>
        </div>

        <!-- Métodos de Pago -->
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">💳 Métodos de Pago</h2>
                <button class="add-btn">+ Agregar método</button>
            </div>
            <div class="payment-methods">
                <div class="payment-card">
                    <div class="card-type">Visa</div>
                    <div class="card-number">•••• •••• •••• 4532</div>
                    <div class="card-footer">
                        <div class="card-holder">Juan Domínguez</div>
                        <div class="card-expiry">12/26</div>
                    </div>
                </div>
                <div class="payment-card">
                    <div class="card-type">Mastercard</div>
                    <div class="card-number">•••• •••• •••• 8829</div>
                    <div class="card-footer">
                        <div class="card-holder">Juan Domínguez</div>
                        <div class="card-expiry">08/25</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Historial de Transacciones -->
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">📊 Historial de Transacciones</h2>
            </div>
            <div class="transaction-list">
                <div class="transaction-item">
                    <div class="transaction-icon income">↓</div>
                    <div class="transaction-info">
                        <div class="transaction-title">Pago recibido - Reparación de plomería</div>
                        <div class="transaction-date">18 de Noviembre, 2025</div>
                    </div>
                    <div class="transaction-status">
                        <span class="status-badge completed">Completado</span>
                        <span class="transaction-amount positive">+$850.00</span>
                    </div>
                </div>

                <div class="transaction-item">
                    <div class="transaction-icon expense">↑</div>
                    <div class="transaction-info">
                        <div class="transaction-title">Retiro a cuenta bancaria</div>
                        <div class="transaction-date">12 de Noviembre, 2025</div>
                    </div>
                    <div class="transaction-status">
                        <span class="status-badge completed">Completado</span>
                        <span class="transaction-amount negative">-$2,000.00</span>
                    </div>
                </div>

                <div class="transaction-item">
                    <div class="transaction-icon income">↓</div>
                    <div class="transaction-info">
                        <div class="transaction-title">Pago recibido - Instalación eléctrica</div>
                        <div class="transaction-date">10 de Noviembre, 2025</div>
                    </div>
                    <div class="transaction-status">
                        <span class="status-badge completed">Completado</span>
                        <span class="transaction-amount positive">+$1,200.00</span>
                    </div>
                </div>

                <div class="transaction-item">
                    <div class="transaction-icon income">↓</div>
                    <div class="transaction-info">
                        <div class="transaction-title">Pago recibido - Pintura de casa</div>
                        <div class="transaction-date">8 de Noviembre, 2025</div>
                    </div>
                    <div class="transaction-status">
                        <span class="status-badge pending">Pendiente</span>
                        <span class="transaction-amount positive">+$1,500.00</span>
                    </div>
                </div>

                <div class="transaction-item">
                    <div class="transaction-icon income">↓</div>
                    <div class="transaction-info">
                        <div class="transaction-title">Pago recibido - Reparación de techos</div>
                        <div class="transaction-date">5 de Noviembre, 2025</div>
                    </div>
                    <div class="transaction-status">
                        <span class="status-badge completed">Completado</span>
                        <span class="transaction-amount positive">+$2,200.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>