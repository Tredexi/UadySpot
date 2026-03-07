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
                    Comunidad</a>
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
                    Más</a>
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
                    <a href="{{ route('registro') }}" class="text-white text-decoration-none small d-flex align-items-center login-link">
                        <i class="bi bi-person me-1"></i>Iniciar sesión
                    </a>
                </div>
        </div>
    </div>
</nav>