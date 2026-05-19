@extends('layout.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="container mt-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        {{-- IZQUIERDA: botón volver + título --}}
        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-sm">
                <i class="bi bi-arrow-left"></i>
            </a>

            <h2 class="fw-bold mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-briefcase"></i>
                Bolsa de trabajo
            </h2>

        </div>

        {{-- DERECHA: botón agregar --}}
        <a href="{{ route('admin.trabajo.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Agregar Trabajo
        </a>

    </div>

    {{-- TABLA --}}
    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Empresa</th>
                            <th>Ubicación</th>
                            <th>Modalidad</th>
                            <th>Tipo</th>
                            <th>Salario</th>
                            <th width="180">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($trabajos as $trabajo)
                        <tr>

                            <td>{{ $trabajo->id }}</td>

                            <td>{{ $trabajo->title }}</td>

                            <td>{{ $trabajo->company }}</td>

                            <td>{{ $trabajo->location }}</td>

                            <td>{{ $trabajo->modality }}</td>

                            <td>{{ $trabajo->type }}</td>

                            <td>{{ $trabajo->salary }}</td>

                            <td>

                                <a href="{{ route('admin.trabajo.edit', $trabajo->id) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.trabajo.destroy', $trabajo->id) }}"
                                    method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar este trabajo?')">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                No hay trabajos registrados
                            </td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>

                <div class="mt-3">
                    {{ $trabajos->links('pagination::bootstrap-5') }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection