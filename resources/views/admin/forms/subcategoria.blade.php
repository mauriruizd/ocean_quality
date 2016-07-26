<form action="{{ URL::to('api/subcategorias/'.$subcategoria->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="subcat_id" id="subcat_id" value="{{ $subcategoria->id }}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title" id="myModalLabel">Editar Subcategoria</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="edit-nombre" value="{{ $subcategoria->nombre }}" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <label for="edit_cat_cod">Categoria</label>
            <select name="cat_cod" id="edit_cat_cod" class="form-control">
                @foreach($categorias as $cod_cat => $nom_categoria)
                    <option value="{{ $cod_cat }}" {{ ($cod_cat == $subcategoria->cat_cod) ? 'selected' : '' }}>{{ $nom_categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="edit_subcat_padre_cod">Subcategoría Padre</label>
            <select name="subcat_padre_cod" id="edit_subcat_padre_cod" class="form-control">
                <option value="0">Sin categoria padre</option>
                @foreach($listaSubcategorias as $cod_subcat => $nom_subcategoria)
                    <option value="{{ $cod_subcat }}" {{ $cod_subcat == $subcategoria->subcat_padre_cod ? 'selected' : '' }}>{{ $nom_subcategoria }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="m-update">Guardar</button>
    </div>
    <script>
        (function() {
            $('#edit_cat_cod').on('change', function() {
                $.ajax({
                    url: "{{ url('/') }}/api/categorias/" + $(this).val() + "/subcategorias",
                    method: "GET",
                    success: function(res) {
                        var html = '<option value="0">Sin categoria padre</option>';
                        var subcatId = $('#subcat_id').val();
                        for(var i = 0; i < res.length; i++) {
                            if (res[i].id != subcatId) {
                                html += "<option value='" + res[i].id + "'>" + res[i].nombre + "</option>";
                            }
                        }
                        $('#edit_subcat_padre_cod').html(html);
                    }
                });
            });
        })();
    </script>
</form>