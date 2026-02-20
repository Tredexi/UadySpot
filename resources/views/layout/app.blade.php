<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uady Spot - @yield('titulo_pagina', 'Inicio')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        /* VARIABLES GLOBALES */
        :root {
            --uady-blue: #002e5f;   /* Azul UADY */
            --uady-gold: #CB9605;   /* Dorado UADY */
            --uady-white: #FFFFFF;   /* Blanco */
            --uady-black: #000000;   /* Negro */
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* NAVBAR PRINCIPAL */
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
            transition: 0.3s;
        }

        .nav-link:hover {
            color: var(--uady-gold) !important;
        }

        /* BRAND (Logo + Texto) */
        .brand-title {
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 1px;
            line-height: 1;
        }

        .brand-subtitle {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.65);
            letter-spacing: 0.5px;
        }

        /* BUSCADOR */
        .search-wrapper {
            display: flex;
            align-items: center;
            background-color: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 25px;
            padding: 5px 12px;
            transition: 0.3s ease;
        }

        .search-wrapper i {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            margin-right: 8px;
        }

        .search-wrapper input {
            border: none;
            background: transparent;
            outline: none;
            color: white;
            width: 180px;
            font-size: 0.9rem;
        }

        .search-wrapper input::placeholder {
            color: rgba(255,255,255,0.6);
        }

        .search-wrapper:focus-within {
            background-color: white;
            border-color: var(--uady-gold);
        }

        .search-wrapper:focus-within input {
            color: var(--uady-blue);
        }

        /* LOGIN / REGISTRO */
        .login-link {
            transition: 0.3s;
            white-space: nowrap;
        }

        .login-link:hover {
            color: var(--uady-gold);
        }

        .register-link {
            background-color: var(--uady-gold);
            color: var(--uady-blue);
            padding: 5px 14px;
            border-radius: 20px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .register-link:hover {
            background-color: #e0a800;
            color: var(--uady-blue);
        }

        .dropdown-menu {
            border-radius: 12px;
            border: none;
            padding: 12px 0;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            animation: fadeIn 0.2s ease-in-out;
        }

        .dropdown-item {
            padding: 10px 20px;
            transition: 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: rgba(203,150,5,0.1);
            color: var(--uady-blue);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* FOOTER */
        footer {
            background-color: var(--uady-blue);
            color: var(--uady-white);
        }

        .footer-link {
            color: #adb5bd;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-link:hover {
            color: var(--uady-gold);
        }

        .footer-icon {
            color: #adb5bd;
            transition: 0.3s;
        }

        .footer-icon:hover {
            color: var(--uady-gold);
        }

        .footer-divider {
            border-left: 2px solid var(--uady-gold);
        }

        @media (max-width: 767px) {
            .footer-divider {
                border-left: none;
            }
        }
    </style>
    @yield('styles')  
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-uady sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('inicio') }}">
                <img src="{{ asset('Imagenes/logo_uady.png') }}" 
                alt="Logo" 
                class="rounded-circle me-2" 
                style="width: 42px; height: 42px; border: 2px solid var(--uady-gold);">

                <div>
                    <div class="brand-title text-white">UADY SPOT</div>
                    <div class="brand-subtitle">Plataforma Universitaria</div>
                </div>
            </a>
            <!-- Botón móvil -->
            <button class="navbar-toggler border-0 shadow-none" 
                    type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav">
                <i class="bi bi-list text-white fs-2"></i>
            </button>
            <!--NAVBAR DE NAVEGACION-->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-ig-center">
                    <li class="nav-item">
                        <a 
                        class="nav-link px-3 active" 
                        href="#">Inicio
                        </a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" 
                        href="#">Eventos
                        </a></li>
                    -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" 
                        href="#" 
                        data-bs-toggle="dropdown">Comunidad
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Estudiantes</a></li>
                            <li><a class="dropdown-item" href="#">Egresados</a></li>
                            <li><a class="dropdown-item" href="#">Personal UADY</a></li>
                        </ul>
                    </li>
                        <!-- Ofertas Educativas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" 
                        href="#" 
                        data-bs-toggle="dropdown">
                        Ofertas Educativas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Bachilleratos</a></li>
                        <li><a class="dropdown-item" href="#">Carreras Universitarias</a></li>
                        <li><a class="dropdown-item" href="#">Posgrado</a></li>
                        <li><a class="dropdown-item" href="#">Idiomas</a></li>
                    </ul>
                    </li>
                    <!--Mas-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3"
                        href="#"
                        data-bs-toggle="dropdown">
                        Más
                        </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Deportes</a></li>
                    <li><a class="dropdown-item" href="#">Cultura</a></li>
                    <li><a class="dropdown-item" href="#">Eventos</a></li>
                    <li><a class="dropdown-item" href="#">Noticias</a></li>
                    </ul>
                    </li>
                    
                    


                    <!--    
                    <li class="nav-item ms-lg-3 d-flex align-items-center">
                    <span class="text-white me-2 small">USUARIO</span>
                    <img src="{{ asset('Imagenes/perfil.jpg') }}" alt="User" class="rounded-circle shadow-sm" style="width: 40px; height: 40px; border: 2px solid var(--uady-gold);">
                    </li>-->
                </ul>
                         <!-- Buscador -->
                    <form class="w-50 w-lg-auto">
                     <div class="search-wrapper">
                            <i class="bi bi-search"></i>
                            <input type="search" placeholder="Buscar eventos...">
                        </div>
                    </form>
                        <!-- Acciones -->
                    <div class="d-flex align-items-center gap-4 ms-3">
                         <!-- Login con icono -->
                        <a href="#" class="text-white text-decoration-none small d-flex align-items-center login-link">
                            <i class="bi bi-person me-1"></i>
                            Iniciar sesión
                        </a>
                        </div>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="mt-5">
    <div class="container py-5">
        <div class="row text-start">

            <!-- Marca -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold text-white mb-3" style="letter-spacing: 1px;">
                    UADY SPOT
                </h5>
                <p class="small text-light mb-3" style="line-height: 1.6;">
                    Plataforma digital universitaria para la gestión y difusión de eventos académicos y estudiantiles.
                </p>
                <div class="small text-light" style="opacity: 0.85;">
                    <div class="mb-1 fw-semibold">Universidad Autónoma de Yucatán</div>
                    <div>Mérida, Yucatán, México</div>
                </div>
            </div>

            <!-- Enlaces -->
            <div class="col-md-4 mb-4 footer-divider ps-md-4">
                <h6 class="fw-bold text-white">Servicios Universitarios</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="footer-link">Publicar Evento</a></li>
                    <li><a href="#" class="footer-link">Calendario Académico</a></li>
                    <li><a href="#" class="footer-link">Convocatorias</a></li>
                    <li><a href="#" class="footer-link">Bolsa Universitaria</a></li>
                    <li><a href="#" class="footer-link">Reglamento</a></li>
                </ul>
            </div>

            <!-- Redes -->
            <div class="col-md-4 mb-4 footer-divider ps-md-4">
                <h6 class="fw-bold text-white">Redes Oficiales</h6>
                <div class="d-flex flex-wrap gap-3 fs-5">

                    <a href="https://www.facebook.com/face.uady/" target="_blank" class="footer-icon" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://comunicacion.uady.mx/radio--universidad/bienvenida" target="_blank" class="footer-icon" title="Radio Universidad">
                        <i class="bi bi-broadcast"></i>
                    </a>

                    <a href="https://www.tiktok.com/@uadyinstitucional?is_from_webapp=1&sender_device=pc" target="_blank" class="footer-icon" title="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>

                    <a href="https://www.youtube.com/user/UADYInstitucional" target="_blank" class="footer-icon" title="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>

                    <a href="https://www.instagram.com/uady_institucional/" target="_blank" class="footer-icon" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="https://x.com/UADYoficial" target="_blank" class="footer-icon" title="X">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="https://www.linkedin.com/company/uadyinstitucional" target="_blank" class="footer-icon" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>

                </div>
            </div>
        </div>

<hr class="border-secondary">
<div class="text-center mt-4">

    <!-- Logo centrado -->
    <img src="{{ asset('Imagenes/logo_uady.png') }}" 
        alt="Logo UADY Spot" 
        class="rounded-circle shadow-sm mb-3"
        style="width: 70px; height: 70px; border: 3px solid var(--uady-gold);">

    <!-- Texto con eslogan -->
    <div class="small text-secondary">
        © {{ date('Y') }} UADY SPOT — Conectando mentes, uniendo jaguares.
    </div>

</div>
</footer> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>