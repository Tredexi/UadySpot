@extends('layout.app')
@section('titulo_pagina', 'Detalle del Evento')

@section('content')
<div class="container py-5">
    
    {{-- 1. BOTÓN DE REGRESO --}}
    <div class="mb-4">
        <a href="{{ route('events.index') }}" class="btn btn-light border shadow-sm rounded-pill px-4 text-secondary fw-medium">
            <i class="bi bi-arrow-left me-2"></i> Volver a Eventos
        </a>
    </div>

    <div class="row g-5">
        {{-- 2. COLUMNA PRINCIPAL (Izquierda: Imagen y Descripción) --}}
        <div class="col-lg-8">
            
            {{-- Imagen Hero --}}
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5">
                <img src="{{ asset($event->imagen) }}" alt="{{ $event->titulo }}" class="w-100 object-fit-cover" style="max-height: 450px;">
            </div>

            {{-- Contenido del Evento --}}
            <div class="mb-4">
                <span class="badge bg-primary px-3 py-2 rounded-pill mb-3 fs-6">{{ $event->categoria ?? 'Evento' }}</span>
                <h1 class="fw-bolder text-uppercase mb-3" style="color: var(--uady-blue, #002E5F); font-size: 2.5rem;">
                    {{ $event->titulo }}
                </h1>
                
                <hr class="my-4">

                <h4 class="fw-bold mb-3">Acerca de este evento</h4>
                <p class="text-muted fs-5 mb-4">
                    No te pierdas de este gran evento de la comunidad en <strong>{{ $event->ubicacion }}</strong>. 
                    Prepara tu agenda en Mérida para el próximo {{ $event->dia_texto }} de {{ strtolower                ($event->mes_texto) }}.
                </p>

                {{-- AQUÍ PONEMOS LA DESCRIPCIÓN DE LA BASE DE DATOS --}}
                <p class="text-secondary" style="line-height: 1.8;">
                    {{ $event->descripcion }}
                </p>
            </div>
        </div>

        {{-- 3. COLUMNA LATERAL (Derecha: Tarjeta de Compra Flotante) --}}
        <div class="col-lg-4">
            <div class="card shadow-lg border-0 rounded-4 sticky-top" style="top: 2rem;">
                <div class="card-body p-4 p-lg-5">
                    
                    {{-- Precio --}}
                    <div class="text-center mb-4 pb-4 border-bottom">
                        <h2 class="fw-bolder mb-0 text-dark" style="font-size: 2.5rem;">
                            @if($event->precio > 0)
                                ${{ number_format($event->precio, 2) }} <span class="fs-6 text-muted fw-normal">MXN</span>
                            @else
                                Gratis
                            @endif
                        </h2>
                    </div>

                    {{-- Lista de Detalles (Iconos) --}}
                    <div class="d-flex flex-column gap-4 mb-5">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px;">
                                <i class="bi bi-calendar-event text-primary fs-4"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-bold fs-5">{{ $event->dia_texto }} de {{ $event->mes_texto }}</p>
                                <small class="text-muted text-uppercase">{{ $event->fecha_calendario }}</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px;">
                                <i class="bi bi-clock text-primary fs-4"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-bold fs-5">{{ $event->hora }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px;">
                                <i class="bi bi-geo-alt text-primary fs-4"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-bold fs-6">{{ $event->ubicacion }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Alerta de Disponibilidad --}}
                    @if($event->disponibilidad)
                        <div class="alert {{ $event->disponibilidad_status == 'open' ? 'alert-success' : 'alert-danger' }} rounded-3 mb-4 border-0 shadow-sm">
                            <i class="bi {{ $event->disponibilidad_status == 'open' ? 'bi-check-circle-fill' : 'bi-x-circle-fill' }} me-2"></i>
                            <strong>{{ $event->disponibilidad }}</strong>
                        </div>
                    @endif

                    {{-- Botón Principal de Acción --}}
                    <form action="{{ route('cart.add', $event->id) }}" method="POST">
                        @csrf
                        @php
                            $isTicket = str_contains(strtolower($event->texto_accion), 'boleto');
                            $btnClass = $isTicket ? 'btn-info text-white' : 'btn-dark';
                        @endphp
                        
                        <button type="submit" 
                                class="btn {{ $btnClass }} w-100 py-3 rounded-pill fw-bold fs-5 shadow" 
                                {{ $event->disponibilidad_status == 'closed' ? 'disabled' : '' }}>
                            
                            @if($isTicket)
                                <i class="bi bi-ticket-perforated me-2"></i>
                            @endif
                            
                            {{ $event->texto_accion }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection