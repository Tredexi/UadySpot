@extends('layout.app')

@section('titulo_pagina', 'Eventos')

@section('content')
<div class="container py-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Encuentra tu próximo evento</h2>
        
        <form action="{{ route('events.index') }}" method="GET" class="d-flex" style="max-width: 400px;">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar evento..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-5">
        
        {{-- Botones de Categorías --}}
        <div class="d-flex flex-wrap gap-2">
            @php $cats = ['Todos', 'Talleres', 'Conferencias', 'Conciertos', 'Deportes', 'Exposiciones', 'Comunidad']; @endphp
            @foreach($cats as $cat)
                <a href="{{ route('events.index', ['category' => $cat == 'Todos' ? '' : $cat]) }}" 
                   class="btn {{ (request('category') == $cat || (request('category') == '' && $cat == 'Todos')) ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-4">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        {{-- Selects de Filtrado --}}
        <div class="d-flex gap-2">
            <select class="form-select w-auto">
                <option>Cualquier fecha</option>
            </select>
            <select class="form-select w-auto">
                <option>Todas las ubicaciones</option>
            </select>
            <select class="form-select w-auto">
                <option>Tipo (Todos)</option>
            </select>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($events as $event)
            <div class="col">
                <x-event.card-event 
                    :id="$event->id"
                    :image="$event->imagen"
                    :title="$event->titulo"
                    :dateDay="$event->dia_texto"
                    :dateMonth="$event->mes_texto"
                    :location="$event->ubicacion"
                    :time="$event->hora"
                    :category="$event->categoria"
                    :availability="$event->disponibilidad"
                    :availabilityStatus="$event->disponibilidad_status"
                    :actionText="$event->texto_accion"
                    :price="$event->precio"
                />
            </div>
        @endforeach
    </div>

    @if($events->isEmpty())
        <div class="text-center py-5">
            <p class="text-muted">No se encontraron eventos con esos filtros.</p>
        </div>
    @endif

</div>
@endsection