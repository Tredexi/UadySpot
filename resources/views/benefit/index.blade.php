@extends('layout.app')
@section('titulo_pagina', 'Beneficios Exclusivos')

@section('content')
<div class="container my-5">

    {{-- 1. HERO SECTION (Banner Estilo Corporativo/Walmart) --}}
    <div class="bg-dark text-white rounded-4 p-5 mb-5 shadow-lg position-relative overflow-hidden">
        <div class="position-relative" style="z-index: 2;">
            <span class="badge bg-primary px-3 py-2 mb-3 rounded-pill fs-6">Uady Spot Rewards</span>
            <h1 class="display-4 fw-bolder mb-3">Tu credencial, <br>tu pase VIP.</h1>
            <p class="fs-5 mb-4 text-light opacity-75" style="max-width: 600px;">
                Descubre descuentos, promociones 2x1 y convenios exclusivos que tienes por ser parte de la comunidad universitaria.
            </p>
        </div>
        {{-- Patrón de fondo abstracto --}}
        <div class="position-absolute rounded-circle bg-white opacity-10" style="width: 300px; height: 300px; top: -100px; right: -50px; z-index: 1;"></div>
        <div class="position-absolute rounded-circle bg-primary opacity-25" style="width: 400px; height: 400px; bottom: -150px; right: 150px; z-index: 1;"></div>
    </div>

    {{-- 2. FILTROS DE CATEGORÍAS --}}
    <div class="d-flex flex-wrap align-items-center gap-2 mb-5 pb-3 border-bottom">
        <i class="bi bi-funnel-fill text-muted me-1"></i>
        <span class="fw-bold me-2 text-secondary">Explorar por:</span>
        
        @php
            // Extraemos las categorías únicas del arreglo dinámicamente
            $categorias = $beneficios->pluck('categoria')->unique()->sort();
            $catActual = request('categoria');
        @endphp

        <a href="{{ route('benefits.index') }}" class="btn rounded-pill px-4 fw-medium {{ !$catActual ? 'btn-primary shadow-sm' : 'btn-light border text-secondary' }}">
            Todos
        </a>

        @foreach($categorias as $cat)
            <a href="{{ route('benefits.index', ['categoria' => $cat]) }}" 
               class="btn rounded-pill px-4 fw-medium {{ $catActual == $cat ? 'btn-primary shadow-sm' : 'btn-light border text-secondary' }}">
                {{ $cat }}
            </a>
        @endforeach
    </div>

    {{-- 3. GRID DE COMPONENTES --}}
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        @forelse($beneficios as $beneficio)
            <div class="col">
                <x-benefit.card-benefit 
                    :id="$beneficio['id']"
                    :tipoBeneficio="$beneficio['tipo_beneficio']"
                    :valor="$beneficio['valor']"
                    :imagen="$beneficio['imagen']"
                    :alt="$beneficio['alt']"
                    :titulo="$beneficio['titulo']"
                    :subtitulo="$beneficio['subtitulo']"
                    :etiqueta="$beneficio['etiqueta']"
                    :proveedor="$beneficio['proveedor']"
                    :ubicacion="$beneficio['ubicacion']"
                    :fechaExpiracion="$beneficio['fecha_expiracion']"
                />
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-search text-muted mb-3 d-block" style="font-size: 3rem;"></i>
                <h4 class="text-muted">No encontramos beneficios en esta categoría.</h4>
                <a href="{{ route('benefits.index') }}" class="btn btn-outline-primary mt-2">Ver todos</a>
            </div>
        @endforelse
    </div>

</div>
{{-- Incluimos la vista del modal que acabamos de crear --}}
    @include('benefit.qr')

@endsection

{{-- Script para que el modal cambie dinámicamente --}}
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var qrModal = document.getElementById('qrModal');
        
        qrModal.addEventListener('show.bs.modal', function (event) {
            // 1. Detectar qué botón activó el modal
            var button = event.relatedTarget;
            
            // 2. Extraer la info de los atributos data-* que pusimos en el componente
            var id = button.getAttribute('data-id');
            var proveedor = button.getAttribute('data-proveedor');
            var titulo = button.getAttribute('data-titulo');
            
            // 3. Actualizar los textos dentro del modal
            document.getElementById('modalProveedor').textContent = proveedor;
            document.getElementById('modalTitulo').textContent = titulo;
            
            // 4. Generar el QR dinámico usando una API pública (usa el ID para que sea único)
            var qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=UADYSPOT-BENEFICIO-" + id;
            document.getElementById('modalQrImage').src = qrUrl;
        });
    });
</script>
@endsection