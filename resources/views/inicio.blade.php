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
            🎤
            <span>Music</span>
        </div>
        <div class="category-item">
            🌃
            <span>Nightlife</span>
        </div>
        <div class="category-item">
            🎭
            <span>Performing Arts</span>
        </div>
        <div class="category-item">
            🎉
            <span>Holidays</span>
        </div>
        <div class="category-item">
            ❤️
            <span>Dating</span>
        </div>
        <div class="category-item">
            🎮
            <span>Hobbies</span>
        </div>
        <div class="category-item">
            💼
            <span>Business</span>
        </div>
        <div class="category-item">
            🍔
            <span>Food & Drink</span>
        </div>
    </div>


        <!-- EVENTOS POR CAMPUS SECTION -->
    <section class="events-section">

        <div class="events-header">
            <h2>Próximos Eventos UADY</h2>

            <select class="campus-select">
                <option value="all">Todos los campus</option>
                <option value="sociales">Campus Sociales</option>
                <option value="exactas">Campus Ciencias Exactas e Ingeniería</option>
                <option value="salud">Campus Salud</option>
                <option value="preparatorias">Preparatorias</option>
            </select>
        </div>

        <div class="events-grid">

            <!-- EVENT CARD -->
            <div class="event-card" data-campus="sociales">
                <img src="https://picsum.photos/400/250?1" alt="evento">
                <div class="event-body">
                    <span class="event-tag">Just added</span>
                    <h3>Thursday Night Write</h3>
                    <p class="event-date">Jue, Feb 26 · 7:00 PM</p>
                    <p class="event-price">Gratis</p>
                </div>
            </div>

            <div class="event-card" data-campus="exactas">
                <img src="https://picsum.photos/400/250?2" alt="evento">
                <div class="event-body">
                    <h3>Build Your AI Twin</h3>
                    <p class="event-date">Mar, Mar 5 · 7:00 PM</p>
                    <p class="event-price">Desde $99</p>
                </div>
            </div>

            <div class="event-card" data-campus="salud">
                <img src="https://picsum.photos/400/250?3" alt="evento">
                <div class="event-body">
                    <h3>Stop Chasing Speaking Gigs</h3>
                    <p class="event-date">Mié, Jul 1 · 10:30 AM</p>
                    <p class="event-price">Gratis</p>
                </div>
            </div>

            <div class="event-card" data-campus="sociales">
                <img src="https://picsum.photos/400/250?4" alt="evento">
                <div class="event-body">
                    <h3>Foro de Emprendimiento</h3>
                    <p class="event-date">Vie, Abr 12 · 6:00 PM</p>
                    <p class="event-price">$50 MXN</p>
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
                <img src="https://picsum.photos/300/420?gym" alt="Gym">
                <div class="benefit-content">
                    <h3>Gym Universitario</h3>
                    <p>Entrena con descuento exclusivo</p>
                    <span class="benefit-only">Solo Uady Spot</span>
                </div>
            </div>

            <div class="benefit-card">
                <span class="discount-badge">-15%</span>
                <img src="https://picsum.photos/300/420?barber" alt="Barber">
                <div class="benefit-content">
                    <h3>Barbería Black</h3>
                    <p>Corte premium con descuento</p>
                    <span class="benefit-only">Convenio activo</span>
                </div>
            </div>

            <div class="benefit-card">
                <span class="discount-badge">2x1</span>
                <img src="https://picsum.photos/300/420?restaurant" alt="Restaurante">
                <div class="benefit-content">
                    <h3>Restaurante El Patio</h3>
                    <p>Comparte sin pagar de más</p>
                    <span class="benefit-only">Cupón limitado</span>
                </div>
            </div>

            <div class="benefit-card">
                <span class="discount-badge">-10%</span>
                <img src="https://picsum.photos/300/420?coffee" alt="Cafe">
                <div class="benefit-content">
                    <h3>Starbucks</h3>
                    <p>Tu café con descuento diario</p>
                    <span class="benefit-only">Presentando app</span>
                </div>
            </div>

            <div class="benefit-card">
                <span class="discount-badge">-20%</span>
                <img src="https://picsum.photos/300/420?cenote" alt="Cenote">
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
                <img src="/images/logos/oracle.svg" alt="Oracle">
                <h3>Oracle</h3>
                <p>Prácticas profesionales & empleos junior</p>
                <span class="job-badge">Vacantes exclusivas</span>
            </div>

            <div class="job-card starbucks">
                <img src="/images/logos/starbucks.svg" alt="Starbucks">
                <h3>Starbucks</h3>
                <p>Horarios flexibles para estudiantes</p>
                <span class="job-badge">Beneficios UADY</span>
            </div>

            <div class="job-card homedepot">
                <img src="/images/logos/homedepot.svg" alt="Home Depot">
                <h3>Home Depot</h3>
                <p>Programas de desarrollo y empleo</p>
                <span class="job-badge">Convenio activo</span>
            </div>

            <div class="job-card sams">
                <img src="/images/logos/sams.svg" alt="Sams Club">
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