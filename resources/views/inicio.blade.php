@extends('layout.app')

@section('titulo_pagina', 'Inicio')

@section('content')



    <div class="hero-container">
        <div class="hero-overlay">
            <span class="hero-tag">OBTENLO AHORA</span>

            <h1 class="hero-title">
                CONCIERTO A LA LUZ DE LAS VELAS<br>
                <span>LOVE DAY</span>
            </h1>

            <a href="/events" class="hero-button">
                Galería
            </a>
        </div>
    </div>
    
    <div class="categories-container">
        <div class="category-item">
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
        <div class="category-item">
            💼
            <span>Trabajo</span>
        </div>
        <div class="category-item">
            🤝
            <span>Comunidad</span>
        </div>
        <div class="category-item">
            🎓
            <span>Carreras</span>
        </div>
        <div class="category-item">
            🗓️
            <span>Calendario</span>
        </div>
        <div class="category-item">
            📣
            <span>Nosotros</span>
        </div>
    </div>


<!-- EVENTOS -->
    <section class="events-section">

        <div class="events-header">
            <h2>Próximos Eventos UADY</h2>

            <select class="campus-select">
                <option value="all">Todos los eventos</option>
                <option value="Academicos">Academicos</option>
                <option value="Culturales">Culturales</option>
                <option value="Deportivos">Deportivos</option>
                <option value="Cientificos">Cientificos</option>
                <option value="Sociales">Sociales</option>
                <option value="Institucionales">Institucionales</option>
            </select>
        </div>

        <div class="events-grid">

            <!-- EVENT CARD-->
            <div class="event-card" data-campus="Culturales">
                <img src="/imagenes/ProxEventos/filey2026.png" alt="evento">
                <div class="event-body">
                    <span class="event-tag">Recien agregado</span>
                    <h3>Filey 2026</h3>
                    <p class="event-date">14-22 Marzo del 2026</p>
                    <p class="event-price">Entrada gratuita</p>
                </div>
            </div>

            <div class="event-card" data-campus="Academicos">
                <img src="/imagenes/ProxEventos/FeriaProfesiones.png" alt="evento">
                <div class="event-body">
                    <h3>Feria Universitaria de Profesiones 2026</h3>
                    <p class="event-date">7-12 Marzo del 2026</p>
                    <p class="event-price">Entrada gratuita</p>
                </div>
            </div>

            <div class="event-card" data-campus="Deportivos">
                <img src="/imagenes/ProxEventos/CarreraUady.png" alt="evento">
                <div class="event-body">
                    <h3>Carrera UADY</h3>
                    <p class="event-date">1 de Marzo del 2026</p>
                    <p class="event-price">$50 MXN</p>
                </div>
            </div>

            <div class="event-card" data-campus="Culturales">
                <img src="/imagenes/ProxEventos/Beatles.png" alt="evento">
                <div class="event-body">
                    <h3>Tributo a The Beatles</h3>
                    <p class="event-date">6 de Abril del 2026</p>
                    <p class="event-price">$200 MXN</p>
                </div>
            </div>

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
            <a href="/registro" class="jobs-button">
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