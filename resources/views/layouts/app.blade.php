<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RAPICHAMBA - Soluciones rápidas')</title>
    

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #C1D7E6;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 0;
        }

        .logo-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .brand-name {
            font-size: 32px;
            font-weight: bold;
            color: #1D40AE;
        }

        .header-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #1D40AE;
            color: white;
        }

        .btn-primary:hover {
            background: #152f7f;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: white;
            color: #1D40AE;
            border: 2px solid #1D40AE;
        }

        .btn-secondary:hover {
            background: #1D40AE;
            color: white;
        }

        .hero {
            background: linear-gradient(135deg, #C1D7E6 0%, #e8f1f7 100%);
            padding: 80px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hero-content {
            max-width: 500px;
        }

        .hero-content h1 {
            font-size: 48px;
            color: #1D40AE;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 18px;
            color: #333;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
        }

        .hero-image {
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: #C1D7E6;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 40px rgba(29, 64, 174, 0.2);
            border: 8px solid #1D40AE;
            overflow: hidden;
        }

        .hero-image img {
            width: 250px;
            height: 250px;
            object-fit: contain;
        }

        .runner-icon {
            font-size: 80px;
            margin-bottom: 10px;
        }

        .section {
            padding: 80px 60px;
        }

        .section-title {
            text-align: center;
            font-size: 42px;
            color: #1D40AE;
            margin-bottom: 60px;
        }

        .steps {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            flex-wrap: wrap;
        }

        .step-card {
            background: #C1D7E6;
            border: 3px solid #1D40AE;
            border-radius: 15px;
            padding: 40px 30px;
            width: 280px;
            text-align: center;
            transition: all 0.3s;
        }

        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(29, 64, 174, 0.3);
        }

        .step-number {
            width: 80px;
            height: 80px;
            background: #1D40AE;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: bold;
            margin: 0 auto 20px;
        }

        .step-card h3 {
            font-size: 24px;
            color: #1D40AE;
            margin-bottom: 15px;
        }

        .step-card p {
            color: #333;
            font-size: 16px;
            line-height: 1.5;
        }

        .users-section {
            background: #f8f9fa;
        }

        .users-grid {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .user-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            width: 450px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .user-card h3 {
            background: #1D40AE;
            color: white;
            padding: 20px;
            border-radius: 10px;
            font-size: 32px;
            text-align: center;
            margin-bottom: 30px;
        }

        .user-card h4 {
            color: #1D40AE;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .feature-list {
            list-style: none;
            margin-bottom: 30px;
        }

        .feature-list li {
            padding: 10px 0;
            color: #333;
            font-size: 16px;
        }

        .feature-list li:before {
            content: "✓ ";
            color: #1D40AE;
            font-weight: bold;
            font-size: 18px;
        }

        .cta-section {
            background: #1D40AE;
            color: white;
            text-align: center;
            padding: 80px 60px;
        }

        .cta-section h2 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 20px;
            margin-bottom: 40px;
        }

        .btn-white {
            background: white;
            color: #1D40AE;
            padding: 15px 40px;
            font-size: 18px;
        }

        .btn-white:hover {
            background: #C1D7E6;
        }

        .footer {
            background: #1D40AE;
            color: white;
            text-align: center;
            padding: 30px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .header {
                padding: 20px 30px;
            }

            .hero {
                flex-direction: column;
                text-align: center;
                padding: 60px 30px;
            }

            .hero-content {
                max-width: 100%;
            }

            .hero-content h1 {
                font-size: 36px;
            }

            .hero-image {
                margin-top: 40px;
            }

            .section {
                padding: 60px 30px;
            }

            .user-card {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER GLOBAL -->
    <header class="header">
    <div class="logo-container">
        <div class="logo-placeholder">
            <img src="{{ asset('img/Logo.png') }}" alt="Logo Rapichamba">
        </div>
        <div class="brand-name">RAPICHAMBA</div>
    </div>
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="btn btn-primary" style="text-decoration: none;">Iniciar sesión</a>
            <a href="{{ route('registro') }}" class="btn btn-secondary" style="text-decoration: none;">Registrarse</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <p>© 2025 Rapichamba. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
