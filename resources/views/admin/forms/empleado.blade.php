<form action="{{ URL::to('api/empleados/'.$empleado->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
    </div>
    <div class="modal-body">
        <div class="input-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required value="{{ $empleado->nombre }}">
        </div>
        <div class="input-group">
            <label for="correos">Correos electronicos</label> Separados por coma
            <input type="text" class="form-control" name="correos" placeholder="Correos" required value="{{ implode(', ', $correos) }}">
        </div>
        <div class="input-group">
            <label for="telefonos">Telefonos</label> Separados por coma
            <input type="text" class="form-control" name="telefonos" placeholder="Telefonos" required value="{{ implode(', ', $telefonos) }}">
        </div>
        <div class="input-group">
            <label for="subcat_cod">Zona</label>
            <select name="zona_cod" id="zona_cod" class="form-control" required>
                @foreach($zonas as $zona)
                    <option value="{{ $zona->id }}" {{ ($empleado->zona_cod === $zona->id) ? 'selected' : '' }}>{{ $zona->nombre.' ('.$zona->departamento->nombre.')' }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="m-update">Guardar</button>
    </div>
</form>