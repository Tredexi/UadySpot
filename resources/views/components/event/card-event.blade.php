@props([
    'id', 
    'image', 
    'title', 
    'dateDay', 
    'dateMonth', 
    'location', 
    'time', 
    'category', 
    'availability', 
    'availabilityStatus', 
    'actionText', 
    'price'
])

<div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
    {{-- 1. Imagen --}}
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="card-img-top object-fit-cover" style="height: 200px;">

    <div class="card-body d-flex flex-column p-4">
        
        {{-- 2. Título --}}
        <h5 class="card-title fw-bold text-uppercase mb-4" style="font-size: 1.1rem; line-height: 1.3;">
            {{ $title }}
        </h5>

        {{-- 3. Info de Fecha, Ubicación y Hora --}}
        <div class="d-flex mb-4">
            {{-- Recuadro de Fecha --}}
            <div class="bg-light rounded-3 text-center d-flex flex-column justify-content-center align-items-center me-3" style="min-width: 65px; height: 65px;">
                <span class="fw-bold fs-4 lh-1 text-dark">{{ $dateDay }}</span>
                <span class="text-uppercase text-muted fw-bold" style="font-size: 0.75rem;">{{ $dateMonth }}</span>
            </div>
            
            {{-- Ubicación y Hora --}}
            <div class="d-flex flex-column justify-content-center text-secondary" style="font-size: 0.9rem;">
                <div class="mb-1">
                    <i class="bi bi-geo-alt me-1 text-muted"></i> {{ $location }}
                </div>
                <div>
                    <i class="bi bi-clock me-1 text-muted"></i> {{ $time }}
                </div>
            </div>
        </div>

        {{-- 4. Etiquetas (Categoría y Disponibilidad) --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            @if(isset($category))
                <span class="badge bg-light text-secondary border fw-normal px-2 py-1">{{ $category }}</span>
            @endif
            
            @if(isset($availability))
                <div class="d-flex align-items-center" style="font-size: 0.85rem;">
                    <i class="bi bi-circle-fill me-1 {{ $availabilityStatus == 'open' ? 'text-success' : 'text-danger' }}" style="font-size: 0.5rem;"></i>
                    <span class="text-secondary">{{ $availability }}</span>
                </div>
            @endif
        </div>

        {{-- 5. Sección Inferior (Precio, Ver Más, Botón) --}}
        <div class="mt-auto">
            
            {{-- Precio --}}
            @if(isset($price))
            <div class="text-center mb-2">
                 <span class="fw-bold fs-5 text-dark">${{ $price }}</span>
            </div>
            @endif

            {{-- Ver Más Detalles (Lo pediste arriba del botón) --}}
            <div class="text-center mb-3">
                <a href="{{ route('events.show', $id) }}" class="text-muted text-decoration-none" style="font-size: 0.9rem;">
                    Ver más detalles <i class="bi bi-chevron-right" style="font-size: 0.75rem;"></i>
                </a>
            </div>

            {{-- Botón de Acción (Comprar/Boleto) --}}
            <form action="{{ route('cart.add', $id) }}" method="POST">
                @csrf
                @php
                    // Lógica para el estilo del botón
                    $isTicket = str_contains(strtolower($actionText), 'boleto');
                    $buttonClass = $isTicket ? 'btn-info text-white border-info' : 'btn-outline-dark text-dark border-2';
                @endphp
                <button type="submit" class="btn {{ $buttonClass }} w-100 fw-bold py-2 rounded-3">
                    @if($isTicket)
                        <i class="bi bi-ticket-perforated me-1"></i>
                    @endif
                    {{ $actionText }}
                </button>
            </form>

        </div>
    </div>
</div>