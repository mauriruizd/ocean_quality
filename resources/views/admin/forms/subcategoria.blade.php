<form action="{{ URL::to('api/subcategorias/'.$subcategoria->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Editar Subcategoria</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="edit-nombre" value="{{ $subcategoria->nombre }}" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <label for="cat_cod">Categoria</label>
            <select name="cat_cod" id="cat_cod" class="form-control">
                @foreach($categorias as $cod_cat => $nom_categoria)
                    <option value="{{ $cod_cat }}" {{ ($cod_cat == $subcategoria->cat_cod) ? 'selected' : '' }}>{{ $nom_categoria }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="m-update">Guardar</button>
    </div>
</form>