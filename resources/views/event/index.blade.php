@extends('layout.app')
@section('titulo_pagina', 'Eventos')

@section('content')



    <div class="container bg-white rounded-4 shadow border p-4 my-5">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            <h1 class="fw-bold fs-3 mb-0">Encuentra tu próximo evento</h1>
            
            <div class="input-group" style="max-width: 300px;">
                <input type="text" name="search" form="filterForm" class="form-control" placeholder="Buscar evento..." value="{{ request('search') }}">
                <button type="submit" form="filterForm" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>

        <form action="{{ route('events.index') }}" method="GET" id="filterForm">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                    
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        @php
                            $tags = ['Talleres', 'Conferencias', 'Conciertos', 'Deportes', 'Exposiciones', 'Comunidad'];
                            $currentCat = request('category');
                        @endphp
                        
                        <a href="{{ route('events.index') }}" class="badge rounded-pill px-3 py-2 text-decoration-none {{ !$currentCat ? 'bg-primary text-white' : 'bg-light text-dark border' }}">
                            Todos
                        </a>

                        @foreach($tags as $tag)
                            <a href="{{ route('events.index', ['category' => $tag]) }}" 
                            class="badge rounded-pill px-3 py-2 text-decoration-none 
                                {{ $currentCat == $tag ? 'bg-primary text-white fw-bold' : 'bg-light text-dark border fw-medium' }}">
                                {{ $tag }}
                            </a>
                        @endforeach
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <select name="date_range" class="form-select form-select-sm text-secondary" onchange="this.form.submit()">
                            <option value="">Cualquier fecha</option>
                            <option value="this_month" {{ request('date_range') == 'this_month' ? 'selected' : '' }}>Este mes</option>
                        </select>

                        <select name="location" class="form-select form-select-sm text-secondary" onchange="this.form.submit()">
                            <option value="">Todas las ubicaciones</option>
                            <option value="Ingeniería" {{ request('location') == 'Ingeniería' ? 'selected' : '' }}>Fac. de Ingeniería</option>
                            <option value="Derecho" {{ request('location') == 'Derecho' ? 'selected' : '' }}>Fac. de Derecho</option>
                            <option value="Central" {{ request('location') == 'Central' ? 'selected' : '' }}>Campus/Edificio Central</option>
                        </select>

                        <select name="status" class="form-select form-select-sm text-secondary" onchange="this.form.submit()">
                            <option value="">Tipo (Todos)</option>
                            <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Inscripción Abierta</option>
                            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Cerrado / Finalizado</option>
                        </select>
                        
                        @if(request()->anyFilled(['category', 'location', 'status', 'date_range']))
                            <a href="{{ route('events.index') }}" class="btn btn-sm btn-link text-danger">Limpiar</a>
                        @endif
                    </div>
                </div>
            </form>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($events as $event)
                <div class="col">
                    {{-- Llamada al componente, pasando los datos de $event como props --}}
                    <x-event.card-event 
                        :id="$event['id']"
                        :image="$event['image']"
                        :title="$event['title']"
                        :dateDay="$event['date_day']"
                        :dateMonth="$event['date_month']"
                        :location="$event['location']"
                        :time="$event['time']"
                        :category="$event['category'] ?? null"
                        :availability="$event['availability'] ?? null"
                        :availabilityStatus="$event['availability_status'] ?? null"
                        :actionText="$event['action_text']"
                        :price="$event['price'] ?? null"
                    />
                </div>
            @endforeach
        </div>

    </div>
@endsection