<div class="modal fade" id="modal-create-weather">
    <form action="{{ route('company.content.createInfo') }}" method="post" class="modal-dialog" data-info="reset" enctype="multipart/form-data" data-sync="no">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="section_id" value="6">
            <div class="form-group">
                <input type="number" name="content_2" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="content_1" id="" cols="30" rows="10" class="ckeditor" placeholder="Contenido"></textarea>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>