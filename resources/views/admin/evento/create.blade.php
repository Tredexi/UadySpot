@extends('layout.app')

@section('content')
    <div class="container py-4">

        <h2 class="mb-4">
            Crear Evento
        </h2>

        <div class="card shadow-sm">

            <div class="card-body">

                <form action="{{ route('admin.evento.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <label>Título</label>

                        <input type="text" name="titulo" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label>Categoría</label>

                        <input type="text" name="categoria" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Ubicación</label>

                        <input type="text" name="ubicacion" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Fecha</label>

                        <input type="date" name="fecha_calendario" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Descripción</label>

                        <textarea name="descripcion" class="form-control"></textarea>

                    </div>

                    <button class="btn btn-success">

                        Guardar Evento

                    </button>

                    <a href="{{ route('admin.evento.index') }}" class="btn btn-secondary">

                        Cancelar

                    </a>

                </form>

            </div>

        </div>

    </div>
@endsection
