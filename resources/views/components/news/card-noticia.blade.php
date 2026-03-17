@props([
    'categoria',
    'titulo',
    'desc',
    'autor',
    'fecha',
    'tiempoLectura',
    'img',
    'etiquetaEspecial' => null,
    'url' => '#'
])

<div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden d-flex flex-column" style="transition: transform 0.2s ease, box-shadow 0.2s ease;">
    
    {{-- Contenedor de la Imagen con etiquetas flotantes --}}
    <div class="position-relative w-100">
        {{-- Agregamos w-100 para asegurar que la imagen nunca desborde a lo ancho --}}
        <img src="{{ asset($img) }}" alt="{{ $titulo }}" class="card-img-top w-100 object-fit-cover" style="height: 220px;">
        
        {{-- Etiqueta de Categoría (Izquierda) --}}
        <div class="position-absolute top-0 start-0 m-3 z-2">
            <span class="badge bg-primary px-3 py-2 rounded-pill shadow-sm fw-medium text-uppercase" style="font-size: 0.75rem;">
                {{ $categoria }}
            </span>
        </div>

        {{-- Etiqueta Especial Opcional (Derecha) --}}
        @if($etiquetaEspecial)
            <div class="position-absolute top-0 end-0 m-3 z-2">
                @php
                    $color = $etiquetaEspecial == 'Urgente' ? 'bg-danger' : ($etiquetaEspecial == 'Destacado' ? 'bg-warning text-dark' : 'bg-dark text-white');
                @endphp
                <span class="badge {{ $color }} px-3 py-2 rounded-pill shadow-sm fw-bold">
                    <i class="bi bi-star-fill me-1"></i> {{ $etiquetaEspecial }}
                </span>
            </div>
        @endif
    </div>

    {{-- Cuerpo de la Noticia --}}
    <div class="card-body d-flex flex-column p-4 w-100">
        
        {{-- FLEX-GROW-1: Este div envuelve el texto y "crece" para empujar el footer siempre hasta abajo --}}
        <div class="flex-grow-1">
            {{-- Metadatos: Fecha y Tiempo de lectura --}}
            <div class="d-flex align-items-center text-muted small mb-3 gap-3">
                <span><i class="bi bi-calendar3 me-1"></i> {{ $fecha }}</span>
                <span><i class="bi bi-clock me-1"></i> {{ $tiempoLectura }}</span>
            </div>

            {{-- Título (Le agregamos line-clamp de 2 líneas para que un título largo no descuadre las tarjetas) --}}
            <h4 class="card-title fw-bold mb-3" style="color: var(--uady-blue, #002E5F); line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                {{ $titulo }}
            </h4>
            
            {{-- Descripción (Se mantiene el line-clamp de 3) --}}
            <p class="card-text text-secondary mb-4" style="font-size: 0.95rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                {{ $desc }}
            </p>
        </div>

        {{-- Footer de la tarjeta: Autor y Botón --}}
        <div class="mt-auto d-flex align-items-center justify-content-between border-top pt-3 w-100">
            
            {{-- Contenedor del autor con 'overflow-hidden' para textos largos --}}
            <div class="d-flex align-items-center gap-2 overflow-hidden me-2">
                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-primary fw-bold flex-shrink-0" style="width: 35px; height: 35px;">
                    {{ substr($autor, 0, 1) }}
                </div>
                {{-- text-truncate le pone "..." si el nombre del autor es demasiado largo --}}
                <span class="text-muted small fw-medium text-truncate">{{ $autor }}</span>
            </div>
            
            {{-- flex-shrink-0 evita que el botón se aplaste --}}
            <a href="{{ $url }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold flex-shrink-0">
                Leer más <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

    </div>
</div>