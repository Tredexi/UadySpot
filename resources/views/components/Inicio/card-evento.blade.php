@props(['campus'])

<div class="event-card" data-campus="{{ $campus }}">
    {{ $imagen }}

    <div class="event-body">
        <h3>{{ $titulo }}</h3>
        <p class="event-date">{{$fechaI."-".$fechaF." ".$mes." del ".$anio}}</p>
        <p class="event-price">{{$costo}}</p>
        @if(isset($etiqueta))
            <span class="event-tag">{{ $etiqueta }}</span>
        @endif
        {{ $slot }}
    </div>
</div>