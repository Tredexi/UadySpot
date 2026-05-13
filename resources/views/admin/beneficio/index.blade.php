@extends('layout.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        {{-- IZQUIERDA: volver + título --}}
        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-sm">
                <i class="bi bi-arrow-left"></i>
            </a>

            <h2 class="fw-bold mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-gift"></i>
                Gestión de Beneficios
            </h2>

        </div>

        {{-- DERECHA: botón agregar --}}
        <a href="{{ route('admin.beneficio.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Agregar Beneficio
        </a>

    </div>

    {{-- ALERTA --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLA --}}
    <div class="card shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th width="160">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($beneficios as $beneficio)
                        <tr>

                            <td>{{ $beneficio->id }}</td>

                            <td>{{ $beneficio->titulo }}</td>

                            <td class="text-muted">
                                {{ Str::limit($beneficio->descripcion, 60) }}
                            </td>

                            <td>

                                <a href="{{ route('admin.beneficio.edit', $beneficio->id) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.beneficio.destroy', $beneficio->id) }}"
                                    method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar beneficio?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No hay beneficios registrados
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

{{-- 🔹 PAGINACIÓN --}}
<div class="mt-3">
    {{ $beneficios->links('pagination::bootstrap-5') }}
</div>

        </div>
    </div>

</div>

@endsection