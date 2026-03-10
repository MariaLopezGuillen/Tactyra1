<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="dashboard-container">

    <div class="header">
        <h2>Bienvenido, {{ Auth::user()->name }}</h2>
    </div>

    <div class="menu-cards">

        <div class="menu-item">
            <i class="bi bi-lightning"></i>
            <p>Entrenamiento</p>
        </div>

        <div class="menu-item">
            <i class="bi bi-clipboard-data"></i>
            <p>Evaluaciones</p>
        </div>

        <div class="menu-item">
            <i class="bi bi-bar-chart"></i>
            <p>Reportes</p>
        </div>

        <div class="menu-item">
            <i class="bi bi-folder"></i>
            <p>Recursos</p>
        </div>

    </div>

    <h4 class="section-title">Tus Actividades</h4>

    <div class="card activity-card">

        <div class="activity-header">
            <h5>Sesión de Memoria</h5>
        </div>

        <div class="progress">
            <div class="progress-bar bg-warning" style="width:75%"></div>
        </div>

        <div class="activity-info">
            <span>Progreso: 75%</span>
            <span>Siguiente: Nivel 4</span>
        </div>

    </div>

    <h4 class="section-title">Objetivos</h4>

    <div class="objective">

        <p>Resistencia Mental</p>

        <div class="progress">
            <div class="progress-bar" style="width:60%"></div>
        </div>

    </div>

    <div class="objective">

        <p>Enfoque</p>

        <div class="progress">
            <div class="progress-bar bg-info" style="width:30%"></div>
        </div>

    </div>

    <button class="btn btn-primary start-btn">
        Iniciar Nuevas Actividades
    </button>

</div>

</x-app-layout>