@extends('layout.app')
@section('titulo_pagina', 'Carreras')

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

<div class="card career-card h-100 shadow-sm border-0">

<div class="card-body text-center d-flex align-items-center justify-content-center">

<h6 class="fw-bold mb-0">
{{ $carrera }}
</h6>

</div>

</div>

</div>

@endforeach

</div>

</div>

@endforeach

</div>


<style>

.campus-title{
color:var(--uady-blue);
border-left:5px solid var(--uady-gold);
padding-left:10px;
}

.career-card{

border-radius:12px;
transition:all 0.2s ease;
cursor:pointer;
min-height:90px;

}

.career-card:hover{

transform:translateY(-5px);
background:#f8fafc;

}

.career-card h6{

font-size:15px;

}

</style>

@endsection