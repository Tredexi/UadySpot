@extends('layout.app')

@section('content')
    <div class="container py-4">

        {{-- 🔹 HEADER --}}
        <div class="d-flex align-items-center gap-3 mb-4">
            <a href="{{ route('admin.trabajo.index') }}" class="btn btn-outline-dark btn-sm">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h2 class="fw-bold mb-0">Publicar Nueva Vacante</h2>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.trabajo.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        {{-- Título del Puesto --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Título del Puesto</label>
                            <input type="text" name="title" class="form-control" placeholder="Ej: Desarrollador Jr." required>
                        </div>

                        {{-- Empresa --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Empresa</label>
                            <input type="text" name="company" class="form-control" placeholder="Nombre de la empresa" required>
                        </div>

                        {{-- Ubicación --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Ubicación</label>
                            <input type="text" name="location" class="form-control" placeholder="Ej: Mérida, Yuc.">
                        </div>

                        {{-- Salario --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Salario (Opcional)</label>
                            <input type="text" name="salary" class="form-control" placeholder="Ej: $10,000 - $15,000">
                        </div>

                        {{-- Fecha de Publicación --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Fecha de Publicación</label>
                            <input type="date" name="posted_at" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>

                        {{-- Tipo de Contrato --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tipo de Trabajo</label>
                            <select name="type" class="form-select">
                                <option value="Tiempo Completo">Tiempo Completo</option>
                                <option value="Medio Tiempo">Medio Tiempo</option>
                                <option value="Por Proyecto">Por Proyecto</option>
                                <option value="Prácticas">Prácticas</option>
                            </select>
                        </div>

                        {{-- Modalidad --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Modalidad</label>
                            <select name="modality" class="form-select">
                                <option value="Presencial">Presencial</option>
                                <option value="Remoto">Remoto</option>
                                <option value="Híbrido">Híbrido</option>
                            </select>
                        </div>
                    </div>

                    {{-- Checkboxes de Estado --}}
                    <div class="d-flex gap-4 mb-4 mt-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_new" id="is_new" value="1" checked>
                            <label class="form-check-label" for="is_new">Etiqueta "Nuevo"</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="urgent" id="urgent" value="1">
                            <label class="form-check-label text-danger fw-bold" for="urgent">¡Marcar como Urgente!</label>
                        </div>
                    </div>

                    {{-- Descripción --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">Descripción de la Vacante</label>
                        <textarea name="description" class="form-control" rows="5" placeholder="Describe los requisitos y beneficios del puesto..."></textarea>
                    </div>

                    {{-- Botones de Acción --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-check-circle me-1"></i> Publicar Trabajo
                        </button>
                        <a href="{{ route('admin.trabajo.index') }}" class="btn btn-secondary px-4">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection