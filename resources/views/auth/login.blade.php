@extends('layout.app')
@section('titulo_pagina', 'Iniciar Sesión')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                
                <div class="card-header text-white text-center py-4"
                    style="background-color: var(--uady-blue); border-bottom: 4px solid var(--uady-gold);">

                    <img src="/imagenes/logos/LogoUady.png" 
                        alt="UADY" 
                        style="height: 90px; margin-bottom: 10px;">

                    <h4 class="mb-0 fw-bold">Inicia sesión</h4>
                    <p class="mb-0 small" style="color: rgba(255,255,255,0.8);">
                        Accede a tu cuenta de UADY SPOT
                    </p>
                </div>

                <div class="card-body p-4 p-md-5 bg-white">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium text-secondary">Correo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope text-muted"></i>
                                </span>
                                <input type="email"
                                    class="form-control border-start-0 @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="alguien@ejemplo.com"
                                    required>

                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-medium text-secondary">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock text-muted"></i>
                                </span>
                                <input type="password"
                                    class="form-control border-start-0 @error('password') is-invalid @enderror"
                                    id="password"
                                    name="password"
                                    placeholder="Ingresa tu contraseña"
                                    required>

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="captcha-group">
                            <div class="captcha-image-wrapper">
                                {!! captcha_img() !!}
                            </div>
                            
                            <input type="text" name="captcha" 
                                placeholder="Introduce el código" 
                                class="input captcha-input" 
                                required>
                        </div>

                        <button type="submit"
                            class="btn w-100 fw-bold py-2 mb-3"
                            style="background-color: var(--uady-gold); color: var(--uady-blue);">
                            Iniciar sesión
                        </button>

                        <div class="text-center text-secondary small">
                            ¿No tienes una cuenta?
                            <a href="{{ route('registro') }}"
                                class="text-decoration-none fw-bold"
                                style="color: var(--uady-blue);">
                                Regístrate aquí
                            </a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection