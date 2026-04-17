@extends('layout.app')
@section('titulo_pagina', 'Carreras')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/carreras.css') }}">
@endsection
@section('content')

<div class="container py-5">

<h2 class="text-center fw-bold mb-3" style="color:var(--uady-blue);">
Carreras UADY
</h2>

<p class="text-center text-muted mb-5">
Explora las licenciaturas que ofrece la Universidad Autónoma de Yucatán en sus diferentes campus y modalidades.
</p>

@foreach($carreras as $campus => $lista)

<div class="mb-5">

<h4 class="fw-bold mb-4 campus-title">
{{ $campus }}
</h4>

<div class="row">

@foreach($lista as $carrera)

<div class="col-md-6 col-lg-3 mb-4">

<a href="{{ $carrera['url'] }}" target="_blank" class="text-decoration-none text-reset">

<div class="card career-card h-100 shadow-sm border-0">

<div class="card-body text-center d-flex align-items-center justify-content-center">

<h6 class="fw-bold mb-0">
{{ $carrera['nombre'] }}
</h6>

</div>

</div>

</a>

</div>

@endforeach

</div>

</div>

@endforeach

</div>

@endsection