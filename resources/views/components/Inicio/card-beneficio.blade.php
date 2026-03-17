@props(['descuento', 'imagen', 'alt', 'titulo', 'subtitulo', 'etiqueta'])

<div class="benefit-card">
    <span class="discount-badge">{{ $descuento }}</span>
    <img src="{{ asset($imagen) }}" alt="{{ $alt }}">
    <div class="benefit-content">
        <h3>{{ $titulo }}</h3>
        <p>{{ $subtitulo }}</p>
        <span class="benefit-only">{{ $etiqueta }}</span>
    </div>
</div>