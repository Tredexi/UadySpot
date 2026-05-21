@extends('layout.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="container py-4">

    <h2 class="mb-4">

        Editar Evento

    </h2>

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.evento.update', $evento->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                {{-- TÍTULO --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Título

                    </label>

                    <input
                        type="text"
                        name="titulo"
                        value="{{ $evento->titulo }}"
                        class="form-control"
                    >

                </div>

                {{-- CATEGORÍA --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Categoría

                    </label>

                    <input
                        type="text"
                        name="categoria"
                        value="{{ $evento->categoria }}"
                        class="form-control"
                    >

                </div>

                {{-- UBICACIÓN --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Ubicación

                    </label>

                    <input
                        type="text"
                        name="ubicacion"
                        value="{{ $evento->ubicacion }}"
                        class="form-control"
                    >

                </div>

                {{-- FECHA --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Fecha

                    </label>

                    <input
                        type="date"
                        name="fecha_calendario"
                        value="{{ $evento->fecha_calendario }}"
                        class="form-control"
                    >

                </div>

                {{-- HORA --}}
                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Hora

                    </label>

                    <input
                        type="time"
                        name="hora"
                        value="{{ $evento->hora }}"
                        class="form-control"
                    >

                </div>

                {{-- IMAGEN ACTUAL --}}
                @if($evento->imagen)

                    <div class="mb-3">

                        <label class="form-label fw-bold d-block">

                            Imagen actual

                        </label>

                        <img
                            src="{{ asset($evento->imagen) }}"
                            class="img-fluid rounded-3 shadow-sm border"
                            style="max-height: 220px;"
                        >

                    </div>

                @endif

                {{-- NUEVA IMAGEN --}}
                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Cambiar imagen

                    </label>

                    <input
                        type="file"
                        name="imagen"
                        class="form-control"
                    >

                </div>

                {{-- DESCRIPCIÓN --}}
                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Descripción

                    </label>

                    <textarea
                        name="descripcion"
                        class="form-control"
                        rows="5"
                    >{{ $evento->descripcion }}</textarea>

                </div>

                {{-- BOTONES --}}
                <div class="d-flex gap-2">

                    <button class="btn btn-primary px-4">

                        Actualizar Evento

                    </button>

                    <a
                        href="{{ route('admin.evento.index') }}"
                        class="btn btn-secondary px-4"
                    >

                        Cancelar

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection