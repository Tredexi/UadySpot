@extends('layout.app')
@section('titulo_pagina', 'Nosotros')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: var(--uady-gold);">Sobre UADY SPOT</h1>
        <p class="text-muted fs-5">Una plataforma creada para conectar, informar y fortalecer la comunidad universitaria.</p>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h3 class="fw-bold mb-3" style="color: var(--uady-blue);">¿Qué es UADY SPOT?</h3>
            <p class="text-secondary">
                UADY SPOT es una plataforma digital diseñada para centralizar información relevante
                para estudiantes, egresados y miembros de la comunidad universitaria. Su propósito es
                facilitar el acceso a eventos, oportunidades laborales, beneficios y noticias
                relacionadas con la universidad.
            </p>

            <p class="text-secondary">
                A través de esta plataforma buscamos crear un espacio donde la comunidad pueda
                mantenerse informada, participar en actividades y descubrir oportunidades que
                contribuyan a su desarrollo académico y profesional.
            </p>
        </div>

        <div class="col-md-6 text-center">
            <i class="bi bi-mortarboard-fill" style="font-size:120px; color: var(--uady-blue);"></i>
        </div>
    </div>


    <div class="row text-center mb-5">

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 p-4 rounded-4">
                <i class="bi bi-calendar-event mb-3" style="font-size:40px; color: var(--uady-blue);"></i>
                <h5 class="fw-bold">Eventos Universitarios</h5>
                <p class="text-muted small">
                    Consulta conferencias, talleres, ferias y actividades organizadas dentro de la
                    universidad para fomentar la participación estudiantil.
                </p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 p-4 rounded-4">
                <i class="bi bi-briefcase-fill mb-3" style="font-size:40px; color: var(--uady-blue);"></i>
                <h5 class="fw-bold">Bolsa de Trabajo</h5>
                <p class="text-muted small">
                    Encuentra oportunidades laborales, prácticas profesionales y vacantes
                    dirigidas a estudiantes y egresados de la universidad.
                </p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 p-4 rounded-4">
                <i class="bi bi-people-fill mb-3" style="font-size:40px; color: var(--uady-blue);"></i>
                <h5 class="fw-bold">Comunidad</h5>
                <p class="text-muted small">
                    Un espacio pensado para fortalecer la conexión entre estudiantes,
                    egresados y organizaciones relacionadas con la comunidad universitaria.
                </p>
            </div>
        </div>

    </div>


    <div class="row align-items-center mb-5">

        <div class="col-md-6 text-center">
            <i class="bi bi-lightbulb-fill" style="font-size:120px; color: var(--uady-gold);"></i>
        </div>

        <div class="col-md-6">
            <h3 class="fw-bold mb-3" style="color: var(--uady-blue);">Nuestro Objetivo</h3>
            <p class="text-secondary">
                El objetivo principal de UADY SPOT es ofrecer un punto central de información
                donde los estudiantes puedan descubrir oportunidades académicas,
                profesionales y sociales dentro de la universidad.
            </p>

            <p class="text-secondary">
                Buscamos facilitar la comunicación entre la comunidad universitaria
                y fomentar la participación activa en actividades que contribuyan
                al crecimiento profesional y personal de los estudiantes.
            </p>
        </div>

    </div>


    <div class="card border-0 shadow-lg rounded-4 p-5 text-center" style="background-color: rgba(0,46,95,0.05);">

        <h3 class="fw-bold mb-3" style="color: var(--uady-blue);">Nuestra Visión</h3>

        <p class="text-secondary fs-5 mb-0">
            Convertirnos en la plataforma digital de referencia para la comunidad universitaria,
            facilitando el acceso a información, oportunidades y recursos que impulsen
            el desarrollo académico y profesional de los estudiantes.
        </p>

    </div>

</div>

@endsection