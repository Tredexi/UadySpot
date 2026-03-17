@extends('layout.app')
@section('titulo_pagina', 'Eventos')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 2rem;">

    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body d-flex align-items-center gap-3">
            <div class="bg-secondary rounded-circle" style="width: 40px; height: 40px;"></div>
            <input type="text" class="form-control rounded-pill bg-light border-0" placeholder="¿Qué estás pensando, estudiante de LATI?">
        </div>
    </div>

    @foreach($publicaciones as $post)
    <div class="card shadow-sm mb-4 border-0">
        
        <div class="card-body d-flex align-items-center gap-3 pb-2">
            <img src="{{ $post['avatar'] }}" alt="Avatar" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
            <div class="lh-sm">
                <h6 class="mb-0 fw-bold">{{ $post['autor_nombre'] }}</h6>
                <small class="text-muted" style="font-size: 0.8rem;">
                    {{ $post['autor_rol'] }} • {{ $post['tiempo'] }}
                </small>
            </div>
        </div>

        <div class="card-body pt-0 pb-2 text-dark">
            {{ $post['texto'] }}
        </div>

        @if($post['imagen'])
            <img src="{{ $post['imagen'] }}" class="card-img-top rounded-0 w-100" alt="Imagen de publicación" style="max-height: 500px; object-fit: cover;">
        @endif

        <div class="card-body py-2 border-bottom text-muted d-flex justify-content-between" style="font-size: 0.85rem;">
            <span>👍 {{ $post['likes'] }} Me gusta</span>
            <span>{{ $post['comentarios'] }} Comentarios</span>
        </div>

        <div class="card-body py-1 d-flex">
            <button class="btn btn-light flex-fill text-muted fw-semibold rounded-0 d-flex justify-content-center align-items-center gap-2">
                👍 Me gusta
            </button>
            <button class="btn btn-light flex-fill text-muted fw-semibold rounded-0 d-flex justify-content-center align-items-center gap-2">
                💬 Comentar
            </button>
        </div>

    </div>
    @endforeach

</div>
@endsection