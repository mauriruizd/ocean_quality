<form action="{{ URL::to('api/banners/'.$banner->id) }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
    </div>
    <div class="modal-body">
        <div class="input-group">
            <label for="nombre">Titulo</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $banner->titulo }}" placeholder="Titulo" required>
        </div>
        <div class="input-group">
            <label for="nombre">Link</label>
            <input type="text" class="form-control" name="link" id="link" value="{{ $banner->link }}" placeholder="Link" required>
        </div>
        <div class="input-group">
            <label for="imagenes">Imagen</label>
            <input type="file" name="imagen" class="form-control imagenes">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="m-update">Guardar</button>
    </div>
</form>