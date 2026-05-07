@extends('layout.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="admin-layout">

    
    {{-- CONTENIDO --}}
    <main class="admin-content">

        {{-- BOTÓN MENÚ (SOLO MÓVIL) --}}
        <button class="btn btn-dark admin-toggle mb-3" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        <h2 class="mb-4 fw-bold">Dashboard</h2>

        {{-- MÉTRICAS --}}
        <div class="row g-4 mb-4">

            <div class="col-md-4">
                <div class="admin-stat">
                    <div class="stat-icon icon-eventos">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 text-muted">Eventos</h6>
                        <h3 class="fw-bold mb-0">{{ $totalEventos }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="admin-stat">
                    <div class="stat-icon icon-beneficios">
                        <i class="bi bi-gift"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 text-muted">Beneficios</h6>
                        <h3 class="fw-bold mb-0">{{ $totalBeneficios }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="admin-stat">
                    <div class="stat-icon icon-trabajos">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 text-muted">Trabajos</h6>
                        <h3 class="fw-bold mb-0">{{ $totalTrabajos }}</h3>
                    </div>
                </div>
            </div>

        </div>

        {{-- GRÁFICA --}}
        <div class="admin-section mb-4">
            <h5 class="mb-3 fw-semibold">Resumen general</h5>
            <canvas id="graficaGeneral" height="100"></canvas>
        </div>

        {{-- ACTIVIDAD --}}
        <div class="admin-section">
            <h5 class="mb-3 fw-semibold">Actividad reciente</h5>

            <ul class="admin-activity">
                <li><i class="bi bi-plus-circle text-primary"></i> Evento agregado</li>
                <li><i class="bi bi-pencil text-warning"></i> Beneficio actualizado</li>
                <li><i class="bi bi-briefcase text-success"></i> Vacante publicada</li>
            </ul>
        </div>

    </main>

</div>

{{-- CHART --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('graficaGeneral');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Eventos', 'Beneficios', 'Trabajos'],
        datasets: [{
            label: 'Cantidad total',
            data: [
                {{ $totalEventos }},
                {{ $totalBeneficios }},
                {{ $totalTrabajos }}
            ],
            backgroundColor: [
                'rgba(30, 136, 229, 0.5)',
                'rgba(67, 160, 71, 0.5)',
                'rgba(251, 140, 0, 0.5)'
            ],
            borderColor: [
                '#1e88e5',
                '#43a047',
                '#fb8c00'
            ],
            borderWidth: 2
        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>

{{-- SIDEBAR TOGGLE --}}
<script>
function toggleSidebar() {
    document.querySelector('.admin-sidebar').classList.toggle('active');
}


</script>

@endsection