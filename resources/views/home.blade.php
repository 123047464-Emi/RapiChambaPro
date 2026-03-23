@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<section class="hero">
    <div class="hero-content">
        <h1>Soluciones rápidas, ingresos extra. Al alcance de un clic.</h1>
        <p>Conectamos personas que requieren apoyo con quienes pueden brindarlo. De forma segura, rápida y confiable.</p>
        <div class="hero-buttons">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Soy Trabajador</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Soy Empleador</a>
        </div>
    </div>

    <div class="hero-image">
        <div class="circle-logo">
            <img src="{{ asset('img/Logo.png') }}" alt="Logo Rapichamba" onerror="this.style.display='none'">
        </div>
    </div>
</section>

<section class="section">
    <h2 class="section-title">¿Cómo funciona RapiChamba?</h2>
    <div class="steps">
        <div class="step-card">
            <div class="step-number">1</div>
            <h3>Publica o Encuentra</h3>
            <p>Describe tu tarea o busca chambas cerca de ti.</p>
        </div>
        <div class="step-card">
            <div class="step-number">2</div>
            <h3>Conecta</h3>
            <p>Acuerda los detalles y el precio de forma segura en la app.</p>
        </div>
        <div class="step-card">
            <div class="step-number">3</div>
            <h3>Resuelve</h3>
            <p>¡La tarea se realiza!</p>
        </div>
    </div>
</section>

<section class="section users-section">
    <h2 class="section-title">Para cada tipo de usuario</h2>
    <div class="users-grid">
        <div class="user-card">
            <h3>Trabajador</h3>
            <h4>Gana dinero con tu tiempo libre</h4>
            <ul class="feature-list">
                <li>Ofrece tus habilidades</li>
                <li>Ayuda a tu comunidad</li>
                <li>Trabaja cuando quieras</li>
                <li>Construye tu reputación</li>
            </ul>
            <a href="{{ route('registro') }}" class="btn btn-primary">Registrarme como Trabajador</a>
        </div>

        <div class="user-card">
            <h3>Empleadores</h3>
            <h4>Resuelve tus tareas pendientes</h4>
            <ul class="feature-list">
                <li>Encuentra personas verificadas</li>
                <li>Paga de forma segura</li>
                <li>Califica el servicio</li>
                <li>Publica trabajos en minutos</li>
            </ul>
            <a href="{{ route('registro') }}" class="btn btn-primary">Registrarme como Empleador</a>
        </div>
    </div>
</section>

<section class="cta-section">
    <h2>¡Únete a la comunidad Rapichamba hoy!</h2>
    <p>Empieza a resolver o a generar ingresos.</p>
    <a href="{{ route('registro') }}" class="btn btn-white">Crear mi cuenta</a>
</section>

@endsection