<footer class="mt-5">
    <div class="container py-5">
        <div class="row text-start">

            <!-- Marca -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold  mb-3" style="color: var(--uady-white); letter-spacing: 1px;">
                    UADY SPOT
                </h5>
                <p class="small text-light mb-3" style="line-height: 1.6;">
                    Plataforma digital universitaria para la gestión y difusión de eventos académicos y estudiantiles.
                </p>
                <div class="small text-light" style="opacity: 0.85;">
                    <div class="mb-1 fw-semibold">Universidad Autónoma de Yucatán</div>
                    <div>Mérida, Yucatán, México</div>
                </div>
            </div>

            <!-- Enlaces -->
            <div class="col-md-4 mb-4 footer-divider ps-md-4">
                <h6 class="fw-bold text-white">Servicios Universitarios</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('events.index') }}" class="footer-link">Publicar Evento</a></li>
                    <li><a href="#" class="footer-link">Calendario Académico</a></li>
                    <li><a href="#" class="footer-link">Convocatorias</a></li>
                    <li><a href="{{ route('jobs.index') }}" class="footer-link">Bolsa Universitaria</a></li>
                    <li><a href="#" class="footer-link">Reglamento</a></li>
                </ul>
            </div>

            <!-- Redes -->
            <div class="col-md-4 mb-4 footer-divider ps-md-4">
                <h6 class="fw-bold text-white">Redes Oficiales</h6>
                <div class="d-flex flex-wrap gap-3 fs-5">

                    <a href="https://www.facebook.com/face.uady/" target="_blank" class="footer-icon" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://comunicacion.uady.mx/radio--universidad/bienvenida" target="_blank" class="footer-icon" title="Radio Universidad">
                        <i class="bi bi-broadcast"></i>
                    </a>

                    <a href="https://www.tiktok.com/@uadyinstitucional?is_from_webapp=1&sender_device=pc" target="_blank" class="footer-icon" title="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>

                    <a href="https://www.youtube.com/user/UADYInstitucional" target="_blank" class="footer-icon" title="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>

                    <a href="https://www.instagram.com/uady_institucional/" target="_blank" class="footer-icon" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="https://x.com/UADYoficial" target="_blank" class="footer-icon" title="X">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="https://www.linkedin.com/company/uadyinstitucional" target="_blank" class="footer-icon" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>

                </div>
            </div>
        </div>

<hr class="border-secondary">
<div class="text-center mt-4">

    <!-- Logo centrado -->
    <img src="{{ asset('Imagenes/logo_uady.png') }}" 
        alt="Logo UADY Spot" 
        class="rounded-circle shadow-sm mb-3"
        style="width: 70px; height: 70px; border: 3px solid var(--uady-gold);">

    <!-- Texto con eslogan -->
    <div class="small text-secondary">
        © {{ date('Y') }} UADY SPOT — Conectando mentes, uniendo jaguares.
    </div>

</div>
</footer>