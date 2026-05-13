@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row">
        {{-- 🔹 Columna Izquierda: Resumen del Perfil --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <div class="position-relative d-inline-block mx-auto mb-3">
                    <img src="{{ Auth::user()->profile_photo 
                        ? asset(Auth::user()->profile_photo) 
                        : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=003366&color=fff' }}"
                        
                        class="rounded-circle img-thumbnail shadow-sm" 
                        style="width: 150px; height: 150px; object-fit: cover;" 
                        alt="Avatar">
                    @if(Auth::user()->is_admin)
                        <span class="position-absolute bottom-0 end-0 badge rounded-pill bg-danger shadow">
                            Admin <i class="bi bi-shield-check"></i>
                        </span>
                    @endif
                </div>
                <h4 class="fw-bold mb-1">{{ Auth::user()->name }}</h4>
                <p class="text-muted small mb-3">{{ Auth::user()->email }}</p>
                <div class="badge bg-light text-dark border">Comunidad UADY</div>
            </div>
        </div>

        {{-- 🔹 Columna Derecha: Configuración --}}
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4">Configuración de la Cuenta</h3>

                    <form action="{{ route('auth.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Sección: Información Básica --}}
                        <h5 class="text-primary border-bottom pb-2 mb-3">Información Básica</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nombre Completo</label>
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Correo Institucional</label>
                                <input type="email" class="form-control bg-light" value="{{ Auth::user()->email }}" readonly>
                                <small class="text-muted">El correo no se puede cambiar.</small>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Foto de Perfil</label>
                            <input type="file" name="profile_photo" class="form-control" accept="image/*">
                        </div>

                        {{-- Sección: Seguridad --}}
                        <h5 class="text-primary border-bottom pb-2 mb-3">Seguridad</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nueva Contraseña</label>
                                <input type="password" name="password" class="form-control" placeholder="Dejar en blanco para mantener actual">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>

                        {{-- Sección: Preferencias Simples --}}
                        <h5 class="text-primary border-bottom pb-2 mb-3">Preferencias</h5>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" name="pref_notifications" id="pref_notifications" checked>
                                    <label class="form-check-label" for="pref_notifications">Recibir notificaciones de nuevos eventos</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="pref_newsletter" id="pref_newsletter">
                                    <label class="form-check-label" for="pref_newsletter">Recibir ofertas de trabajos urgentes en mi correo</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary px-4">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection