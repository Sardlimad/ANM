<!-- Vertically centered Modal -->
<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@yield('modal_title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row modal-body">
                @yield('modal_body')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <input type="submit" form="@yield('form')" class="btn btn-primary" value="Aceptar">
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
