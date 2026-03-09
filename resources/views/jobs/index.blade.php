@extends('layout.app')
@section('titulo_pagina', 'Bolsa de Trabajo')

@section('content')

<style>
    .job-card {
        transition: all 0.2s ease-in-out;
        border: 1px solid #e0e0e0;
        cursor: pointer;
    }
    .job-card:hover {
        border-color: var(--uady-blue);
        box-shadow: 0 4px 15px rgba(0,46,95,0.1);
    }
    .job-title {
        color: var(--uady-blue);
        text-decoration: none;
    }
    .job-title:hover {
        text-decoration: underline;
    }
    .bg-uady-light {
        background-color: rgba(0,46,95,0.05);
    }
</style>

{{-- Sección de Búsqueda --}}
<div class="bg-uady-light py-5 mb-4 border-bottom">
    <div class="container">
        <h1 class="fw-bold mb-4 text-center" style="color: var(--uady-blue);">Encuentra el empleo ideal para ti</h1>
        
        <form action="{{ route('jobs.index') }}" method="GET" class="row g-2 justify-content-center max-w-7xl mx-auto">
            {{-- Preservar filtros de checkbox al buscar por texto --}}
            @if(request('modality'))
                @foreach(request('modality') as $mod)
                    <input type="hidden" name="modality[]" value="{{ $mod }}">
                @endforeach
            @endif
            @if(request('type'))
                @foreach(request('type') as $t)
                    <input type="hidden" name="type[]" value="{{ $t }}">
                @endforeach
            @endif

            <div class="col-md-5">
                <div class="input-group input-group-lg shadow-sm">
                    <span class="input-group-text bg-white text-muted border-end-0"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" 
                        placeholder="Cargo, empresa o palabra clave" value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-lg shadow-sm">
                    <span class="input-group-text bg-white text-muted border-end-0"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" name="location" class="form-control border-start-0" 
                        placeholder="Ciudad o estado" value="{{ request('location') }}">
                </div>
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn fw-bold text-white shadow-sm" style="background-color: var(--uady-blue);">Buscar</button>
            </div>
        </form>
    </div>
</div>

<div class="container mb-5">
    <div class="row"> {{-- Fila principal añadida --}}
        
        {{-- Columna de Filtros --}}
        <div class="col-lg-3 mb-4">
            <form action="{{ route('jobs.index') }}" method="GET" id="filterForm">
                {{-- Preservar búsqueda de texto al filtrar por checkbox --}}
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="location" value="{{ request('location') }}">

                <div class="card border-0 shadow-sm rounded-3 p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">Filtros</h5>
                        <a href="{{ route('jobs.index') }}" class="text-muted small text-decoration-none">Limpiar</a>
                    </div>
                    <hr class="text-muted mt-0">

                    <div class="mb-4">
                        <h6 class="fw-bold small text-secondary text-uppercase mb-2">Modalidad</h6>
                        @foreach(['Presencial', 'Remoto', 'Híbrido'] as $mod)
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" name="modality[]" value="{{ $mod }}" 
                                id="mod{{ $mod }}" onchange="this.form.submit()"
                                {{ is_array(request('modality')) && in_array($mod, request('modality')) ? 'checked' : '' }}>
                            <label class="form-check-label small" for="mod{{ $mod }}">{{ $mod }}</label>
                        </div>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold small text-secondary text-uppercase mb-2">Tipo de Empleo</h6>
                        @php
                            $tipos = [
                                'Tiempo Completo' => 'tipoFull',
                                'Medio Tiempo' => 'tipoMedio',
                                'Prácticas' => 'tipoPracticas',
                                'Freelance' => 'tipoFreelance'
                            ];
                        @endphp
                        @foreach($tipos as $label => $id)
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" name="type[]" value="{{ $label }}" 
                                id="{{ $id }}" onchange="this.form.submit()"
                                {{ is_array(request('type')) && in_array($label, request('type')) ? 'checked' : '' }}>
                            <label class="form-check-label small" for="{{ $id }}">{{ $label }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>        

        {{-- Columna de Resultados --}}
        <div class="col-lg-9">
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="text-muted mb-0">
                    @if($jobs->count() > 0)
                        Mostrando <strong>{{ $jobs->count() }}</strong> empleos disponibles
                    @else
                        No se encontraron empleos con esos criterios
                    @endif
                </p>
                <select class="form-select form-select-sm w-auto border-0 bg-light text-secondary fw-medium">
                    <option>Ordenar por: Más recientes</option>
                    <option>Ordenar por: Salario</option>
                </select>
            </div>

            @forelse($jobs as $job)
                <div class="card job-card rounded-3 mb-3 p-4">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <a href="#" class="job-title fs-5 fw-bold">{{ $job['title'] }}</a>
                                @if($job['is_new'])
                                    <span class="badge bg-danger rounded-pill" style="font-size: 0.7rem;">Nuevo</span>
                                @endif
                            </div>
                            
                            <p class="mb-2 text-dark fw-medium">
                                {{ $job['company'] }} <span class="text-muted fw-normal ms-1"><i class="bi bi-star-fill text-warning" style="font-size: 0.8rem;"></i> 4.5</span>
                            </p>
                            
                            <div class="d-flex flex-wrap gap-3 mb-3 text-secondary small">
                                <div><i class="bi bi-geo-alt me-1"></i>{{ $job['location'] }}</div>
                                <div><i class="bi bi-cash me-1"></i>{{ $job['salary'] }}</div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge bg-light text-dark border fw-normal"><i class="bi bi-briefcase me-1 text-muted"></i>{{ $job['type'] }}</span>
                                <span class="badge bg-light text-dark border fw-normal"><i class="bi bi-laptop me-1 text-muted"></i>{{ $job['modality'] }}</span>
                                @if($job['urgent'])
                                    <span class="badge bg-warning bg-opacity-10 text-dark border border-warning fw-normal"><i class="bi bi-lightning-charge-fill text-warning me-1"></i>Contratación urgente</span>
                                @endif
                            </div>

                            <ul class="text-muted small mb-0 ps-3" style="list-style-type: circle;">
                                <li>{{ $job['description'] }}</li>
                            </ul>
                        </div>
                        
                        <div class="col-md-3 d-flex flex-column justify-content-between align-items-end mt-3 mt-md-0">
                            <button class="btn btn-light rounded-circle text-muted shadow-sm" style="width: 40px; height: 40px;">
                                <i class="bi bi-heart"></i>
                            </button>
                            
                            <div class="text-end">
                                <p class="small text-muted mb-2">{{ $job['posted_at'] }}</p>
                                <a href="#" class="btn btn-sm fw-bold px-3 py-2" style="background-color: var(--uady-gold); color: var(--uady-blue);">
                                    Postulación rápida
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="bi bi-search text-muted" style="font-size: 3rem;"></i>
                    <p class="mt-3 text-muted">Intenta ajustar los filtros para encontrar más resultados.</p>
                </div>
            @endforelse

            {{-- Paginación (Simulada) --}}
            @if($jobs->count() > 0)
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item active"><a class="page-link" href="#" style="background-color: var(--uady-blue); border-color: var(--uady-blue);">1</a></li>
                    <li class="page-item"><a class="page-link text-secondary" href="#">Siguiente</a></li>
                </ul>
            </nav>
            @endif

        </div>
    </div> {{-- Fin Row --}}
</div>
@endsection