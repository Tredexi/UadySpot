@extends('layout.app')
@section('titulo_pagina', 'Comunidad')

@section('content')
<div class="container d-flex justify-content-center" style="margin-top: 2rem; margin-bottom: 5rem;">

    {{-- Paso 1: El Script de Meta (Obligatorio) --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v19.0"></script>

    <div class="w-100" style="max-width: 600px;">
        <h4 class="fw-bold mb-4 social-title" style="color: var(--uady-blue);">Publicaciones Oficiales</h4>
        
        {{-- Paso 2: El contenedor mágico de Facebook --}}
        {{-- Aquí le pones la URL de la página pública que quieres mostrar --}}
        <div class="fb-page w-150 bg-white shadow-sm" 
            data-href="https://www.facebook.com/face.uady" 
            data-tabs="timeline" 
            data-width="800" 
            data-height="800" 
            data-small-header="false" 
            data-adapt-container-width="true" 
            data-hide-cover="false" 
            data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/UADYOficial" class="fb-xfbml-parse-ignore">
                <a href="https://www.facebook.com/UADYOficial">UADY</a>
            </blockquote>
        </div>
    </div>

</div>
@endsection