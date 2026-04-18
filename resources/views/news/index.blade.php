@extends('layout.app')
@section('titulo_pagina', 'Noticias y Avisos')

@section('content')
<div class="container py-5 my-3">

    {{-- 1. HERO SECTION (Encabezado principal) --}}
    <div class="bg-white rounded-4 shadow-sm border p-4 p-md-5 mb-5 text-center text-md-start position-relative overflow-hidden">
        <div class="row align-items-center position-relative z-2">
            <div class="col-md-8">
                <span class="badge px-3 py-2 rounded-pill mb-3" style="background-color: var(--uady-gold, #CBA052); color: var(--uady-blue, #002E5F);">
                    Comunidad UADY Spot
                </span>
                <h1 class="display-5 fw-bolder mb-3" style="color: var(--uady-blue, #002E5F);">
                    {{ $datos['titulo_principal'] }}
                </h1>
                <p class="fs-5 text-secondary mb-0" style="max-width: 700px;">
                    {{ $datos['frase_bienvenida'] }}
                </p>
            </div>
            <div class="col-md-4 d-none d-md-block text-end">
                <i class="bi bi-newspaper text-light opacity-50" style="font-size: 8rem;"></i>
            </div>
        </div>
    </div>

    <div class="row g-5">
        
        {{-- 2. COLUMNA PRINCIPAL: NOTICIAS (Ocupa 8 de 12 columnas) --}}
        <div class="col-lg-8">
            
            {{-- Encabezado de la sección --}}
            <div class="d-flex justify-content-between align-items-end mb-4 border-bottom pb-3">
                <h3 class="fw-bold mb-0">Últimas Noticias</h3>
                <a href="#" class="text-decoration-none fw-bold" style="color: var(--uady-blue, #002E5F);">
                    Ver todas <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            {{-- Grid de Noticias (2 columnas en escritorio, 1 en celular) --}}
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
                @forelse($datos['noticias'] as $noticia)
                    <div class="col">
                        <x-news.card-noticia 
                            :categoria="$noticia['categoria']"
                            :titulo="$noticia['titulo']"
                            :desc="$noticia['desc']"
                            :autor="$noticia['autor']"
                            :fecha="$noticia['fecha']"
                            :tiempoLectura="$noticia['tiempo_lectura']"
                            :img="$noticia['img']"
                            :etiquetaEspecial="$noticia['etiqueta_especial']"
                            :url="$noticia['url']"
                        />
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No hay noticias publicadas por el momento.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- 3. BARRA LATERAL (SIDEBAR): BENEFICIOS RÁPIDOS (Ocupa 4 de 12 columnas) --}}
        <div class="col-lg-4">
            
            <div class="card border-0 shadow-sm rounded-4 bg-light p-4" style="top: 2rem;">
                
                {{-- Encabezado de la sección lateral --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0"><i class="bi bi-star-fill text-warning me-2"></i> Beneficios Destacados</h5>
                </div>

                {{-- Lista de Beneficios --}}
                <div class="d-flex flex-column gap-3">
                    @foreach($datos['beneficios'] as $beneficio)
                        <div class="card border-0 shadow-sm rounded-3 overflow-hidden text-decoration-none text-dark transition-transform hover-scale">
                            <div class="row g-0 align-items-center">
                                <div class="col-4">
                                    <img src="{{ asset($beneficio['img']) }}" alt="{{ $beneficio['titulo'] }}" class="img-fluid object-fit-cover h-100" style="min-height: 90px;">
                                </div>
                                <div class="col-8">
                                    <div class="card-body p-3">
                                        <h6 class="fw-bold mb-1" style="font-size: 0.9rem;">{{ $beneficio['titulo'] }}</h6>
                                        <p class="text-muted small mb-0" style="font-size: 0.8rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $beneficio['desc'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Botón inferior del sidebar --}}
                <div class="mt-4 text-center">
                    <a href="{{ route('benefits.index') }}" class="btn btn-outline-dark rounded-pill w-100 fw-bold">
                        Ver todos los beneficios <i class="bi bi-arrow-up-right ms-1"></i>
                    </a>
                </div>

            </div>
            
        </div>
    </div>
</div>

<style>
    /* Pequeño efecto hover para las tarjetitas del sidebar */
    .hover-scale {
        transition: transform 0.2s ease;
        cursor: pointer;
    }
    .hover-scale:hover {
        transform: translateY(-3px);
    }
</style>
@endsection