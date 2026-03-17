<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            
            {{-- Botón de cerrar --}}
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            
            {{-- Cuerpo del modal --}}
            <div class="modal-body text-center pb-5 px-5">
                <i class="bi bi-patch-check-fill text-success" style="font-size: 3rem;"></i>
                
                {{-- Estos textos se cambiarán con Javascript --}}
                <h4 class="fw-bold mb-1 mt-2" id="modalProveedor">Nombre del Proveedor</h4>
                <p class="text-muted mb-4" id="modalTitulo">Título del Beneficio</p>

                {{-- Contenedor del QR --}}
                <div class="bg-light p-3 rounded-4 d-inline-block mb-4 border">
                    <img src="" id="modalQrImage" alt="Código QR" style="width: 200px; height: 200px;">
                </div>

                <p class="small text-muted mb-0">Muestra este código en caja antes de pagar para hacer válido tu descuento.</p>
            </div>
            
        </div>
    </div>
</div>