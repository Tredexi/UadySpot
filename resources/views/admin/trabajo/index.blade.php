@extends('layout.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>

            Administrar Trabajos

        </h2>

        <a href="{{ route('admin.trabajo.create') }}"
           class="btn btn-success">

            Agregar Trabajo

        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>Título</th>

                            <th>Empresa</th>

                            <th>Ubicación</th>

                            <th>Modalidad</th>

                            <th>Tipo</th>

                            <th>Salario</th>

                            <th width="180">

                                Acciones

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($trabajos as $trabajo)

                        <tr>

                            <td>

                                {{ $trabajo->id }}

                            </td>

                            <td>

                                {{ $trabajo->title }}

                            </td>

                            <td>

                                {{ $trabajo->company }}

                            </td>

                            <td>

                                {{ $trabajo->location }}

                            </td>

                            <td>

                                {{ $trabajo->modality }}

                            </td>

                            <td>

                                {{ $trabajo->type }}

                            </td>

                            <td>

                                {{ $trabajo->salary }}

                            </td>

                            <td>

                                <a href="{{ route('admin.trabajo.edit', $trabajo->id) }}"
                                   class="btn btn-primary btn-sm">

                                    Editar

                                </a>

                                <form action="{{ route('admin.trabajo.destroy', $trabajo->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar este trabajo?')">

                                        Eliminar

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center">

                                No hay trabajos registrados

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection