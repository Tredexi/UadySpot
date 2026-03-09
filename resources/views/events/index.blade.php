@extends('layout.app')
@section('titulo_pagina', 'Eventos')

@section('content')



    <div class="container bg-white rounded-4 shadow border p-4 my-5">

        <h1 class="fw-bold fs-3 mb-4">Encuentra tu próximo evento</h1>

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
            
            <div class="d-flex flex-wrap align-items-center gap-2">
                @php
                    $tags = ['Talleres', 'Conferencias', 'Conciertos', 'Deportes', 'Exposiciones', 'Comunidad'];
                @endphp
                @foreach($tags as $tag)
                    <span class="badge rounded-pill px-3 py-2 
                        {{ $tag == 'Conciertos' ? 'bg-active-tag fw-bold' : 'bg-light text-dark border fw-medium' }}" 
                        style="cursor: pointer; font-size: 0.85rem;">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>

            <div class="d-flex align-items-center gap-2">
                <select class="form-select form-select-sm text-secondary" style="width: auto;">
                    <option>Fecha (Este mes)</option>
                    <option>La próxima semana</option>
                </select>
                <select class="form-select form-select-sm text-secondary" style="width: auto;">
                    <option>Ubicación (Facultad de Derecho)</option>
                    <option>Campus Central</option>
                </select>
                <select class="form-select form-select-sm text-secondary" style="width: auto;">
                    <option>Tipo (Suscripción vs. Gratis)</option>
                </select>
            </div>
        </div>

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

                            @if($event['id'] == 3)
                                <a href="#" class="btn btn-info w-100 fw-bold text-white py-2 rounded-3" style="background-color: #0ea5e9; border-color: #0ea5e9;">
                                    {{ $event['action_text'] }}
                                </a>
                            @else
                                <a href="#" class="btn btn-outline-dark w-100 fw-bold border-2 py-2 rounded-3">
                                    {{ $event['action_text'] }}
                                </a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection