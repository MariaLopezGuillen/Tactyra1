<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>419 — Sesión expirada</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="{{ asset('css/419.css') }}"> 
</head>
<body>

    <div class="grid-bg"></div>
    <div class="blob"></div>
    <div class="scanlines"></div>

    <div class="wrapper">
        <div class="error-code">419</div>

        <div class="status-bar">
            <div class="status-dot"></div>
            <span>PAGE_EXPIRED · PITIDO FINAL</span>
        </div>

        <p class="message">¡Se acabó el tiempo!</p>
        <p class="sub-message">
            El árbitro ha pitado el final. Tu sesión expiró y necesitas volver a entrar al campo.
        </p>

        <div class="divider"></div>

        <div class="actions">
            <a href="{{ url('/') }}" class="btn btn-primary">
                ← Volver al inicio
            </a>
            <a href="{{ route('login') }}" class="btn btn-ghost">
                Iniciar sesión
            </a>
        </div>
    </div>

    <p class="footer-code">
        <span>laravel</span> · resources/views/errors/419.blade.php
    </p>

</body>
</html>