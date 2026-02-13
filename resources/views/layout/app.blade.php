<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uady Spot - @yield('titulo_pagina', 'Inicio')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --uady-blue: #144280;   /* Tu azul solicitado */
            --uady-gold: #CB9605;   /* Tu dorado solicitado */
            --uady-black: #000000;
            --uady-white: #FFFFFF;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Barra de navegación personalizada */
        .navbar-uady {
            background-color: var(--uady-blue);
            border-bottom: 4px solid var(--uady-gold);
            padding: 15px 0;
        }

        .navbar-brand {
            color: var(--uady-white) !important;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .nav-link {
            color: var(--uady-white) !important;
            margin-right: 15px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--uady-gold) !important;
        }

        /* Footer profesional */
        footer {
            background-color: var(--uady-black);
            color: var(--uady-white);
            padding: 30px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-uady sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('inicio') }}">
                <img src="{{ asset('Imagenes/logo_uady.png') }}" alt="Logo" class="rounded-circle me-2" style="width: 40px; height: 40px; border: 2px solid var(--uady-gold);">
                UADY SPOT
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Eventos</a></li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Comunidad</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Campus</a></li>
                            <li><a class="dropdown-item" href="#">Facultad</a></li>
                            <li><a class="dropdown-item" href="#">Escuela</a></li>
                        </ul>
                    </li>

                    <li class="nav-item ms-lg-3 d-flex align-items-center">
                    <span class="text-white me-2 small">Didier Sanchez</span>
                    <img src="{{ asset('Imagenes/perfil.jpg') }}" alt="User" class="rounded-circle shadow-sm" style="width: 40px; height: 40px; border: 2px solid var(--uady-gold);">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="text-center">
        <div class="container">
            <p class="mb-1">Uady Spot</p>
            <p class="mb-0 small text-secondary">Conectando mentes, uniendo jaguares- 2026</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>