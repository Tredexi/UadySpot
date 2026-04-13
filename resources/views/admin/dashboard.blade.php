@extends('layout.app')
@section('content')

<h2>Panel Administrador</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Eventos</h5>
                <h2>{{ $totalEventos }}</h2>
                <a href="{{ route('admin.evento.index') }}"
                    class="btn btn-primary">
                    Administrar
                    </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Beneficios</h5>
                <h2>{{ $totalBeneficios }}</h2>

                <a href="{{ route('beneficios.index') }}"
                class="btn btn-primary">
                Administrar
                    </a>
            </div>
        </div>
    </div>
</div>

@endsection