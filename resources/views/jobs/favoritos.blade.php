@extends('layout.app')

@section('titulo_pagina', 'Trabajos Guardados')

@section('content')

<div class="container py-5" style="min-height: 50vh;">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1"
                style="color: var(--uady-blue);">

                Trabajos Guardados

            </h2>

            <p class="text-muted mb-0">
                Tus vacantes favoritas guardadas.
            </p>

        </div>

        <a href="{{ route('jobs.index') }}"
           class="btn btn-outline-primary rounded-pill px-4">

            Explorar trabajos

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

                        <th>Ubicación</th>

                        <th>Salario</th>

                        <th class="text-center">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($favorites as $favorite)

                        @if($favorite->trabajo)

                        <tr>

                            {{-- VACANTE --}}
                            <td class="ps-4">

                                <div class="fw-semibold">
                                    {{ $favorite->trabajo->title }}
                                </div>

                                <small class="text-muted">
                                    {{ $favorite->trabajo->type }}
                                </small>

                            </td>

                            {{-- EMPRESA --}}
                            <td>
                                {{ $favorite->trabajo->company }}
                            </td>

                            {{-- UBICACIÓN --}}
                            <td>
                                {{ $favorite->trabajo->location }}
                            </td>

                            {{-- SALARIO --}}
                            <td>

                                <span
                                    class="px-3 py-1 rounded-pill fw-semibold"
                                    style="
                                        background-color: rgba(25,135,84,.12);
                                        color: #198754;
                                        border: 1px solid rgba(25,135,84,.25);
                                    ">

                                    {{ $favorite->trabajo->salary }}

                                </span>

                            </td>

                            {{-- ACCIONES --}}
                            <td class="text-center">

                                {{-- VER --}}
                                <a href="{{ route('jobs.detail', $favorite->trabajo->id) }}"
                                   class="btn btn-sm btn-outline-primary me-1">

                                    <i class="bi bi-eye"></i>

                                </a>

                                {{-- ELIMINAR --}}
                                <form action="{{ route('jobs.favorites.destroy', $favorite->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('¿Eliminar favorito?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endif

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                <i class="bi bi-heart text-muted opacity-50"
                                   style="font-size: 4rem;">
                                </i>

                                <h5 class="mt-3 text-muted">
                                    No tienes trabajos guardados
                                </h5>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection