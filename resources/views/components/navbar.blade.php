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
                        <a class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i>

                            {{ Auth::user()->name }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            {{-- Solo admin --}}
                            @if(Auth::user()->is_admin)

                            <li>

                                <a class="dropdown-item"
                                href="{{ route('admin.dashboard') }}">

                                    Panel Administrador
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            @endif
                            <li>
                                <a class="dropdown-item"
                                href="{{ route('logout') }}">
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