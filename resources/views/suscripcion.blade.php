@extends('layout.app')

@section('titulo_pagina', 'Suscripción')

@section('content')

<div class="container py-5">

    {{-- HERO --}}
    <div class="text-center mb-5">

        <span
            class="badge rounded-pill px-4 py-2 mb-3"
            style="
                background-color: rgba(203,160,82,.15);
                color: var(--uady-gold);
            ">

            UADY Spot Premium

        </span>

        <h1
            class="fw-bold display-5 mb-3"
            style="color: var(--uady-blue);">

            Planes de Suscripción

        </h1>

        <p
            class="text-secondary fs-5 mx-auto"
            style="max-width:700px;">

            Accede a promociones exclusivas,
            eventos especiales, vacantes,
            convenios universitarios y más.

        </p>

    </div>

    {{-- GRATIS ESTUDIANTES --}}
    <div
        class="card border-0 shadow-lg rounded-4 overflow-hidden mb-5">

        <div class="row g-0 align-items-center">

            <div class="col-lg-7 p-5">

                <span
                    class="badge bg-success rounded-pill px-3 py-2 mb-3">

                    GRATIS

                </span>

                <h2
                    class="fw-bold mb-3"
                    style="color: var(--uady-blue);">

                    Alumnos UADY

                </h2>

                <p class="text-secondary fs-5 mb-4">

                    Si eres alumno activo de la UADY,
                    puedes utilizar UADY Spot sin costo.

                </p>

                <ul class="list-unstyled text-secondary">

                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Acceso completo a beneficios
                    </li>

                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Bolsa de trabajo universitaria
                    </li>

                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Eventos y comunidad
                    </li>

                </ul>

            </div>

            <div
                class="col-lg-5 text-center p-5"
                style="
                    background:
                    linear-gradient(
                        135deg,
                        var(--uady-blue),
                        #0b4f94
                    );
                ">

                <h1
                    class="display-1 fw-bold text-white">

                    $0

                </h1>

                <p class="text-light fs-5">

                    Incluido para estudiantes activos

                </p>

            </div>

        </div>

    </div>

    {{-- DOCENTES --}}
    <div
        class="card border-0 shadow rounded-4 overflow-hidden">

        <div class="row g-0 align-items-center">

            <div class="col-lg-7 p-5">

                <span
                    class="badge rounded-pill px-3 py-2 mb-3"
                    style="
                        background-color:
                        rgba(0,46,95,.12);

                        color:
                        var(--uady-blue);
                    ">

                    PERSONAL UADY

                </span>

                <h2
                    class="fw-bold mb-3"
                    style="color: var(--uady-blue);">

                    Docentes y Empleados

                </h2>

                <p class="text-secondary fs-5 mb-4">

                    Mantente conectado a la comunidad
                    universitaria y aprovecha todos
                    los beneficios exclusivos.

                </p>

                <ul class="list-unstyled text-secondary">

                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Acceso a descuentos y convenios
                    </li>

                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Eventos institucionales
                    </li>

                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Comunidad UADY Spot
                    </li>

                </ul>

            </div>

            <div
                class="col-lg-5 text-center p-5"
                style="
                    background:
                    linear-gradient(
                        135deg,
                        var(--uady-gold),
                        #d8b46a
                    );
                ">

                <h1
                    class="display-2 fw-bold"
                    style="color: var(--uady-blue);">

                    $50

                </h1>

                <p
                    class="fw-semibold fs-5"
                    style="color: var(--uady-blue);">

                    MXN por usuario

                </p>

                <button
                    type="button"
                    onclick="window.location.href='/registro'"
                    class="btn btn-dark rounded-pill px-4 py-2 mt-3">

                    Suscribirse

                </button>

            </div>

        </div>

    </div>

</div>

@endsection