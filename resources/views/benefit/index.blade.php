@extends('layout.app')
@section('titulo_pagina', 'Beneficios Exclusivos')

@section('content')
<div class="container my-5">

    {{-- HERO SECTION --}}
    <div class="bg-dark text-white rounded-4 p-5 mb-5 shadow-lg position-relative overflow-hidden">
        <div class="position-relative" style="z-index: 2;">
            <span class="badge bg-primary px-3 py-2 mb-3 rounded-pill fs-6">Uady Spot Rewards</span>
            <h1 class="display-4 fw-bolder mb-3">Tu credencial, <br>tu pase VIP.</h1>
            <p class="fs-5 mb-4 text-light opacity-75" style="max-width: 600px;">
                Descubre descuentos, promociones 2x1 y convenios exclusivos que tienes por ser parte de la comunidad universitaria.
            </p>
        </div>

        <div class="position-absolute rounded-circle bg-white opacity-10"
            style="width: 300px; height: 300px; top: -100px; right: -50px; z-index: 1;">
        </div>

        <div class="position-absolute rounded-circle bg-primary opacity-25"
            style="width: 400px; height: 400px; bottom: -150px; right: 150px; z-index: 1;">
        </div>
    </div>

    {{-- FILTROS DE CATEGORÍAS --}}
    <div class="d-flex flex-wrap align-items-center gap-2 mb-5 pb-3 border-bottom">

        <i class="bi bi-funnel-fill text-muted me-1"></i>

        <span class="fw-bold me-2 text-secondary">
            Explorar por:
        </span>
        
        @php
            $catActual = request('categoria');
            $categoriasUnicas = \App\Models\BenefitCategory::orderBy('nombre')->get();
        @endphp

        <a href="{{ route('benefits.index') }}"
           class="btn rounded-pill px-4 fw-medium {{ !$catActual ? 'btn-primary shadow-sm' : 'btn-light border text-secondary' }}">
            Todos
        </a>

        @foreach($categoriasUnicas as $cat)
            <a href="{{ route('benefits.index', ['categoria' => $cat->nombre]) }}" 
               class="btn rounded-pill px-4 fw-medium {{ $catActual == $cat->nombre ? 'btn-primary shadow-sm' : 'btn-light border text-secondary' }}">
                {{ $cat->nombre }}
            </a>
        @endforeach
    </div>

    {{-- GRID DE COMPONENTES --}}
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">

        @forelse($beneficios as $beneficio)

            <div class="col">
                <x-benefit.card-benefit 
                    :id="$beneficio->id"
                    :tipoBeneficio="$beneficio->type->nombre"
                    :valor="$beneficio->valor"
                    :imagen="$beneficio->imagen"
                    :alt="$beneficio->alt"
                    :titulo="$beneficio->titulo"
                    :subtitulo="$beneficio->subtitulo"
                    :etiqueta="$beneficio->etiqueta"
                    :proveedor="$beneficio->proveedor"
                    :ubicacion="$beneficio->ubicacion"
                    :fechaExpiracion="$beneficio->fecha_expiracion"
                />
            </div>

        @empty

            <div class="col-12 text-center py-5">

                <i class="bi bi-search text-muted mb-3 d-block"
                   style="font-size: 3rem;">
                </i>

                <h4 class="text-muted">
                    No encontramos beneficios en esta categoría.
                </h4>

                <a href="{{ route('benefits.index') }}"
                   class="btn btn-outline-primary mt-2">
                    Ver todos
                </a>

            </div>

        @endforelse

    </div>

    {{-- PAGINACIÓN --}}
    <div class="d-flex justify-content-center mt-5">
        {{ $beneficios->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>

</div>

@include('benefit.qr')

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        var qrModal = document.getElementById('qrModal');

        if (qrModal) {

            qrModal.addEventListener('show.bs.modal', function (event) {

                var button = event.relatedTarget;

                // Extraer info de los data-attributes
                var id = button.getAttribute('data-id');
                var proveedor = button.getAttribute('data-proveedor');
                var titulo = button.getAttribute('data-titulo');

                // Depuración
                console.log(
                    "ID:",
                    id,
                    "Proveedor:",
                    proveedor,
                    "Título:",
                    titulo
                );

                var elProveedor =
                    document.getElementById('modalProveedor');

                var elTitulo =
                    document.getElementById('modalTitulo');

                var elImagen =
                    document.getElementById('modalQrImage');

                if(elProveedor)
                    elProveedor.innerText = proveedor;

                if(elTitulo)
                    elTitulo.innerText = titulo;
                
                if(elImagen) {

                    var qrUrl =
                        "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=UADYSPOT-VAL-" + id;

                    elImagen.src = qrUrl;
                }

            });

        }

    });
</script>
@endsection