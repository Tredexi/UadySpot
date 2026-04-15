@extends('layout.app')
@section('titulo_pagina', 'Bolsa de Trabajo')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section('content')



<div class="container bg-white rounded-4 shadow border p-4 my-5">

    {{-- 1. HEADER (Estilo horizontal de la imagen) --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <h1 class="fw-bold fs-3 mb-0" style="color: #002E5F;">Encuentra tu próximo empleo</h1>
        
        <div class="input-group" style="max-width: 350px;">
            <input type="text" name="search" form="filterForm" class="form-control" placeholder="Buscar empleo..." value="{{ request('search') }}">
            <button type="submit" form="filterForm" class="btn text-white fw-bold" style="background-color: #0056b3;">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>

    {{-- 2. FILTROS HORIZONTALES (Píldoras y Dropdowns) --}}
    <form action="{{ route('jobs.index') }}" method="GET" id="filterForm">
        <div class="d-flex flex-column gap-3 mb-5 pb-4 border-bottom">
            
            {{-- Píldoras: Tipo de Empleo --}}
            <div class="d-flex flex-wrap align-items-center gap-2">
                @php
                    $tipos = ['Tiempo Completo', 'Medio Tiempo', 'Prácticas', 'Freelance'];
                    // Leemos el array 'type' que envía el controlador
                    $currentType = request('type') ? request('type')[0] : null; 
                @endphp
                
                {{-- Botón "Todos" --}}
                <a href="{{ route('jobs.index', request()->except('type')) }}" class="badge rounded-pill px-4 py-2 text-decoration-none {{ !$currentType ? 'bg-primary text-white' : 'bg-light text-dark border' }}" style="font-size: 0.9rem;">
                    Todos
                </a>

                {{-- Botones de Tipos --}}
                @foreach($tipos as $tipo)
                    {{-- Usamos array_merge para no perder la búsqueda de texto al cambiar de píldora --}}
                    <a href="{{ route('jobs.index', array_merge(request()->query(), ['type' => [$tipo]])) }}" 
                       class="badge rounded-pill px-4 py-2 text-decoration-none 
                       {{ $currentType == $tipo ? 'bg-primary text-white fw-bold' : 'bg-light text-dark border fw-medium' }}"
                       style="font-size: 0.9rem;">
                        {{ $tipo }}
                    </a>
                @endforeach
            </div>

            {{-- Dropdowns: Fecha, Ubicación, Modalidad --}}
            <div class="d-flex flex-wrap align-items-center gap-2 mt-2">
                
                {{-- Dropdown Modalidad --}}
                @php $currentModality = request('modality') ? request('modality')[0] : ''; @endphp
                <select name="modality[]" class="form-select form-select-sm text-secondary border shadow-sm" style="max-width: 200px;" onchange="this.form.submit()">
                    <option value="">Cualquier modalidad</option>
                    <option value="Presencial" {{ $currentModality == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                    <option value="Remoto" {{ $currentModality == 'Remoto' ? 'selected' : '' }}>Remoto</option>
                    <option value="Híbrido" {{ $currentModality == 'Híbrido' ? 'selected' : '' }}>Híbrido</option>
                </select>

                {{-- Dropdown Ubicación (Filtro por texto de tu controller) --}}
                <select name="location" class="form-select form-select-sm text-secondary border shadow-sm" style="max-width: 200px;" onchange="this.form.submit()">
                    <option value="">Todas las ubicaciones</option>
                    <option value="Mérida" {{ request('location') == 'Mérida' ? 'selected' : '' }}>Mérida</option>
                    <option value="Progreso" {{ request('location') == 'Progreso' ? 'selected' : '' }}>Progreso</option>
                    <option value="Remoto" {{ request('location') == 'Remoto' ? 'selected' : '' }}>Remoto</option>
                </select>

                {{-- Limpiar Filtros --}}
                @if(request()->anyFilled(['type', 'location', 'modality', 'search']))
                    <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-link text-danger text-decoration-none ms-2">Limpiar</a>
                @endif
            </div>
        </div>
    </form>

    {{-- 3. RESULTADOS (Renderizando el componente) --}}
    <div class="row">
        <div class="col-12">
            @forelse($jobs as $job)
              <x-job.card-job 
                    :id="$job->id"
                    :title="$job->title"
                    :company="$job->company"
                    :location="$job->location"
                    :salary="$job->salary"
                    :type="$job->type"
                    :description="$job->description"
                    :modality="$job->modality"
                    :posted_at="$job->posted_at"
                    :is_new="$job->is_new"
                    :urgent="$job->urgent"
                />
            @empty
                <div class="text-center py-5">
                    <i class="bi bi-briefcase text-muted opacity-50" style="font-size: 4rem;"></i>
                    <h4 class="mt-3 text-muted">Aún no hay vacantes con esos filtros.</h4>
                    <a href="{{ route('jobs.index') }}" class="btn btn-outline-primary mt-3">Quitar filtros</a>
                </div>
            @endforelse
        </div>
    </div>
    
</div>
@endsection