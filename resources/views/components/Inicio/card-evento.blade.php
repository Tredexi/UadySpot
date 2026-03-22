@props(['campus', 'titulo', 'imagen', 'fechaI', 'mes', 'id', 'precio', 'anio' => '2026'])

<div class="event-card" data-campus="{{ $campus }}">
    {{-- Mostramos la imagen usando asset() --}}
    <img src="{{ asset($imagen) }}" alt="{{ $titulo }}" class="event-img">

    <div class="event-body">
        <h3>{{ $titulo }}</h3>
        
        {{-- Aquí solo usamos lo que tenemos: dia y mes --}}
        <p class="event-date">{{ $fechaI }} {{ $mes }} {{ $anio }}</p>
        
        {{-- Usamos precio en lugar de costo --}}
        <p class="event-price">
            {{ $precio > 0 ? '$' . number_format($precio, 2) . ' MXN' : 'Entrada gratuita' }}
        </p>

        @if(isset($etiqueta))
            <span class="event-tag">{{ $etiqueta }}</span>
        @endif

        {{-- Botón para ir al detalle --}}
        <div class="mt-3">
            <a href="{{ route('events.show', $id) }}" class="btn btn-sm btn-outline-primary">Ver más</a>
        </div>

        {{ $slot }}
    </div>
</div>