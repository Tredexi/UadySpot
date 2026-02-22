<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uady Spot - @yield('titulo_pagina', 'Inicio')</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

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
                        data-bs-toggle="dropdown">Eventos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Hoy</a></li>
                            <li><a class="dropdown-item" href="#">Mañana</a></li>
                            <li><a class="dropdown-item" href="#">Próximos</a></li>
                        </ul>
                    </li>
                        <!-- Ofertas Educativas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" 
                        href="#" 
                        data-bs-toggle="dropdown">
                        Comunidad
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Bachilleratos</a></li>
                        <li><a class="dropdown-item" href="#">Universidad</a></li>
                        <li><a class="dropdown-item" href="#">Posgrado</a></li>
                        <li><a class="dropdown-item" href="#">Personal Académico</a></li>
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
                    <li><a class="dropdown-item" href="#">Arte</a></li>
                    <li><a class="dropdown-item" href="#">Todo</a></li>
                    </ul>
                    </li>
                    
                    


                    <!--    
                    <li class="nav-item ms-lg-3 d-flex align-items-center">
                    <span class="text-white me-2 small">USUARIO</span>
                    <img src="{{ asset('Imagenes/perfil.jpg') }}" alt="User" class="rounded-circle shadow-sm" style="width: 40px; height: 40px; border: 2px solid var(--uady-gold);">
                    </li>-->
                </ul>
                        <!-- Buscador -->
                    <form class="w-100 w-lg-auto">
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
    <script>
        const select = document.querySelector('.campus-select');
        const cards = document.querySelectorAll('.event-card');

        select.addEventListener('change', () => {
            const campus = select.value;

            cards.forEach(card => {
                if (campus === 'all' || card.dataset.campus === campus) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>