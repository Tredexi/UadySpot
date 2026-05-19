@extends('layout.app')

@section('titulo_pagina', $job->title)

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="bg-white rounded-4 shadow-sm border p-4 mb-4">

        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">

            <div>

                {{-- TÍTULO --}}
                <h1 class="fw-bold mb-2"
                    style="color: var(--uady-blue);">

                    {{ $job->title }}

                </h1>

                {{-- EMPRESA --}}
                <h5 class="text-muted mb-3">
                    {{ $job->company }}
                </h5>

                {{-- INFO --}}
                <div class="d-flex flex-wrap gap-2">

                    <span class="badge bg-light text-dark border px-3 py-2">
                        <i class="bi bi-geo-alt me-1"></i>
                        {{ $job->location }}
                    </span>

                    <span class="badge bg-light text-dark border px-3 py-2">
                        <i class="bi bi-laptop me-1"></i>
                        {{ $job->modality }}
                    </span>

                    <span class="badge bg-light text-dark border px-3 py-2">
                        <i class="bi bi-briefcase me-1"></i>
                        {{ $job->type }}
                    </span>

                    <span class="badge px-3 py-2"
                          style="
                            background-color: rgba(25,135,84,.12);
                            color: #198754;
                            border: 1px solid rgba(25,135,84,.25);
                          ">

                        <i class="bi bi-cash-stack me-1"></i>
                        {{ $job->salary }}

                    </span>

                </div>

            </div>

            {{-- BOTÓN --}}
            <div>

                <button class="btn px-4 py-2 fw-bold"
                        style="
                            background-color: var(--uady-gold);
                            color: var(--uady-blue);
                        ">

                    <i class="bi bi-send me-1"></i>
                    Postularme

                </button>

            </div>

        </div>

    </div>

    {{-- DESCRIPCIÓN --}}
    <div class="bg-white rounded-4 shadow-sm border p-4 mb-4">

        <h4 class="fw-bold mb-3"
            style="color: var(--uady-blue);">

            Descripción del puesto

        </h4>

        <p class="text-secondary mb-0"
           style="
                line-height: 1.8;
                white-space: pre-line;
           ">

            {{ $job->description }}

        </p>

    </div>

    {{-- INFO EXTRA --}}
    <div class="row g-4">

        {{-- PUBLICACIÓN --}}
        <div class="col-md-6">

            <div class="bg-white rounded-4 shadow-sm border p-4 h-100">

                <h5 class="fw-bold mb-3">
                    Información adicional
                </h5>

                <div class="d-flex flex-column gap-3">

                    <div>
                        <small class="text-muted d-block">
                            Publicado
                        </small>

                        <span class="fw-semibold">
                            {{ $job->posted_at }}
                        </span>
                    </div>

                    <div>
                        <small class="text-muted d-block">
                            Empresa
                        </small>

                        <span class="fw-semibold">
                            {{ $job->company }}
                        </span>
                    </div>

                    <div>
                        <small class="text-muted d-block">
                            Ubicación
                        </small>

                        <span class="fw-semibold">
                            {{ $job->location }}
                        </span>
                    </div>

                </div>

            </div>

        </div>

        {{-- RECOMENDACIONES --}}
        <div class="col-md-6">

            <div class="bg-white rounded-4 shadow-sm border p-4 h-100">

                <h5 class="fw-bold mb-3">
                    Recomendaciones
                </h5>

                <ul class="text-secondary mb-0">

                    <li class="mb-2">
                        Mantén actualizado tu CV.
                    </li>

                    <li class="mb-2">
                        Verifica tus datos de contacto.
                    </li>

                    <li>
                        Revisa periódicamente el estado de tu postulación.
                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>

@endsection