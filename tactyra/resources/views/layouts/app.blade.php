<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->

<link rel="shortcut icon" href="{{ asset('img/tactyra-fav.png') }}" type="image/x-icon">

<!-- Apple -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

<!-- Android -->
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}">
<link rel="icon" type="image/png" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}">
<title>{{ config('app.name', 'Tactyra') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- CSS Footer -->
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

</head>

<body class="font-sans antialiased">

<div class="min-h-screen bg-gray-100">

    <!-- 🔵 NAVBAR CONTROLADA POR LARAVEL BREEZE -->
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

</div>

<!-- Footer -->
<x-footer />

</body>
</html>
