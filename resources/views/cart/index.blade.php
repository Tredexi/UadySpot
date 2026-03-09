@extends('layout.app')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4">Tu Carrito de Eventos</h2>

    @if(session('cart'))
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-4 p-3">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Precio</th>
                                <th>Cant.</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('cart') as $id => $details)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ asset($details['image']) }}" width="50" class="rounded">
                                            <span class="fw-bold small">{{ $details['title'] }}</span>
                                        </div>
                                    </td>
                                    <td>${{ number_format($details['price'], 2) }}</td>
                                    <td>{{ $details['quantity'] }}</td>
                                    <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-4 p-4 bg-light">
                    <h4 class="fw-bold">Resumen</h4>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold fs-5">Total</span>
                        <span class="fw-bold fs-5 text-primary">${{ number_format($total, 2) }}</span>
                    </div>
                    <button class="btn btn-primary w-100 fw-bold py-3 rounded-3">
                        PROCEDER AL PAGO
                    </button>
                    <a href="{{ route('events.index') }}" class="btn btn-link w-100 text-dark mt-2">Seguir buscando</a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-cart-x fs-1 text-muted"></i>
            <p class="mt-3">Tu carrito está vacío.</p>
            <a href="{{ route('events.index') }}" class="btn btn-primary">Ver Eventos</a>
        </div>
    @endif
</div>
@endsection