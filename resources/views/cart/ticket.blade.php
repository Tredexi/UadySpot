@extends('layout.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card border-0 shadow-lg rounded-5 overflow-hidden">

                {{-- HEADER --}}
                <div class="bg-success text-white text-center py-4">

                    <h2 class="fw-bold mb-1">
                        ¡Pago realizado!
                    </h2>

                    <p class="mb-0">
                        Tu acceso al evento está listo
                    </p>

                </div>


                {{-- BODY --}}
                <div class="card-body p-5 text-center">

                    {{-- QR --}}
                    <div class="mb-4">

                        {!! QrCode::size(260)->generate($ticket['code']) !!}

                    </div>


                    {{-- CÓDIGO --}}
                    <h4 class="fw-bold mb-3">

                        {{ $ticket['code'] }}

                    </h4>


                    {{-- EVENTOS --}}
                    <div class="text-start mb-4">

                        <h5 class="fw-bold mb-3">
                            Eventos
                        </h5>

                        @foreach($ticket['cart'] as $item)

                            <div class="border rounded-4 p-3 mb-3">

                                <div class="fw-bold">
                                    {{ $item['title'] }}
                                </div>

                                <small class="text-muted">

                                    Cantidad:
                                    {{ $item['quantity'] }}

                                </small>

                            </div>

                        @endforeach

                    </div>


                    {{-- ASIENTOS --}}
                    <div class="mb-4">

                        <h5 class="fw-bold mb-3">

                            Asientos asignados

                        </h5>

                        <div class="d-flex flex-wrap justify-content-center gap-2">

                            @foreach($ticket['asientos'] as $asiento)

                                <span class="badge bg-primary px-4 py-3 fs-6 rounded-pill">

                                    {{ $asiento }}

                                </span>

                            @endforeach

                        </div>

                    </div>


                    {{-- FECHA --}}
                    <p class="text-muted">

                        Compra realizada:
                        {{ $ticket['created_at'] }}

                    </p>


                    {{-- BOTÓN --}}
                    <a href="{{ route('events.index') }}"
                       class="btn btn-dark px-5 py-3 rounded-4 fw-bold">

                        Volver a eventos

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection