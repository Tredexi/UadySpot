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
                    <div class="card h-100 shadow-sm transition-transform 
                        {{ $event['id'] != 3 ? 'border-theme-'.$event['theme'] : '' }}">
                        
                        <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="card-img-top object-fit-cover" style="height: 180px;">

                        <div class="card-body d-flex flex-column p-3">
                            <h5 class="card-title fw-bold fs-6 mb-3 line-clamp-2">{{ $event['title'] }}</h5>

                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-light text-dark px-3 py-2 text-center rounded-3">
                                    <span class="d-block fw-bold fs-5 lh-1">{{ $event['date_day'] }}</span>
                                    <span class="d-block text-uppercase text-muted" style="font-size: 0.7rem; font-weight: 700;">{{ $event['date_month'] }}</span>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 text-secondary" style="font-size: 0.85rem;">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <i class="bi bi-geo-alt text-muted"></i>
                                        {{ $event['location'] }}
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-clock text-muted"></i>
                                        {{ $event['time'] }}
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mt-auto mb-3">
                                <div class="d-flex gap-1">
                                    @if(isset($event['category']))
                                        <span class="badge bg-light text-secondary border fw-normal">{{ $event['category'] }}</span>
                                    @endif
                                    @if(isset($event['tag_gallery']))
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle fw-medium">{{ $event['tag_gallery'] }}</span>
                                    @endif
                                </div>
                                
                                @if(isset($event['availability']))
                                    <div class="d-flex align-items-center gap-1" style="font-size: 0.8rem;">
                                        <i class="bi bi-circle-fill {{ $event['availability_status'] == 'open' ? 'text-success' : 'text-danger' }}" style="font-size: 0.5rem;"></i>
                                        <span class="text-secondary">{{ $event['availability'] }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-auto">
                                {{-- Formulario para agregar directamente al carrito --}}
                                <form action="{{ route('cart.add', $event['id']) }}" method="POST">
                                    @csrf
                                    
                                    @php
                                        // Lógica dinámica: Si el texto contiene "boleto" o "comprar", es estilo info (azul)
                                        // de lo contrario es el estilo estándar outline.
                                        $isTicket = str_contains(strtolower($event['action_text']), 'boleto');
                                        $buttonClass = $isTicket 
                                            ? 'btn-info text-white' 
                                            : 'btn-outline-dark';
                                    @endphp

                                    <button type="submit" class="btn {{ $buttonClass }} w-100 fw-bold py-2 rounded-3 border-2">
                                        @if($isTicket)
                                            <i class="bi bi-ticket-perforated me-1"></i>
                                        @endif
                                        {{ $event['action_text'] }}
                                    </button>
                                </form>

                                {{-- Enlace dinámico al detalle usando el ID del evento --}}
                                <div class="text-center mt-2">
                                    <a href="{{ route('events.show', $event['id']) }}" class="text-muted small text-decoration-none">
                                        Ver más detalles <i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection