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
    'fechaExpiracion'
])

<div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative transition-transform">
    
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
            <span class="badge bg-light text-secondary border fw-normal" style="font-size: 0.70rem;">
                {{ $etiqueta }}
            </span>
        </div>
        
        {{-- Título y Subtítulo --}}
        <h5 class="card-title fw-bold mb-2">{{ $titulo }}</h5>
        <p class="card-text text-muted mb-4" style="font-size: 0.9rem;">{{ $subtitulo }}</p>
        
        {{-- Footer de la tarjeta (Ubicación, Fecha, Botón) --}}
        <div class="mt-auto border-top pt-3">
            <div class="d-flex flex-column gap-1 text-secondary mb-3" style="font-size: 0.80rem;">
                <div><i class="bi bi-geo-alt-fill me-1 text-muted"></i> {{ $ubicacion }}</div>
                <div><i class="bi bi-calendar-x-fill me-1 text-muted"></i> Válido hasta: {{ $fechaExpiracion }}</div>
            </div>
            
           <button type="button" class="btn btn-outline-dark w-100 fw-bold rounded-pill"
                    data-bs-toggle="modal" 
                    data-bs-target="#qrModal"
                    data-id="{{ $id }}"
                    data-proveedor="{{ $proveedor }}"
                    data-titulo="{{ $titulo }}">
                <i class="bi bi-qr-code-scan me-2"></i> Usar beneficio
            </button>
        </div>
    </div>
</div>