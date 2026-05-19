@extends('layout.app')

@section('titulo_pagina', 'Editar CV')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow rounded-4 overflow-hidden">

                {{-- HEADER --}}
                <div class="p-4 text-white"
                     style="background:#002E5F;">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        <div>

                            <h2 class="fw-bold mb-1">

                                Editar Mi CV

                            </h2>

                            <p class="mb-0 opacity-75">

                                Mantén actualizado tu perfil profesional

                            </p>

                        </div>

                        <a href="{{ route('jobs.cv') }}"
                           class="btn btn-light rounded-3 fw-semibold">

                            <i class="bi bi-arrow-left"></i>
                            Volver

                        </a>

                    </div>

                </div>

                {{-- BODY --}}
                <div class="card-body p-4 p-lg-5">

                    <form action="{{ route('jobs.cv.update') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        {{-- DATOS PERSONALES --}}
                        <div class="mb-5">

                            <h4 class="fw-bold mb-4"
                                style="color:#002E5F;">

                                Información Personal

                            </h4>

                            <div class="row g-4">

                                {{-- FOTO --}}
                                <div class="col-12 text-center">

                                    <img
                                        src="{{ auth()->user()->profile_photo
                                            ? asset('storage/' . auth()->user()->profile_photo)
                                            : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                                        class="rounded-circle shadow mb-3"
                                        width="120"
                                        height="120"
                                        style="object-fit:cover;">

                                    <div>

                                        <label class="form-label fw-semibold">

                                            Foto de perfil

                                        </label>

                                        <input type="file"
                                               name="profile_photo"
                                               class="form-control">

                                    </div>

                                </div>

                                {{-- TELÉFONO --}}
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        Teléfono

                                    </label>

                                    <input type="text"
                                           name="phone"
                                           class="form-control rounded-3"
                                           value="{{ old('phone', $resume->phone ?? '') }}">

                                </div>

                                {{-- CARRERA --}}
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        Carrera

                                    </label>

                                    <input type="text"
                                           name="career"
                                           class="form-control rounded-3"
                                           value="{{ old('career', $resume->career ?? '') }}">

                                </div>

                                {{-- UNIVERSIDAD --}}
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        Universidad

                                    </label>

                                    <input type="text"
                                           name="university"
                                           class="form-control rounded-3"
                                           value="{{ old('university', $resume->university ?? '') }}">

                                </div>

                                {{-- SEMESTRE --}}
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">

                                        Semestre

                                    </label>

                                    <input type="text"
                                           name="semester"
                                           class="form-control rounded-3"
                                           value="{{ old('semester', $resume->semester ?? '') }}">

                                </div>

                            </div>

                        </div>

                        {{-- SOBRE MÍ --}}
                        <div class="mb-5">

                            <h4 class="fw-bold mb-4"
                                style="color:#002E5F;">

                                Sobre mí

                            </h4>

                            <textarea
                                name="experience"
                                rows="5"
                                class="form-control rounded-4">{{ old('experience', $resume->experience ?? '') }}</textarea>

                        </div>

                        {{-- HABILIDADES --}}
                        <div class="mb-5">

                            <h4 class="fw-bold mb-4"
                                style="color:#002E5F;">

                                Habilidades

                            </h4>

                            <input type="text"
                                   name="skills"
                                   class="form-control rounded-3"
                                   placeholder="Laravel, PHP, MySQL, Bootstrap..."
                                   value="{{ old('skills', $resume->skills ?? '') }}">

                            <small class="text-muted">

                                Separa cada habilidad con comas

                            </small>

                        </div>

                        {{-- EDUCACIÓN --}}
                        <div class="mb-5">

                            <h4 class="fw-bold mb-4"
                                style="color:#002E5F;">

                                Educación

                            </h4>

                            <textarea
                                name="education"
                                rows="4"
                                class="form-control rounded-4">{{ old('education', $resume->education ?? '') }}</textarea>

                        </div>

                        {{-- IDIOMAS --}}
                        <div class="mb-5">

                            <h4 class="fw-bold mb-4"
                                style="color:#002E5F;">

                                Idiomas

                            </h4>

                            <input type="text"
                                   name="languages"
                                   class="form-control rounded-3"
                                   value="{{ old('languages', $resume->languages ?? '') }}">

                        </div>

                        {{-- CV PDF --}}
                        <div class="mb-5">

                            <h4 class="fw-bold mb-4"
                                style="color:#002E5F;">

                                Archivo CV (PDF)

                            </h4>

                            <input type="file"
                                   name="cv_file"
                                   accept=".pdf"
                                   class="form-control rounded-3">

                            @if($resume && $resume->cv_file)

                                <div class="mt-3">

                                    <a href="{{ asset('storage/' . $resume->cv_file) }}"
                                       target="_blank"
                                       class="btn btn-outline-primary rounded-3">

                                        <i class="bi bi-file-earmark-pdf"></i>
                                        Ver CV actual

                                    </a>

                                </div>

                            @endif

                        </div>

                        {{-- BOTÓN --}}
                        <div class="text-end">

                            <button type="submit"
                                    class="btn px-5 py-3 fw-bold text-white rounded-3"
                                    style="background:#0056b3;">

                                <i class="bi bi-check-circle"></i>
                                Guardar cambios

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection