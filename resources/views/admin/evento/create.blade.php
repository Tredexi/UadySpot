@extends('layout.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="container py-4">

    <h2 class="mb-4 fw-bold">
        Crear Evento
    </h2>

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-body p-4">

            <form 
                action="{{ route('admin.evento.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                {{-- TÍTULO --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Título
                    </label>

                    <input 
                        type="text"
                        name="titulo"
                        class="form-control"
                        required
                    >

                </div>

                {{-- CATEGORÍA --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Categoría
                    </label>

                    <input 
                        type="text"
                        name="categoria"
                        class="form-control"
                    >

                </div>

                {{-- UBICACIÓN --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Ubicación
                    </label>

                    <input 
                        type="text"
                        name="ubicacion"
                        class="form-control"
                    >

                </div>

                {{-- FECHA --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Fecha del evento
                    </label>

                    <input 
                        type="date"
                        name="fecha_calendario"
                        class="form-control"
                    >

                </div>
                                {{-- FECHA --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Hora
                    </label>

                    <input
                        type="time"
                        name="hora"
                        class="form-control"
                        required
                    >

                </div>

                {{-- IMAGEN --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Imagen del evento
                    </label>

                    <input 
                        type="file"
                        name="imagen"
                        class="form-control"
                        accept="image/*"
                        required
                    >

                    <small class="text-muted">
                        Formatos permitidos: JPG, PNG, WEBP
                    </small>

                </div>

                {{-- DESCRIPCIÓN --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Descripción
                    </label>

                    <textarea 
                        name="descripcion"
                        class="form-control"
                        rows="5"
                    ></textarea>

                </div>

                {{-- BOTONES --}}
                <div class="d-flex gap-2">

                    <button class="btn btn-success px-4">

                        <i class="bi bi-check-circle me-1"></i>
                        Guardar Evento

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