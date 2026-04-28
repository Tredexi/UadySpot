<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin - @yield('titulo_pagina','Dashboard')</title>

{{-- CSS GLOBAL (igual que app) --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link rel="stylesheet" href="{{ asset('css/variables.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">
<link rel="stylesheet" href="{{ asset('css/dark.css') }}">

{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>

/* Layout principal admin */

.admin-wrapper {
    display: flex;
    min-height: 100vh;
}

/* Sidebar */

.admin-sidebar {
    width: 260px;
    background: linear-gradient(180deg,#0d1b3d,#08122b);
    color: white;
}

.admin-sidebar a {
    color: white;
    text-decoration: none;
}

.admin-sidebar a:hover {
    background: rgba(255,255,255,0.08);
}

/* Contenido */

.admin-content {
    flex: 1;
    padding: 30px;
    background: #f5f6fa;
}

/* Cards del dashboard */

.stat-card {
    border-radius: 14px;
    padding: 20px;
    background: white;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}

</style>

@yield('styles')

</head>

<body>

<div class="admin-wrapper">

    {{-- SIDEBAR --}}
    @include('admin.sidebar')

    {{-- CONTENIDO --}}
    <main class="admin-content">

        @yield('content')

    </main>

</div>

{{-- JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@yield('scripts')

</body>
</html>