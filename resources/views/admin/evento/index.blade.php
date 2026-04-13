@extends('layout.app')

@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            Gestión de Eventos
        </h2>
        <a href="{{ route('admin.evento.create') }}"
           class="btn btn-success">

            <i class="bi bi-plus-circle"></i>
            Agregar Evento
        </a>
    </div>
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($eventos as $evento)
                    <tr>
                        <td>{{ $evento->id }}</td>
                        <td>
                            {{ $evento->titulo }}
                        </td>

                        <td>
                            {{ $evento->categoria }}
                        </td>

                        <td>
                            {{ $evento->ubicacion }}
                        </td>

                        <td>
                            {{ $evento->fecha_calendario }}
                        </td>

                        <td>

                            <a href="{{ route('admin.evento.edit',$evento->id) }}"
                               class="btn btn-sm btn-warning">
                                Editar
                            </a>

                            <form action="{{ route('admin.evento.destroy',$evento->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Eliminar evento?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>

                        <td colspan="6"
                            class="text-center">
                            No hay eventos registrados
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $eventos->links() }}
            </div>
        </div>
    </div>

</div>
@endsection