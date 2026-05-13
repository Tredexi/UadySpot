@extends('layout.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">

        Crear Beneficio

    </h2>

    <div class="card shadow-sm">

        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.beneficio.store') }}"
                  enctype="multipart/form-data">

                @csrf

                {{-- TITULO --}}
                <div class="mb-3">

                    <label class="form-label">

                        Título

                    </label>

                    <input type="text"
                           name="titulo"
                           class="form-control"
                           required>

                </div>

                {{-- SUBTITULO --}}
                <div class="mb-3">

                    <label class="form-label">

                        Subtítulo

                    </label>

                    <input type="text"
                           name="subtitulo"
                           class="form-control">

                </div>

                {{-- VALOR --}}
                <div class="mb-3">

                    <label class="form-label">

                        Valor del beneficio

                    </label>

                    <input type="text"
                           name="valor"
                           class="form-control">

                </div>

                {{-- PROVEEDOR --}}
                <div class="mb-3">

                    <label class="form-label">

                        Proveedor

                    </label>

                    <input type="text"
                           name="proveedor"
                           class="form-control">

                </div>

                {{-- UBICACION --}}
                <div class="mb-3">

                    <label class="form-label">

                        Ubicación

                    </label>

                    <input type="text"
                           name="ubicacion"
                           class="form-control">

                </div>

                {{-- FECHA --}}
                <div class="mb-3">

                    <label class="form-label">

                        Fecha de expiración

                    </label>

                    <input type="date"
                           name="fecha_expiracion"
                           class="form-control">

                </div>

                {{-- CATEGORIA --}}
                <div class="mb-3">

                    <label class="form-label">

                        Categoría

                    </label>

                    <select name="category_id"
                            class="form-control"
                            required>

                        <option value="">

                            Seleccionar categoría

                        </option>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">

                                {{ $category->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- TIPO --}}
                <div class="mb-3">

                    <label class="form-label">

                        Tipo

                    </label>

                    <select name="type_id"
                            class="form-control"
                            required>

                        <option value="">

                            Seleccionar tipo

                        </option>

                        @foreach($types as $type)

                            <option value="{{ $type->id }}">

                                {{ $type->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- DESTACADO --}}
                <div class="mb-3 form-check">

                    <input type="checkbox"
                           name="es_destacado"
                           value="1"
                           class="form-check-input">

                    <label class="form-check-label">

                        Es destacado

                    </label>

                </div>

                {{-- IMAGEN --}}
                <div class="mb-3">

                    <label class="form-label">

                        Imagen

                    </label>

                    <input type="file"
                           name="imagen"
                           class="form-control">

                </div>

                {{-- BOTONES --}}
                <div class="d-flex justify-content-between">

                    <a href="{{ route('admin.beneficio.index') }}"
                       class="btn btn-secondary">

                        Volver

                    </a>

                    <button type="submit"
                            class="btn btn-success">

                        Guardar Beneficio

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection