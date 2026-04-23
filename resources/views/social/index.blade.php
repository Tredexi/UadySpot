@extends('layout.app')

@section('titulo_pagina', 'Comunidad')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/social.css') }}">
@endsection

@section('content')

<div class="container py-4">

    <h3 class="fw-bold mb-4 social-title text-center">
        Comunidad UADY
    </h3>

    {{-- NAV TABS --}}
    <ul class="nav nav-pills mb-4 social-tabs justify-content-center">

        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#facebook">
                <i class="bi bi-facebook"></i> Facebook
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#instagram">
                <i class="bi bi-instagram"></i> Instagram
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#youtube">
                <i class="bi bi-youtube"></i> YouTube
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tiktok">
                <i class="bi bi-tiktok"></i> TikTok
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#twitter">
                <i class="bi bi-twitter-x"></i> X
            </button>
        </li>

    </ul>

    {{-- CONTENIDO --}}
    <div class="tab-content">

        {{-- FACEBOOK --}}
        <div class="tab-pane fade show active" id="facebook">
            <div class="social-card text-center">

                <div id="fb-root"></div>

                <div class="fb-page"
                    data-href="https://www.facebook.com/face.uady/"
                    data-tabs="timeline"
                    data-width="500"
                    data-height="500"
                    data-adapt-container-width="true">
                </div>

            </div>
        </div>

        {{-- INSTAGRAM --}}
        <div class="tab-pane fade" id="instagram">
            <div class="social-card text-center">

                <i class="bi bi-instagram text-danger mb-3"></i>

                <h5>@uady_institucional</h5>

                <p class="text-muted">Contenido oficial en Instagram</p>

                <a href="https://www.instagram.com/uady_institucional/"
                   target="_blank"
                   class="btn btn-dark">
                    Ver en Instagram
                </a>

            </div>
        </div>

        {{-- YOUTUBE --}}
        <div class="tab-pane fade" id="youtube">
            <div class="social-card text-center">

                <i class="bi bi-youtube text-danger mb-3"></i>

                <h5>UADY Institucional</h5>

                <p class="text-muted">Videos oficiales de la universidad</p>

                <a href="https://www.youtube.com/@UADYInstitucional"
                   target="_blank"
                   class="btn btn-danger">
                    Ver en YouTube
                </a>

            </div>
        </div>

        {{-- TIKTOK --}}
        <div class="tab-pane fade" id="tiktok">
            <div class="social-card text-center">

                <i class="bi bi-tiktok mb-3"></i>

                <h5>@uadyinstitucional</h5>

                <p class="text-muted">Contenido oficial en TikTok</p>

                <a href="https://www.tiktok.com/@uadyinstitucional"
                   target="_blank"
                   class="btn btn-dark">
                    Ir a TikTok
                </a>

            </div>
        </div>

        {{-- X --}}
        <div class="tab-pane fade" id="twitter">
            <div class="social-card text-center">

                <i class="bi bi-twitter-x mb-3"></i>

                <h5>@UADYoficial</h5>

                <p class="text-muted">Noticias y anuncios oficiales</p>

                <a href="https://x.com/UADYoficial"
                   target="_blank"
                   class="btn btn-dark">
                    Ver en X
                </a>

            </div>
        </div>

    </div>

</div>

{{-- FACEBOOK SDK --}}
<script async defer crossorigin="anonymous"
src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v19.0"></script>

@endsection