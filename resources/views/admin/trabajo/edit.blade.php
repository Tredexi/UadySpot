@extends('layout.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">

        Editar Trabajo

    </h2>

    <div class="card shadow-sm">

        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.trabajo.update', $trabajo->id) }}">

                @csrf
                @method('PUT')

                {{-- TITULO --}}
                <div class="mb-3">

                    <label class="form-label">

                        Título

                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ $trabajo->title }}"
                           required>

                </div>

                {{-- EMPRESA --}}
                <div class="mb-3">

                    <label class="form-label">

                        Empresa

                    </label>

                    <input type="text"
                           name="company"
                           class="form-control"
                           value="{{ $trabajo->company }}"
                           required>

                </div>

                {{-- UBICACION --}}
                <div class="mb-3">

                    <label class="form-label">

                        Ubicación

                    </label>

                    <input type="text"
                           name="location"
                           class="form-control"
                           value="{{ $trabajo->location }}">

                </div>

                {{-- SALARIO --}}
                <div class="mb-3">

                    <label class="form-label">

                        Salario

                    </label>

                    <input type="text"
                           name="salary"
                           class="form-control"
                           value="{{ $trabajo->salary }}">

                </div>

                {{-- TIPO --}}
                <div class="mb-3">

                    <label class="form-label">

                        Tipo de empleo

                    </label>

                    <input type="text"
                           name="type"
                           class="form-control"
                           value="{{ $trabajo->type }}">

                </div>

                {{-- MODALIDAD --}}
                <div class="mb-3">

                    <label class="form-label">

                        Modalidad

                    </label>

                    <input type="text"
                           name="modality"
                           class="form-control"
                           value="{{ $trabajo->modality }}">

                </div>

                {{-- FECHA PUBLICACION --}}
                <div class="mb-3">

                    <label class="form-label">

                        Fecha publicación

                    </label>

                    <input type="text"
                           name="posted_at"
                           class="form-control"
                           value="{{ $trabajo->posted_at }}">

                </div>

                {{-- NUEVO --}}
                <div class="mb-3 form-check">

                    <input type="checkbox"
                           name="is_new"
                           value="1"
                           class="form-check-input"

                        {{ $trabajo->is_new ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Es nuevo

                    </label>

                </div>

                {{-- URGENTE --}}
                <div class="mb-3 form-check">

                    <input type="checkbox"
                           name="urgent"
                           value="1"
                           class="form-check-input"

                        {{ $trabajo->urgent ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Urgente

                    </label>

                </div>

                {{-- DESCRIPCION --}}
                <div class="mb-3">

                    <label class="form-label">

                        Descripción

                    </label>

                    <textarea name="description"
                              class="form-control"
                              rows="4"
                              required>{{ $trabajo->description }}</textarea>

                </div>

                {{-- BOTONES --}}
                <div class="d-flex justify-content-between">

                    <a href="{{ route('admin.trabajo.index') }}"
                       class="btn btn-secondary">

                        Volver

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        Actualizar Trabajo

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection