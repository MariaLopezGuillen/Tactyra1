<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 — Error del servidor</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">


 <link rel="stylesheet" href="{{ asset('css/500.css') }}"> 
</head>
<body>

    <div class="grid-bg"></div>
    <div class="blob"></div>
    <div class="scanlines"></div>

    <div class="wrapper">
        <div class="error-code">500</div>

        <div class="status-bar">
            <div class="status-dot"></div>
            <span>INTERNAL_SERVER_ERROR · LESIÓN EN EL CAMPO</span>
        </div>

        <p class="message">¡El portero está lesionado!</p>
        <p class="sub-message">
            Algo falló en nuestro vestuario. El equipo técnico ya está calentando para solucionarlo.
        </p>

        <div class="divider"></div>

        <div class="actions">
            <a href="{{ url('/') }}" class="btn btn-primary">
                ← Volver al inicio
            </a>
            <a href="javascript:history.back()" class="btn btn-ghost">
                Volver atrás
            </a>
        </div>
    </div>

    <p class="footer-code">
        <span>laravel</span> · resources/views/errors/500.blade.php
    </p>

</body>
</html>