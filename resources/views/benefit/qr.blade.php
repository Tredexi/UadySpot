{{-- resources/views/benefit/qr.blade.php --}}
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            
            <div class="modal-body text-center pb-5 px-5">
                <i class="bi bi-patch-check-fill text-success" style="font-size: 3rem;"></i>
                
                {{-- RESTAURADO: Estos IDs son vitales para el JavaScript --}}
                <h4 class="fw-bold mb-1 mt-2" id="modalProveedor">Cargando proveedor...</h4>
                <p class="text-muted mb-4" id="modalTitulo">Cargando beneficio...</p>

                <div class="bg-light p-3 rounded-4 d-inline-block mb-4 border">
                    {{-- Ponemos un QR de carga por defecto para que no salga la imagen rota --}}
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=UADY-SPOT-LOADING" 
                        id="modalQrImage" 
                        alt="Código QR de Validación" 
                        style="width: 200px; height: 200px;">
                </div>

                <p class="small text-muted mb-0">Muestra este código en caja antes de pagar para hacer válido tu descuento.</p>
            </div>
        </div>
    </div>
</div>