@extends('layout.app')

@section('titulo_pagina', 'Inicio - Uady Spot')

@section('content')

    <div id="uadyCarousel" class="carousel slide mb-5 shadow-lg" data-bs-ride="carousel" style="border-radius: 20px; overflow: hidden;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#uadyCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#uadyCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#uadyCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#uadyCarousel" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#uadyCarousel" data-bs-slide-to="4"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="{{ asset('Imagenes/slide1.jpg') }}" class="d-block w-100" style="height: 450px; object-fit: cover;">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="{{ asset('Imagenes/slide2.jpg') }}" class="d-block w-100" style="height: 450px; object-fit: cover;">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="{{ asset('Imagenes/slide3.jpg') }}" class="d-block w-100" style="height: 450px; object-fit: cover;">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="{{ asset('Imagenes/slide4.jpg') }}" class="d-block w-100" style="height: 450px; object-fit: cover;">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="{{ asset('Imagenes/slide5.jpg') }}" class="d-block w-100" style="height: 450px; object-fit: cover;">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#uadyCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#uadyCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <h3 class="fw-bold mb-4">Noticias Recientes</h3>
    <div class="row mb-5">
        @foreach($noticias as $n)
        <div class="col-md-6 mb-3">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                <img src="{{ asset('Imagenes/' . $n['img']) }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="fw-bold">{{ $n['titulo'] }}</h5>
                    <p class="text-muted small">{{ $n['desc'] }}</p>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-3">Ver más</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h3 class="fw-bold mb-4">Próximos Eventos</h3>
    <div class="row">
        @foreach($eventos_venta as $ev)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 border-0 shadow text-center p-2" style="border-radius: 15px;">
                <img src="{{ asset('Imagenes/' . $ev['img']) }}" class="card-img-top rounded shadow-sm" style="height: 180px; object-fit: cover;">
                <div class="card-body px-1">
                    <h6 class="fw-bold mb-1">{{ $ev['titulo'] }}</h6>
                    <p class="text-success fw-bold mb-3">{{ $ev['precio'] }}</p>
                    <button class="btn btn-warning w-100 fw-bold rounded-pill" style="background-color: var(--uady-gold); border: none;">
                        <i class="bi bi-cart-fill me-1"></i> Comprar
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection