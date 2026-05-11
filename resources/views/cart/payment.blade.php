@extends('layout.app')

@section('titulo_pagina', 'Pago')

@section('content')

<style>

    /* Texto escrito dentro de inputs */
    .form-control {
        color: #6c757d !important;
    }

    /* Placeholder */
    .form-control::placeholder {
        color: #adb5bd !important;
        opacity: 1;
    }

    /* Cuando el usuario hace focus */
    .form-control:focus {
        color: #495057 !important;
    }

</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                {{-- HEADER --}}
                <div
                    class="text-white p-4"
                    style="
                        background: linear-gradient(135deg, #002E5F, #004b99);
                    ">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bold mb-1">
                                Finalizar compra
                            </h2>
                            <p class="mb-0 opacity-75">
                                Completa tu pago de forma segura
                            </p>
                        </div>

                        {{-- TEMPORIZADOR --}}
                        <div
                            class="bg-white text-dark px-4 py-2 rounded-3 shadow-sm text-center">
                            <small class="text-muted d-block">
                                Tiempo restante
                            </small>
                            <span
                                id="countdown"
                                class="fw-bold fs-4">
                                03:00
                            </span>
                        </div>
                    </div>
                </div>

                {{-- BODY --}}
                <div class="card-body p-4 p-lg-5">
                    {{-- RESUMEN --}}
                    <div class="bg-light rounded-4 p-4 mb-5">
                        <h5 class="fw-bold mb-3">
                            Resumen de compra
                        </h5>

                        @foreach($cart as $item)
                            <div class="d-flex justify-content-between mb-2">
                                <span>
                                    {{ $item['title'] }}
                                    x{{ $item['quantity'] }}
                                </span>
                                <span class="fw-semibold">
                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                </span>
                            </div>

                        @endforeach

                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold fs-5">
                                Total
                            </span>
                            <span class="fw-bold fs-4 text-success">
                                ${{ number_format($total, 2) }}
                            </span>
                        </div>
                    </div>

                    {{-- FORMULARIO --}}
                    <form method="POST"
                        action="{{ route('cart.processPayment') }}">
                        @csrf
                        {{-- TARJETA --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small mb-2">
                                Número de tarjeta
                            </label>

                            <input
                                type="text"
                                class="form-control form-control-lg rounded-3 shadow-sm"
                                placeholder="1234 5678 9012 3456"
                                maxlength="19"
                                style="
                                    font-size: 1rem;
                                    letter-spacing: 2px;
                                    padding: 14px;
                                "
                                required>
                        </div>

                        {{-- TITULAR --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small mb-2">
                                Nombre del titular
                            </label>

                            <input
                                type="text"
                                class="form-control form-control-lg rounded-3 shadow-sm"
                                placeholder="Nombre completo"
                                style="
                                    font-size: 1rem;
                                    padding: 14px;
                                "
                                required>
                        </div>
                        <div class="row">

                            {{-- FECHA --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold text-secondary small mb-2">
                                    Expiración
                                </label>

                                <input
                                    type="text"
                                    id="expiration"
                                    class="form-control form-control-lg rounded-3 shadow-sm"
                                    placeholder="MM/AA"
                                    maxlength="5"
                                    style="
                                        font-size: 1rem;
                                        padding: 14px;
                                    "
                                    required>

                                <small
                                    id="expirationError"
                                    class="text-danger d-none">
                                    Formato válido: 01/27
                                </small>

                            </div>

                            {{-- CVV --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold text-secondary small mb-2">
                                    CVV
                                </label>

                                <input
                                    type="password"
                                    id="cvv"
                                    class="form-control form-control-lg rounded-3 shadow-sm"
                                    placeholder="123"
                                    maxlength="3"
                                    style="
                                        font-size: 1rem;
                                        padding: 14px;
                                    "
                                    required>

                                <small
                                    id="cvvError"
                                    class="text-danger d-none">
                                    El CVV debe contener exactamente 3 números.
                                </small>

                            </div>

                        {{-- GUARDAR TARJETA --}}
                        <div class="form-check mb-4">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="saveCard"
                                name="save_card">

                            <label
                                class="form-check-label text-secondary"
                                for="saveCard">
                                Guardar esta tarjeta para futuras compras
                            </label>
                        </div>

                        {{-- BOTONES --}}
                        <div class="d-flex gap-3">

                            {{-- REGRESAR --}}
                            <a
                                href="{{ route('cart.index') }}"
                                class="btn btn-outline-secondary w-50 py-3 fw-bold rounded-3">
                                <i class="bi bi-arrow-left me-2"></i>
                                Volver al carrito
                            </a>

                            {{-- PAGAR --}}
                            <button type="submit"
                                class="btn btn-success w-100 py-3 fw-bold rounded-4 shadow-sm">

                                <i class="bi bi-credit-card-2-front me-2"></i>

                                PAGAR AHORA

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT TEMPORIZADOR --}}
<script>

let time = 180;

const countdown = document.getElementById('countdown');

const timer = setInterval(() => {

    let minutes = Math.floor(time / 60);

    let seconds = time % 60;

    seconds = seconds < 10
        ? '0' + seconds
        : seconds;

    countdown.innerHTML =
        minutes + ':' + seconds;

    time--;

    if (time < 0) {

        clearInterval(timer);

        alert(
            'El tiempo de pago expiró. Serás redirigido al carrito.'
        );

        window.location.href =
            "{{ route('cart.index') }}";

    }

}, 1000);

</script>

<script>

/* =========================
   VALIDACIÓN FECHA
========================= */

const expirationInput =
    document.getElementById('expiration');

const expirationError =
    document.getElementById('expirationError');

expirationInput.addEventListener('input', function () {

    // SOLO NÚMEROS
    let value = this.value.replace(/\D/g, '');

    // FORMATO MM/AA
    if (value.length >= 3) {

        value =
            value.substring(0, 2) +
            '/' +
            value.substring(2, 4);

    }

    this.value = value;

});


expirationInput.addEventListener('blur', function () {

    const regex =
        /^(0[1-9]|1[0-2])\/\d{2}$/;

    if (!regex.test(this.value)) {

        expirationError.classList.remove('d-none');

        this.classList.add('is-invalid');

    } else {

        expirationError.classList.add('d-none');

        this.classList.remove('is-invalid');

    }

});


/* =========================
   VALIDACIÓN CVV
========================= */

const cvvInput =
    document.getElementById('cvv');

const cvvError =
    document.getElementById('cvvError');

cvvInput.addEventListener('input', function () {

    // SOLO NÚMEROS
    this.value =
        this.value.replace(/\D/g, '');

});


cvvInput.addEventListener('blur', function () {

    if (this.value.length !== 3) {

        cvvError.classList.remove('d-none');

        this.classList.add('is-invalid');

    } else {

        cvvError.classList.add('d-none');

        this.classList.remove('is-invalid');

    }

});

</script>

@endsection