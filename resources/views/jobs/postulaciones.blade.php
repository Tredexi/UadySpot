@extends('layout.app')

@section('titulo_pagina', 'Mis Postulaciones')

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">

        <div>
            <h2 class="fw-bold mb-1" style="color: var(--uady-blue);">
                Mis Postulaciones
            </h2>

            <p class="text-muted mb-0">
                Consulta el estado de tus postulaciones realizadas.
            </p>
        </div>

        <a href="{{ route('jobs.index') }}"
           class="btn btn-outline-primary rounded-pill px-4">
            <i class="bi bi-briefcase me-1"></i>
            Ver vacantes
        </a>

    </div>

    {{-- TABLA --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead style="background-color: #f8f9fa;">

                    <tr>
                        <th class="ps-4">Vacante</th>
                        <th>Empresa</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($applications as $application)

                        <tr>

                            {{-- VACANTE --}}
                            <td class="ps-4">

                                <div class="fw-semibold">
                                    {{ $application->trabajo->title }}
                                </div>

                                <small class="text-muted">
                                    {{ $application->trabajo->location }}
                                </small>

                            </td>

                            {{-- EMPRESA --}}
                            <td>
                                {{ $application->trabajo->company }}
                            </td>

                            {{-- FECHA --}}
                            <td>
                                {{ $application->created_at->format('d/m/Y') }}
                            </td>

                            {{-- ESTADO --}}
                            <td>

                                @php
                                    $statusColors = [
                                        'En revisión' => 'warning',
                                        'Aceptado' => 'success',
                                        'Rechazado' => 'danger',
                                        'Entrevista' => 'primary',
                                    ];
                                @endphp

                                <span class="badge bg-{{ $statusColors[$application->status] ?? 'secondary' }} rounded-pill px-3 py-2">
                                    {{ $application->status }}
                                </span>

                            </td>

                            {{-- ACCIONES --}}
                            <td class="text-center">

                                {{-- VER EMPLEO --}}
                                <a href="{{ route('jobs.detail', $application->trabajo->id) }}"
                                   class="btn btn-sm btn-light border rounded-circle me-1"
                                   title="Ver vacante">

                                    <i class="bi bi-eye"></i>

                                </a>

                                {{-- ELIMINAR --}}
                                <form action="{{ route('applications.destroy', $application->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-light border rounded-circle text-danger"
                                            title="Eliminar postulación"
                                            onclick="return confirm('¿Eliminar postulación?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-5">

                                <i class="bi bi-inbox text-muted opacity-50"
                                   style="font-size: 4rem;">
                                </i>

                                <h5 class="mt-3 text-muted">
                                    Aún no tienes postulaciones
                                </h5>

                                <a href="{{ route('jobs.index') }}"
                                   class="btn btn-primary rounded-pill px-4 mt-3">

                                    Explorar empleos

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection