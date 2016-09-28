<form action="{{ URL::to('api/productos/'.$producto->id) }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
    </div>
    <div class="modal-body">
        <div class="input-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required value="{{ $producto->nombre }}">
        </div>
        <div class="input-group">
            <label for="cat_cod">Categoria</label>
            <select name="cat_cod" id="cat_cod" class="form-control">
                <option value="0">--Seleccione Categoria--</option>
                @foreach($categorias as $cat_cod => $nom_categoria)
                    <option value="{{ $cat_cod }}" {{ $cat_cod == $producto->cat_cod ? 'selected' : '' }}>{{ $nom_categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group">
            <label for="subcat_cod">Subcategoria</label>
            <select name="subcat_cod" id="subcat_cod" class="form-control" required>
                @foreach($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}" class="subcat cat-{{ $subcategoria->cat_cod }}" {{ $subcategoria->id === $producto->subcategoria->id ? 'selected' : '' }}>{{ $subcategoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group">
            <label for="proveedores[]">Proveedores</label><br>
            @foreach($proveedores as $cod_proveedor => $nom_proveedor)
                <div class="checkbox">
                    <label><input type="checkbox" name="proveedores[]" value="{{ $cod_proveedor }}" {{ in_array($cod_proveedor, $proveedoresProd) ? 'checked' : '' }}>{{ $nom_proveedor }}</label>
                </div>
            @endforeach
        </div>
        <div class="input-group">
            <label for="descripcion">Descripcion </label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5" required class="form-control">{{ $producto->descripcion }}</textarea>
        </div>
        <div class="input-group">
            <label for="epoca">Epoca recomendada </label>
            <input type="text" class="form-control" name="epoca" id="epoca" placeholder="Epoca" value="{{ $producto->epoca }}">
        </div>
        <div class="input-group">
            <label for="epoca">Categoría (Adicional) </label>
            <input type="text" class="form-control" name="variedad" id="variedad" placeholder="Variedad" value="{{ $producto->variedad }}">
        </div>
        <div class="input-group">
            <label for="ciclo_promedio">Ciclo Promedio </label>
            <input type="text" class="form-control" name="ciclo_promedio" id="ciclo_promedio" placeholder="Ciclo Promedio" value="{{ $producto->ciclo_promedio }}">
        </div>
        <div class="input-group">
            <label for="segmento">Segmento </label>
            <input type="text" class="form-control" name="segmento" id="segmento" placeholder="Segmento" value="{{ $producto->segmento }}">
        </div>
        <div class="input-group">
            <label for="nombre">Envase </label>
            <input type="text" class="form-control" name="envase" id="envase" placeholder="Envase" value="{{ $producto->envase }}">
        </div>
        <div class="input-group">
            @foreach($producto->imagenes as $imagen)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="imagenes_antiguas[]" value="{{ $imagen->id }}" checked>
                        <img src="{{ URL::to($imagen->img_url) }}" class="img-rounded" width="60px" height="60px">
                    </label>
                </div>
            @endforeach
        </div>
        <div class="input-group">
            <label for="imagenes">Imagenes</label>
            <input type="file" name="imagenes[]" class="form-control imagenes">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="m-update">Guardar</button>
    </div>
</form>