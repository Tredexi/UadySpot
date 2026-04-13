@extends('layout.app')

@section('content')

<div class="container py-4">

<h2 class="mb-4">

Editar Evento

</h2>

<div class="card shadow-sm">

<div class="card-body">

<form action="{{ route('admin.evento.update',$evento->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Título</label>

<input type="text"
name="titulo"
value="{{ $evento->titulo }}"
class="form-control">

</div>

<div class="mb-3">

<label>Categoría</label>

<input type="text"
name="categoria"
value="{{ $evento->categoria }}"
class="form-control">

</div>

<div class="mb-3">

<label>Ubicación</label>

<input type="text"
name="ubicacion"
value="{{ $evento->ubicacion }}"
class="form-control">

</div>

<div class="mb-3">

<label>Fecha</label>

<input type="date"
name="fecha_calendario"
value="{{ $evento->fecha_calendario }}"
class="form-control">

</div>

<div class="mb-3">

<label>Descripción</label>

<textarea name="descripcion"
class="form-control">

{{ $evento->descripcion }}

</textarea>

</div>

<button class="btn btn-primary">

Actualizar Evento

</button>

<a href="{{ route('admin.evento.index') }}"
class="btn btn-secondary">

Cancelar

</a>

</form>

</div>

</div>

</div>

@endsection