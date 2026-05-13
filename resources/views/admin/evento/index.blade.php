@extends('layout.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="container py-4">

    {{-- 🔹 HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        {{-- IZQUIERDA: volver + título --}}
        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-sm">
                <i class="bi bi-arrow-left"></i>
            </a>

            <h2 class="fw-bold mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-calendar-event"></i>
                Gestión de Eventos
            </h2>

        </div>

        {{-- DERECHA: botón agregar --}}
        <a href="{{ route('admin.evento.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Agregar Evento
        </a>

    </div>

    {{-- 🔹 TABLA --}}
    <div class="card shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Ubicación</th>
                        <th>Fecha</th>
                        <th width="180">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($eventos as $evento)
                    <tr>

                        <td>{{ $evento->id }}</td>

                        <td>{{ $evento->titulo }}</td>

                        <td>{{ $evento->categoria }}</td>

                        <td>{{ $evento->ubicacion }}</td>

                        <td>{{ $evento->fecha_calendario }}</td>

                        <td>

                            <a href="{{ route('admin.evento.edit', $evento->id) }}"
                                class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('admin.evento.destroy', $evento->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar evento?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No hay eventos registrados
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

            {{-- PAGINACIÓN --}}
            <div class="mt-3">
                {{ $eventos->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

</div>

@endsection