@extends('layout.app')
@section('titulo_pagina', 'Crear Cuenta')

@section('content')
<div class="container py-5">
    {{-- Tarjeta principal expandida --}}
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="min-height: 75vh;">
        <div class="row g-0 h-100" style="min-height: 75vh;">
            
            {{-- MITAD IZQUIERDA: Formulario --}}
            <div class="col-md-6 col-lg-5 d-flex flex-column justify-content-center p-4 p-lg-5 bg-white">
                
                {{-- Encabezado del formulario --}}
                <div class="mb-4 text-center text-md-start">
                    <span class="badge px-3 py-2 rounded-pill mb-3" style="background-color: var(--uady-gold); color: var(--uady-blue);">
                        Uady Spot
                    </span>
                    <h2 class="fw-bolder mb-2" style="color: var(--uady-blue);">Únete a la Comunidad</h2>
                    <p class="text-muted">Crea tu cuenta gratis y desbloquea beneficios, eventos y ofertas de trabajo exclusivas.</p>
                </div>

                <form action="{{ route('registro.post') }}" method="POST">
                    @csrf 
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium text-secondary small">Nombre Completo</label>
                        <div class="input-group input-group-lg shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-person text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 fs-6 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Ej. Juan Pérez" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium text-secondary small">Correo Institucional / Personal</label>
                        <div class="input-group input-group-lg shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                            <input type="email" class="form-control border-start-0 fs-6 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="alguien@ejemplo.com" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-medium text-secondary small">Contraseña</label>
                        <div class="input-group input-group-lg shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock text-muted"></i></span>
                            <input type="password" class="form-control border-start-0 fs-6 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-medium text-secondary small">Confirmar Contraseña</label>
                        <div class="input-group input-group-lg shadow-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-check-circle text-muted"></i></span>
                            <input type="password" class="form-control border-start-0 fs-6" id="password_confirmation" name="password_confirmation" placeholder="Vuelve a escribir tu contraseña" required>
                        </div>
                    </div>

                    <button type="submit" class="btn w-100 fw-bold py-3 mb-4 shadow-sm" style="background-color: var(--uady-blue); color: white; font-size: 1.1rem;">
                        Crear mi cuenta
                    </button>

                    <div class="text-center text-secondary">
                        ¿Ya eres parte de UADY Spot? <br>
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold mt-1 d-inline-block" style="color: var(--uady-gold);">Inicia sesión aquí</a>
                    </div>
                </form>
            </div>

            {{-- MITAD DERECHA: Carrusel Dinámico (Se oculta en celulares) --}}
            <div class="col-md-6 col-lg-7 d-none d-md-block position-relative">
                <div id="registroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
                    
                    {{-- Indicadores (Los puntitos de abajo) --}}
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#registroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#registroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#registroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner h-100">
                        {{-- Slide 1: Eventos --}}
                        <div class="carousel-item active h-100">
                            {{-- NOTA: Cambia el src por la ruta real de tus imágenes --}}
                            <img src="/imagenes/registro.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Eventos UADY" style="filter: brightness(0.7);">
                            <div class="carousel-caption d-none d-md-block pb-5 text-start">
                                <h3 class="fw-bolder display-6 text-white text-shadow">Vive la Universidad</h3>
                                <p class="fs-5 text-white opacity-75">Regístrate a talleres, conferencias y conciertos antes que nadie.</p>
                            </div>
                        </div>

                        {{-- Slide 2: Beneficios --}}
                        <div class="carousel-item h-100">
                            <img src="/imagenes/concierto-candlelight.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Beneficios UADY" style="filter: brightness(0.7);">
                            <div class="carousel-caption d-none d-md-block pb-5 text-start">
                                <h3 class="fw-bolder display-6 text-white text-shadow">Descuentos Exclusivos</h3>
                                <p class="fs-5 text-white opacity-75">Tu credencial es tu pase VIP. Ahorra todos los días en tus lugares favoritos.</p>
                            </div>
                        </div>

                        {{-- Slide 3: Empleos --}}
                        <div class="carousel-item h-100">
                            <img src="/imagenes/Registro/trabajo.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Bolsa de trabajo UADY" style="filter: brightness(0.7);">
                            <div class="carousel-caption d-none d-md-block pb-5 text-start">
                                <h3 class="fw-bolder display-6 text-white text-shadow">Impulsa tu Carrera</h3>
                                <p class="fs-5 text-white opacity-75">Encuentra tu primer empleo o prácticas profesionales en las mejores empresas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Efecto sutil para las letras del carrusel */
    .text-shadow {
        text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
    }
</style>
@endsection