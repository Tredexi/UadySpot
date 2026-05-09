<div class="admin-sidebar p-3">
    <div class="sidebar-logo mb-4">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }} ">
        <img src="{{ asset('Imagenes/logo_uady.png') }}" 
        alt="Logo" 
        class="rounded-circle me-2" 
        style="width: 42px; height: 42px; border: 2px solid var(--uady-gold); margin: 10px;">
        <div>
            <div class="brand-title text-white">UADY SPOT</div>
            <div class="brand-subtitle border-top border-white-50 mt-1" style="font-size: 0.65rem; color: rgba(255,255,255,0.8);">Plataforma Universitaria</div>
        </div>
    </a>
    </div>
    {{-- Usuario --}}
    <div class="admin-user mb-4 ">
            <div class="admin-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <strong>{{ auth()->user()->name }}</strong>
                <small class="d-block text-white-50">Administrador</small>
            </div>
    </div>

    {{-- Menú --}}

    <ul class="nav flex-column gap-2">

        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.evento.index') }}" class="nav-link">
                <i class="bi bi-calendar-event"></i>
                Eventos
            </a>
        </li>

        <li>
            <a href="{{ route('admin.beneficio.index') }}" class="nav-link">
                <i class="bi bi-gift"></i>
                Beneficios
            </a>
        </li>

        <li>
            <a href="{{ route('admin.trabajo.index') }}" class="nav-link">
                <i class="bi bi-briefcase"></i>
                Trabajos
            </a>
        </li>

        <hr class="border-light">

        <li>
            <a href="{{ route('logout') }}" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right"></i>
                Cerrar sesión
            </a>
        </li>

    </ul>

</div>