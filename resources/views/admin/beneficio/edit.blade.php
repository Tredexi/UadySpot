@extends('layout.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">

        Editar Beneficio

    </h2>

    <div class="card shadow-sm">

        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.beneficio.update', $beneficio->id) }}"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- TITULO --}}
                <div class="mb-3">

                    <label class="form-label">

                        Título

                    </label>

                    <input type="text"
                           name="titulo"
                           class="form-control"
                           value="{{ $beneficio->titulo }}"
                           required>

                </div>

                {{-- SUBTITULO --}}
                <div class="mb-3">

                    <label class="form-label">

                        Subtítulo

                    </label>

                    <input type="text"
                           name="subtitulo"
                           class="form-control"
                           value="{{ $beneficio->subtitulo }}">

                </div>

                {{-- VALOR --}}
                <div class="mb-3">

                    <label class="form-label">

                        Valor

                    </label>

                    <input type="text"
                           name="valor"
                           class="form-control"
                           value="{{ $beneficio->valor }}">

                </div>

                {{-- PROVEEDOR --}}
                <div class="mb-3">

                    <label class="form-label">

                        Proveedor

                    </label>

                    <input type="text"
                           name="proveedor"
                           class="form-control"
                           value="{{ $beneficio->proveedor }}">

                </div>

                {{-- UBICACION --}}
                <div class="mb-3">

                    <label class="form-label">

                        Ubicación

                    </label>

                    <input type="text"
                           name="ubicacion"
                           class="form-control"
                           value="{{ $beneficio->ubicacion }}">

                </div>

                {{-- FECHA --}}
                <div class="mb-3">

                    <label class="form-label">

                        Fecha expiración

                    </label>

                    <input type="date"
                           name="fecha_expiracion"
                           class="form-control"
                           value="{{ $beneficio->fecha_expiracion }}">

                </div>

                {{-- CATEGORIA --}}
                <div class="mb-3">

                    <label class="form-label">

                        Categoría

                    </label>

                    <select name="category_id"
                            class="form-control">

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}"
                                {{ $beneficio->category_id == $category->id ? 'selected' : '' }}>

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
                            class="form-control">

                        @foreach($types as $type)

                            <option value="{{ $type->id }}"
                                {{ $beneficio->type_id == $type->id ? 'selected' : '' }}>

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
                           class="form-check-input"

                        {{ $beneficio->es_destacado ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Es destacado

                    </label>

                </div>

                {{-- IMAGEN ACTUAL --}}
                @if($beneficio->imagen)

                <div class="mb-3">

                    <label>

                        Imagen actual

                    </label>

                    <br>

                    <img src="{{ asset('storage/'.$beneficio->imagen) }}"
                         width="120">

                </div>

                @endif

                {{-- NUEVA IMAGEN --}}
                <div class="mb-3">

                    <label class="form-label">

                        Cambiar imagen

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
                            class="btn btn-primary">

                        Actualizar Beneficio

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection