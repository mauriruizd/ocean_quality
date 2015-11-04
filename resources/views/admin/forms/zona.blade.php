<form action="{{ URL::to('api/zonas/'.$zona->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
    </div>
    <div class="modal-body">
        <div class="input-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $zona->nombre }}" placeholder="Nombre" required>
        </div>
        <div class="input-group">
            <label for="subcat_cod">Departamento</label>
            <select name="depto_cod" id="depto_cod" class="form-control" required>
                @foreach($departamentos as $departamento_cod => $departamento)
                    <option value="{{ $departamento_cod }}" {{ ($zona->depto_cod === $departamento_cod) ? 'selected' : '' }}>{{ $departamento_cod.' - '.$departamento }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="m-update">Guardar</button>
    </div>
</form>