@extends('layout.app')

@section('titulo_pagina', 'Inicio')

@section('content')

{{ Auth::check() ? 'LOGUEADO' : 'NO LOGUEADO' }}
    <div id="mainHeroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="10000">

    <div class="carousel-inner">

        <!-- SLIDE 1 -->
        <div class="carousel-item active">
        <img src="/imagenes/Carrusel/Filey2026-slide.png" class="d-block w-100 hero-img" alt="Filey">
        <div class="carousel-caption custom-caption">
            <span class="hero-tag">Evento Destacado</span>
            <h1 class="hero-title">FILEY 2026</h1>
            <a href="{{ route('events.index') }}" class="hero-button">Ver evento</a>
        </div>
        </div>

        <!-- SLIDE 2 -->
        <div class="carousel-item">
        <img src="/imagenes/Carrusel/BolsaDeTrabajo-slide.png" class="d-block w-100 hero-img" alt="Feria">
        <div class="carousel-caption custom-caption">
            <span class="hero-tag">Trabajo</span>
            <h1 class="hero-title">BOLSA DE TRABAJO UADY</h1>
            <a href="{{ route('jobs.index') }}" class="hero-button">Explorar</a>
        </div>
        </div>

        <!-- SLIDE 3 -->
        <div class="carousel-item">
        <img src="/imagenes/Carrusel/FeriaProfesiones-slide.jpg" class="d-block w-100 hero-img" alt="Feria">
        <div class="carousel-caption custom-caption">
            <span class="hero-tag">Académico</span>
            <h1 class="hero-title">Feria Universitaria 2026</h1>
            <a href="{{ route('events.index') }}" class="hero-button">Ver evento</a>
        </div>
        </div>

    </div>

    <div class="carousel-progress">
        <div class="carousel-progress-bar"></div>
    </div>

    <button class="custom-carousel-btn prev" type="button" data-bs-target="#mainHeroCarousel" data-bs-slide="prev">
        <i class="bi bi-chevron-left"></i>
    </button>

    <button class="custom-carousel-btn next" type="button" data-bs-target="#mainHeroCarousel" data-bs-slide="next">
        <i class="bi bi-chevron-right"></i>
    </button>

    </div>



    <script>
    document.addEventListener("DOMContentLoaded", function () {

        const carousel = document.querySelector("#mainHeroCarousel");
        const progressBar = document.querySelector(".carousel-progress-bar");

        const slideInterval = 10000; // 10 segundos

        function startProgressBar() {
            progressBar.style.transition = "none";
            progressBar.style.width = "0%";

            setTimeout(() => {
                progressBar.style.transition = `width ${slideInterval}ms linear`;
                progressBar.style.width = "100%";
            }, 50);
        }

        carousel.addEventListener("slide.bs.carousel", function () {
            startProgressBar();
        });

        startProgressBar();
    });
    </script>



    <div class="categories-container" >
        <div class="category-item" onclick="window.location='{{ route('benefits.index') }}'">
            ✨
            <span>Beneficios</span>
        </div>
        <div class="category-item" onclick="window.location='{{ route('events.index') }}'">
            🎉
            <span>Eventos</span>
        </div>

        <div class="category-item">
            📰
            <span>Noticias</span>
        </div>

        <div class="category-item" onclick="window.location='{{ route('jobs.index') }}'">
            💼
            <span>Trabajo</span>
        </div>

        <div class="category-item">
            🤝
            <span>Comunidad</span>
        </div>

        <div class="category-item" onclick="window.location='{{ route('calendario') }}'">
            🗓️
            <span>Social</span>
        </div>



    </div>


<section class="events-section">

    <div class="events-header">
        <h2>Próximos Eventos UADY</h2>

        <div class="events-filter">
            <label for="eventCategory" class="filter-label">Filtrar por:</label>
            <select id="eventCategory" class="campus-select">
                <option value="all">Todos los eventos</option>
                <option value="Academicos">Académicos</option>
                <option value="Culturales">Culturales</option>
                <option value="Deportivos">Deportivos</option>
                <option value="Cientificos">Científicos</option>
                <option value="Sociales">Sociales</option>
                <option value="Institucionales">Institucionales</option>
            </select>
        </div>
    </div>

    <div class="events-grid">
        @foreach($eventos as $evento)
            <x-inicio.card-evento 
                :id="$evento->id"
                :titulo="$evento->titulo" 
                :imagen="$evento->imagen"
                :campus="$evento->campus"
                :fechaI="$evento->dia_texto" 
                :mes="$evento->mes_texto"
                :precio="$evento->precio"
            />
        @endforeach
    </div>
</section>

<section class="events-section">
    </section>

<section class="benefits-section">

    <div class="benefits-header">
        <h2>Beneficios exclusivos Uady Spot</h2>
        <p>Descuentos y convenios solo por pertenecer a la comunidad</p>
    </div>

    <div class="benefits-slider">
        @foreach ($beneficios as $beneficio)
        <x-inicio.card-beneficio 
            :id="$beneficio->id"
            :descuento="$beneficio->valor . ' ' . $beneficio->type->nombre"
            :imagen="$beneficio->imagen"
            :alt="$beneficio->alt"
            :titulo="$beneficio->titulo"
            :subtitulo="$beneficio->subtitulo"
            :etiqueta="$beneficio->etiqueta"
        />
    @endforeach
    </div>

</section>

</section>
        <section class="jobs-section">
        <div class="jobs-header">
            <span class="jobs-tag">EXCLUSIVO UADY SPOT</span>
            <h2>Bolsa de Trabajo & Convenios</h2>
            <p>Accede a vacantes, prácticas y beneficios con empresas aliadas</p>
        </div>

        <div class="jobs-cards">
            <div class="job-card oracle">
                <img src="/imagenes/logos/LogoOracle.png" alt="Oracle">
                <h3>Oracle</h3>
                <p>Prácticas profesionales & empleos junior</p>
                <span class="job-badge">Vacantes exclusivas</span>
            </div>

            <div class="job-card starbucks">
                <img src="/imagenes/logos/LogoStarbucks.png" alt="Starbucks">
                <h3>Starbucks</h3>
                <p>Horarios flexibles para estudiantes</p>
                <span class="job-badge">Beneficios UADY</span>
            </div>

            <div class="job-card homedepot">
                <img src="/imagenes/logos/LogoHomeDepot.png" alt="Home Depot">
                <h3>Home Depot</h3>
                <p>Programas de desarrollo y empleo</p>
                <span class="job-badge">Convenio activo</span>
            </div>

            <div class="job-card sams">
                <img src="/imagenes/logos/LogoSams.png" alt="Sams Club">
                <h3>Sam's Club</h3>
                <p>Empleo medio turno + descuentos</p>
                <span class="job-badge">Alta demanda</span>
            </div>
        </div>

        <div class="jobs-cta">
            <a href="{{ route('jobs.index') }}" class="jobs-button">
                Acceder a ofertas exclusivas
            </a>
        </div>
    </section>



    <div class="benefits-cta">
        <h3>Desbloquea todos los beneficios UADY Spot</h3>
        <p>Eventos, descuentos, vacantes y convenios solo para estudiantes registrados</p>
        <a href="/registro" class="cta-button">Únete ahora</a>
    </div>
@endsection