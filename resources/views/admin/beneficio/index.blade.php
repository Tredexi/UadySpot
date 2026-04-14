@extends('layout.app')

@section('content')
    <div class="container py-4">

        <h2 class="fw-bold mb-4">

            Administrar Beneficios

        </h2>

        <a href="{{ route('admin.beneficio.create') }}" class="btn btn-success mb-3">

            Agregar Beneficio

        </a>

        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif


        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($beneficios as $beneficio)
                        <tr>

                            <td>{{ $beneficio->id }}</td>

                            <td>{{ $beneficio->titulo }}</td>

                            <td>

                                {{ Str::limit($beneficio->descripcion, 50) }}

                            </td>

                            <td>

                                <a href="{{ route('admin.beneficio.edit', $beneficio->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <form action="{{ route('admin.beneficio.destroy', $beneficio->id) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">

                                        Eliminar

                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection
