@props([
    'id',
    'tipoBeneficio',
    'valor',
    'imagen',
    'alt',
    'titulo',
    'subtitulo',
    'etiqueta',
    'proveedor',
    'ubicacion',
    'fechaExpiracion',
        'averageRating'

])

{{-- TARJETA DEL BENEFICIO --}}

<div class="card h-100 shadow-lg border rounded-4 overflow-hidden position-relative transition-transform">
    
    {{-- Etiqueta flotante de Descuento/Promo --}}
    <div class="position-absolute top-0 start-0 m-3 z-3">
        @php
            $bgClass = match($tipoBeneficio) {
                'Descuento' => 'bg-danger',
                '2x1' => 'bg-warning text-dark',
                'Gratis' => 'bg-success',
                'Cupón' => 'bg-info text-dark',
                default => 'bg-primary'
            };
        @endphp
        <span class="badge {{ $bgClass }} fs-6 px-3 py-2 rounded-pill shadow-sm fw-bold">
            {{ $valor }}
        </span>
    </div>

    {{-- Imagen del beneficio --}}
    <img src="{{ asset($imagen) }}" class="card-img-top object-fit-cover" alt="{{ $alt }}" style="height: 200px;">

    <div class="card-body d-flex flex-column p-4">
        {{-- Proveedor y Etiqueta --}}
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-primary fw-bold" style="font-size: 0.80rem; letter-spacing: 1px; text-transform: uppercase;">
                <i class="bi bi-shop me-1"></i> {{ $proveedor }}
            </span>
            @if($etiqueta)
                <span class="badge bg-light text-secondary border fw-normal" style="font-size: 0.70rem;">
                    {{ $etiqueta }}
                </span>
            @endif
        </div>
        @auth

        <p class="mb-0">
            ⭐ {{ $averageRating }}/5
        </p>

        <form method="POST" action="{{ route('benefits.rate', $id) }}">
            @csrf

            <div class="d-flex gap-1">

                @for($i = 1; $i <= 5; $i++)

                    <button type="submit"
                            name="rating"
                            value="{{ $i }}"
                            class="btn btn-link p-0 border-0">

                        <i class="bi bi-star-fill text-warning"></i>

                    </button>

                @endfor

            </div>
        </form>

        @endauth
        
        {{-- Título y Subtítulo --}}
        <h5 class="card-title fw-bold mb-2">{{ $titulo }}</h5>
        <p class="card-text text-muted mb-4" style="font-size: 0.9rem;">{{ $subtitulo }}</p>
        
        {{-- Footer de la tarjeta --}}
        <div class="mt-auto border-top pt-3">
            <div class="d-flex flex-column gap-1 text-secondary mb-3" style="font-size: 0.80rem;">
                <div><i class="bi bi-geo-alt-fill me-1 text-muted"></i> {{ $ubicacion }}</div>
                <div><i class="bi bi-calendar-x-fill me-1 text-muted"></i> Válido hasta: {{ $fechaExpiracion }}</div>
            </div>
            
            <button type="button" class="btn btn-outline-dark w-100 fw-bold rounded-pill"
                    data-bs-toggle="modal" 
                    data-bs-target="#qrModal-{{ $id }}">
                <i class="bi bi-qr-code-scan me-2"></i> Usar beneficio
            </button>
        </div>
    </div>
</div>

{{-- EL MODAL: Uno por cada beneficio --}}
<div class="modal fade" id="qrModal-{{ $id }}" tabindex="-1" aria-labelledby="qrModalLabel-{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            
            <div class="modal-body text-center pb-5 px-5">
                <i class="bi bi-patch-check-fill text-success" style="font-size: 3rem;"></i>
                
                {{-- Aquí los datos se imprimen directo desde la BD--}}
                <h4 class="fw-bold mb-1 mt-2">{{ $proveedor }}</h4>
                <p class="text-muted mb-4">{{ $titulo }}</p>

                {{-- Contenedor del QR --}}
                <div class="bg-light p-3 rounded-4 d-inline-block mb-4 border">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=UADYSPOT-VAL-{{ $id }}" 
                        alt="Código QR de Validación" 
                        style="width: 200px; height: 200px;">
                </div>

                <p class="small text-muted mb-0">Muestra este código en caja antes de pagar para hacer válido tu beneficio exclusivo.</p>
            </div>
            
        </div>
    </div>
</div>