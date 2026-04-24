<nav class="navbar navbar-expand-lg navbar-uady sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('inicio') }}">
            <img src="{{ asset('Imagenes/logo_uady.png') }}" 
            alt="Logo" 
            class="rounded-circle me-2" 
            style="width: 42px; height: 42px; border: 2px solid var(--uady-gold);">
            <div>
                <div class="brand-title text-white">UADY SPOT</div>
                <div class="brand-subtitle border-top border-white-50 mt-1" style="font-size: 0.65rem; color: rgba(255,255,255,0.8);">Plataforma Universitaria</div>
            </div>
        </a>

        <button class="navbar-toggler border-0 shadow-none" 
            type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav">
            <i class="bi bi-list text-white fs-2"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto align-items-lg-center ms-lg-4">
                {{-- SIEMPRE VISIBLES --}}
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('inicio') ? 'active fw-bold' : '' }}" href="{{ route('inicio') }}">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('benefits.*') ? 'active fw-bold' : '' }}" href="{{ route('benefits.index') }}">Beneficios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('events.*') ? 'active fw-bold' : '' }}" href="{{ route('events.index') }}">Eventos</a>
                </li>
                

                {{-- SOLO SI ESTA LOGUEADO --}}
                    
                    @auth
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('social.index') }}">Social</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" data-bs-toggle="dropdown">Comunidad</a>
                        <ul class="dropdown-menu shadow border-0 mt-2">
                            <li><a class="dropdown-item" href="{{ route('news.index') }}">Noticias</a></li>
                            <li><a class="dropdown-item" href="{{ route('jobs.index') }}">Bolsa de Trabajo</a></li>
                            <li><a class="dropdown-item" href="{{ route('careers.index') }}">Carreras</a></li>

                            

                        </ul>
                    </li>
                    @endauth

                    
                <li class="nav-item"><a class="nav-link px-3" href="{{ route('nosotros') }}">Nosotros</a></li> 
            </ul>


            
            <div class="d-flex align-items-center gap-4 ms-auto">


            <button onclick="toggleTheme()" id="themeBtn">🌙</button>

                <a href="{{ route('cart.index') }}" class="text-white text-decoration-none position-relative px-2">

                {{-- Carrito --}}
                <a href="{{ route('cart.index') }}" 
                class="text-white text-decoration-none position-relative px-2">
                    <i class="bi bi-cart3 fs-5"></i>
                    @if(session('cart') && count(session('cart')) > 0)

                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        style="font-size: 0.6rem;">

                        {{ count(session('cart')) }}
                    </span>
                    @endif

                </a>
                {{-- Usuario --}}
                <ul class="navbar-nav">

                    @guest

                    <li class="nav-item">

                        <a class="nav-link"
                        href="{{ route('login') }}">

                            <i class="bi bi-person"></i>
                            Iniciar sesión

                        </a>

                    </li>

                    @endguest

                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" 
                        href="#" 
                        id="userDropdown" 
                        role="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span>{{ Auth::user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userDropdown">
                            {{-- Encabezado con información del usuario (Opcional, se ve muy bien) --}}
                            <li class="px-3 py-2">
                                <div class="text-muted small">Conectado como:</div>
                                <div class="fw-bold text-truncate" style="max-width: 150px;">{{ Auth::user()->email }}</div>
                            </li>
                            <li><hr class="dropdown-divider"></li>

                            {{-- 🟢 OPCIÓN PARA TODOS: Ir al Perfil --}}
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('auth.profile') }}">
                                    <i class="bi bi-person-badge text-primary"></i>
                                    Mi Perfil
                                </a>
                            </li>

                            {{-- 🔵 SOLO ADMIN: Panel de Control --}}
                            @if(Auth::user()->is_admin)
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-cpu text-danger"></i>
                                        Panel Administrador
                                    </a>
                                </li>
                            @endif

                            <li><hr class="dropdown-divider"></li>

                            {{-- 🔴 CERRAR SESIÓN --}}
                            <li>
                                {{-- Nota: Si usas el logout estándar de Laravel, recuerda que suele ser por POST --}}
                                <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="{{ route('logout') }}">
                                    <i class="bi bi-box-arrow-right"></i>
                                    Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>