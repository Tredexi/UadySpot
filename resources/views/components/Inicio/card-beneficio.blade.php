@props(['id', 'descuento', 'imagen', 'alt', 'titulo', 'subtitulo', 'etiqueta'])

{{-- Envolvemos en un link para que toda la card sea cliqueable --}}
<a href="{{ route('benefits.index', ['search' => $titulo]) }}" class="text-decoration-none text-reset">
    <div class="benefit-card">
        <span class="discount-badge">{{ $descuento }}</span>
        
        {{-- Cargamos la imagen desde tu carpeta public/ con asset() --}}
        <img src="{{ asset($imagen) }}" alt="{{ $alt }}">
        
        <div class="benefit-content">
            <h3>{{ $titulo }}</h3>
            <p>{{ $subtitulo }}</p>
            
            {{-- Solo mostramos el tag si el beneficio lo tiene en la BD --}}
            @if($etiqueta)
                <span class="benefit-only">{{ $etiqueta }}</span>
            @endif
        </div>
    </div>
</a>