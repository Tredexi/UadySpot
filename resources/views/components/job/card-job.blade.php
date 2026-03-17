@props([
    'id',
    'title',
    'company',
    'location',
    'salary',
    'type',
    'modality',
    'postedAt',
    'isNew' => false,
    'urgent' => false,
    'description'
])

<div class="card job-card rounded-3 mb-3 p-4 shadow-sm">
    <div class="row">
        <div class="col-md-9">
            
            {{-- Título y Etiqueta Nuevo --}}
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="#" class="job-title fs-5 fw-bold text-decoration-none" style="color: var(--uady-blue, #002E5F);">
                    {{ $title }}
                </a>
                @if($isNew)
                    <span class="badge bg-danger rounded-pill" style="font-size: 0.7rem;">Nuevo</span>
                @endif
            </div>
            
            {{-- Empresa --}}
            <p class="mb-2 text-dark fw-medium">
                {{ $company }} 
                <span class="text-muted fw-normal ms-1">
                    <i class="bi bi-star-fill text-warning" style="font-size: 0.8rem;"></i> 4.5
                </span>
            </p>
            
            {{-- Ubicación y Salario --}}
            <div class="d-flex flex-wrap gap-3 mb-3 text-secondary small">
                <div><i class="bi bi-geo-alt me-1"></i>{{ $location }}</div>
                <div><i class="bi bi-cash me-1"></i>{{ $salary }}</div>
            </div>

            {{-- Etiquetas de Tipo, Modalidad y Urgencia --}}
            <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge bg-light text-dark border fw-normal">
                    <i class="bi bi-briefcase me-1 text-muted"></i>{{ $type }}
                </span>
                <span class="badge bg-light text-dark border fw-normal">
                    <i class="bi bi-laptop me-1 text-muted"></i>{{ $modality }}
                </span>
                @if($urgent)
                    <span class="badge bg-warning bg-opacity-10 text-dark border border-warning fw-normal">
                        <i class="bi bi-lightning-charge-fill text-warning me-1"></i>Contratación urgente
                    </span>
                @endif
            </div>

            {{-- Descripción --}}
            <p class="text-muted small mb-0 ps-2" style="border-left: 3px solid #e0e0e0;">
                {{ $description }}
            </p>
        </div>
        
        {{-- Columna Derecha: Botones y Fecha --}}
        <div class="col-md-3 d-flex flex-column justify-content-between align-items-end mt-3 mt-md-0">
            <button class="btn btn-light rounded-circle text-muted shadow-sm border" style="width: 40px; height: 40px;" title="Guardar empleo">
                <i class="bi bi-heart"></i>
            </button>
            
            <div class="text-end">
                <p class="small text-muted mb-2">{{ $postedAt }}</p>
                {{-- Aquí puedes usar el ID para la ruta real de postulación --}}
                <a href="#" class="btn btn-sm fw-bold px-3 py-2" style="background-color: var(--uady-gold, #CBA052); color: var(--uady-blue, #002E5F);">
                    Postulación rápida
                </a>
            </div>
        </div>
    </div>
</div>