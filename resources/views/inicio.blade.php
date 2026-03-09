@extends('layout.app')

@section('titulo_pagina', 'Inicio')

@section('content')


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



    <div class="categories-container">

        <div class="category-item" onclick="window.location='{{ route('events.index') }}'">
            🎉
            <span>Eventos</span>
        </div>

        <div class="category-item">
            📰
            <span>Noticias</span>
        </div>

        <div class="category-item">
            ✨
            <span>Beneficios</span>
        </div>

        <div class="category-item" onclick="window.location='{{ route('jobs.index') }}'">
            💼
            <span>Trabajo</span>
        </div>

        <div class="category-item">
            🤝
            <span>Comunidad</span>
        </div>

        <div class="category-item" onclick="window.location='{{ route('careers.index') }}'">
            🎓
            <span>Carreras</span>
        </div>

        <div class="category-item" onclick="window.location='{{ route('calendario') }}'">
            🗓️
            <span>Calendario</span>
        </div>

        <div class="category-item" onclick="window.location='{{ route('nosotros') }}'">
            📣
            <span>Nosotros</span>
        </div>

    </div>



<!-- EVENTOS -->
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
            <!-- EVENT CARD-->
            <x-inicio.card-evento campus="Culturales">
                <x-slot name="imagen">
                    <img src="imagenes/ProxEventos/filey2026.png" alt="evento">
                </x-slot>
                <x-slot name="etiqueta">
                    Recien agregado
                </x-slot>
                <x-slot name="titulo">
                    Filey 2026
                </x-slot>
                <x-slot name="fechaI">
                    14
                </x-slot>
                <x-slot name="fechaF">
                    22
                </x-slot>
                <x-slot name="mes">
                    Marzo
                </x-slot>
                <x-slot name="anio">
                    2026
                </x-slot>
                <x-slot name="costo">
                    Entrada gratiuta
                </x-slot>
            </x-inicio.card-evento>


            <x-inicio.card-evento campus="Academicos">
                <x-slot name="imagen">
                    <img src="/imagenes/ProxEventos/FeriaProfesiones.png" alt="evento">
                </x-slot>
                <x-slot name="etiqueta">
                    
                </x-slot>
                <x-slot name="titulo">
                    Feria Universitaria de Profesiones 2026
                </x-slot>
                <x-slot name="fechaI">
                    7
                </x-slot>
                <x-slot name="fechaF">
                    12
                </x-slot>
                <x-slot name="mes">
                    Marzo
                </x-slot>
                <x-slot name="anio">
                    2026
                </x-slot>
                <x-slot name="costo">
                    Entrada gratiuta
                </x-slot>
            </x-inicio.card-evento>


            <x-inicio.card-evento campus="Deportivos">
                <x-slot name="imagen">
                    <img src="/imagenes/ProxEventos/CarreraUady.png" alt="evento">
                </x-slot>
                <x-slot name="etiqueta">
                    
                </x-slot>
                <x-slot name="titulo">
                    Carrera UADY
                </x-slot>
                <x-slot name="fechaI">
                    1
                </x-slot>
                <x-slot name="fechaF">
                    
                </x-slot>
                <x-slot name="mes">
                    Marzo
                </x-slot>
                <x-slot name="anio">
                    2026
                </x-slot>
                <x-slot name="costo">
                    $50 MXN
                </x-slot>
            </x-inicio.card-evento>


            <x-inicio.card-evento campus="Culturales">
                <x-slot name="imagen">
                    <img src="/imagenes/ProxEventos/Beatles.png" alt="evento">
                </x-slot>
                <x-slot name="etiqueta">
                    
                </x-slot>
                <x-slot name="titulo">
                    Tributo a The Beatles
                </x-slot>
                <x-slot name="fechaI">
                    6
                </x-slot>
                <x-slot name="fechaF">
                    
                </x-slot>
                <x-slot name="mes">
                    Abril
                </x-slot>
                <x-slot name="anio">
                    2026
                </x-slot>
                <x-slot name="costo">
                    $200 MXN
                </x-slot>
            </x-inicio.card-evento>
            <!-- BASE
            <x-inicio.card-evento campus="">
                <x-slot name="imagen">
                    <img src="" alt="evento">
                </x-slot>
                <x-slot name="etiqueta">
                    
                </x-slot>
                <x-slot name="titulo">
                    
                </x-slot>
                <x-slot name="fechaI">
                    
                </x-slot>
                <x-slot name="fechaF">
                    
                </x-slot>
                <x-slot name="mes">
                    
                </x-slot>
                <x-slot name="anio">
                    
                </x-slot>
                <x-slot name="costo">
                    
                </x-slot>
            </x-inicio.card-evento>
        -->
        </div>
    </section>



<section class="benefits-section">

        <div class="benefits-header">
            <h2>Beneficios exclusivos Uady Spot</h2>
            <p>Descuentos y convenios solo por pertenecer a la comunidad</p>
        </div>

        <div class="benefits-slider">

            <div class="benefit-card">
                <span class="discount-badge">-25%</span>
                <img src="/imagenes/BeneficiosExclusivos/Gym.png" alt="Gym">
                <div class="benefit-content">
                    <h3>Gym Universitario</h3>
                    <p>Entrena con descuento exclusivo</p>
                    <span class="benefit-only">Solo Uady Spot</span>
                </div>
            </div>

            <div class="benefit-card">
                <span class="discount-badge">-15%</span>
                <img src="/imagenes/BeneficiosExclusivos/BlackBarberia.png" alt="Barber">
                <div class="benefit-content">
                    <h3>Barbería Black</h3>
                    <p>Corte premium con descuento</p>
                    <span class="benefit-only">Convenio activo</span>
                </div>
            </div>

            <div class="benefit-card">
                <span class="discount-badge">2x1</span>
                <img src="/imagenes/BeneficiosExclusivos/ElPatioBar.png" alt="Restaurante">
                <div class="benefit-content">
                    <h3>Restaurante El Patio</h3>
                    <p>Comparte sin pagar de más</p>
                    <span class="benefit-only">Cupón limitado</span>
                </div>
            </div>

            <div class="benefit-card">
                <span class="discount-badge">-10%</span>
                <img src="/imagenes/BeneficiosExclusivos/StarbucksVaso.png" alt="Cafe">
                <div class="benefit-content">
                    <h3>Starbucks</h3>
                    <p>Tu café con descuento diario</p>
                    <span class="benefit-only">Presentando app</span>
                </div>
            </div>

            <div class="benefit-card">
                <span class="discount-badge">-20%</span>
                <img src="/imagenes/BeneficiosExclusivos/AzulCenote.png" alt="Cenote">
                <div class="benefit-content">
                    <h3>Cenote Azul</h3>
                    <p>Escápate el fin de semana</p>
                    <span class="benefit-only">Acceso exclusivo</span>
                </div>
            </div>

        </div>





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