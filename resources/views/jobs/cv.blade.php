@extends('layout.app')

@section('titulo_pagina', 'Mi CV')

@section('content')

<div class="container py-5">

    <div class="row g-4">

        {{-- SIDEBAR --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow rounded-4 overflow-hidden">

                <div class="p-4 text-center text-white"
                     style="background:#002E5F;">

                    <img
                        src="{{ asset(auth()->user()->profile_photo) }}"
                        class="rounded-circle"
                        width="120"
                    >

                    <h3 class="fw-bold mb-1">
                        {{ auth()->user()->name }}
                    </h3>

                    <p class="mb-0 opacity-75">
                        {{ $resume->career ?? 'Sin carrera registrada' }}
                    </p>

                </div>

                <div class="p-4">

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Correo
                        </small>

                        <strong>
                            {{ auth()->user()->email }}
                        </strong>

                    </div>

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Teléfono
                        </small>

                        <strong>
                            {{ $resume->phone ?? 'No registrado' }}
                        </strong>

                    </div>

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Universidad
                        </small>

                        <strong>
                            {{ $resume->university ?? 'No registrada' }}
                        </strong>

                    </div>

                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Semestre
                        </small>

                        <strong>
                            {{ $resume->semester ?? 'No registrado' }}
                        </strong>

                    </div>

                    <a href="{{ route('jobs.cv.edit') }}"
                       class="btn w-100 fw-bold text-white rounded-3"
                       style="background:#0056b3;">

                        <i class="bi bi-pencil-square"></i>
                        Editar CV

                    </a>

                </div>

            </div>

        </div>

        {{-- CONTENIDO --}}
        <div class="col-lg-8">

            {{-- SOBRE MI --}}
            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-3"
                        style="color:#002E5F;">

                        Sobre mí

                    </h4>

                    <p class="text-muted mb-0">

                        {{ $resume->experience ?? 'Aún no hay información profesional registrada.' }}

                    </p>

                </div>

            </div>

            {{-- HABILIDADES --}}
            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-3"
                        style="color:#002E5F;">

                        Habilidades

                    </h4>

                    @if($resume && $resume->skills)

                        @foreach(explode(',', $resume->skills) as $skill)

                            <span class="badge rounded-pill px-3 py-2 me-2 mb-2"
                                  style="background:#EAF2FF;color:#002E5F;">

                                {{ trim($skill) }}

                            </span>

                        @endforeach

                    @endif

                </div>

            </div>

            {{-- POSTULACIONES --}}
            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="fw-bold mb-0"
                            style="color:#002E5F;">

                            Mis postulaciones

                        </h4>

                    </div>

                    @forelse($applications as $application)

                        <div class="border rounded-3 p-3 mb-3">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <h5 class="fw-bold mb-1">

                                        {{ $application->trabajo->title }}

                                    </h5>

                                    <div class="text-muted small">

                                        {{ $application->trabajo->company }}

                                    </div>

                                </div>

                                <span class="badge bg-primary">

                                    {{ $application->status }}

                                </span>

                            </div>

                        </div>

                    @empty

                        <p class="text-muted">
                            No tienes postulaciones aún.
                        </p>

                    @endforelse

                </div>

            </div>

            {{-- FAVORITOS --}}
            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-3"
                        style="color:#002E5F;">

                        Vacantes guardadas

                    </h4>

                    @forelse($favorites as $favorite)

                        <div class="border rounded-3 p-3 mb-3">

                            <h5 class="fw-bold mb-1">

                                {{ $favorite->trabajo->title }}

                            </h5>

                            <div class="text-muted small">

                                {{ $favorite->trabajo->company }}

                            </div>

                        </div>

                    @empty

                        <p class="text-muted">
                            No tienes vacantes guardadas.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

@endsection