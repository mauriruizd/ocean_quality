@extends('admin.index')
@section('titulo')
    Zonas
@stop
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Cadastro de Zonas
            </div>
            <div class="panel-body">
                <div class="form-inline">
                    <div class="row">
                        <div class="col-lg-12">

                        </div>
                        <div class="col-lg-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Departamento</th>
                                    <th>Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($zonas as $zona)
                                    <tr>
                                        <td>{{ $zona->id }}</td>
                                        <td>{{ $zona->nombre }}</td>
                                        <td><span class="depto_cod">
                                                {{ $zona->departamento->nombre }}
                                            </span></td>
                                        <td>
                                            <button class="btn btn-success m-edit" value="{{ $zona->id }}" data-target="#editModal" data-toggle="modal">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $zonas->render() !!}
                            </div>
                            <button class="btn btn-default btn-circle btn-lg text-center" data-target="#new" data-toggle="modal">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- BOOTSTRAP MODAL -->
                        <div id="new" class="modal fade" aria-labelledby="new" role="dialog" tabindex="1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ URL::to('api/zonas') }}" method="POST" class="dropzone" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                            <h4 class="modal-title" id="myModalLabel">Nueva producto</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                                            </div>
                                            <div class="input-group">
                                                <label for="subcat_cod">Departamento</label>
                                                <select name="depto_cod" id="depto_cod" class="form-control" required>
                                                    @foreach($departamentos as $departamento_cod => $departamento)
                                                        <option value="{{ $departamento_cod }}">{{ $departamento_cod.' - '.$departamento }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" id="m-submit">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="editModal" class="modal fade" aria-labelledby="editModal" role="dialog" tabindex="1" aria-hidden="true" style="display: none;">
                            <input type="hidden" id="editUrl" value="{{ URL::to('api/zonas').'/' }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" id="editForm" method="PUT">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                            <h4 class="modal-title" id="myModalLabel">Nueva producto</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" name="nombre" id="edit-nombre" placeholder="Nombre" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" id="m-update">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- FIN BOOTSTRAP MODAL -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')
    <script src="{{ URL::to('js/m-modal.js') }}"></script>
@stop