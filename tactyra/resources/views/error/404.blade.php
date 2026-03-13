<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 — Página no encontrada</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">


 <link rel="stylesheet" href="{{ asset('css/404.css') }}">
</head>
<body>

    <div class="grid-bg"></div>
    <div class="blob"></div>
    <div class="scanlines"></div>

    <div class="wrapper">
        <div class="error-code">404</div>

        <div class="status-bar">
            <div class="status-dot"></div>
            <span>HTTP_NOT_FOUND · RUTA INEXISTENTE</span>
        </div>

        <p class="message">¡Vaya! Esta pagina no esta convocada</p>
        <p class="sub-message">
            La URL se ha quedado fuera de la convocatoria.
        </p>

        <div class="divider"></div>

        <div class="actions">
            <a href="{{ url('/') }}" class="btn btn-primary">
                ← Volver al partido
            </a>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-ghost">
                    Dashboard
                </a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="btn btn-ghost">
                    Iniciar sesión
                </a>
            @endguest
        </div>
    </div>

    <p class="footer-code">
        <span>laravel</span> · resources/views/errors/404.blade.php
    </p>

</body>
</html>