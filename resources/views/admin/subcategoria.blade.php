@extends('admin.index')
@section('titulo')
    Subcategorias
@stop
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Cadastro de Subcategorias
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
                                    <th>Categoria</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subcategorias as $subcategoria)
                                    <tr>
                                        <td>{{ $subcategoria->id }}</td>
                                        <td>{{ $subcategoria->nombre }}</td>
                                        <td>{{ $subcategoria->categoria->nombre }}</td>
                                        <td>
                                            <button class="btn btn-success m-edit" value="{{ $subcategoria->id }}" data-target="#editModal" data-toggle="modal">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{ URL::to('api/subcategorias/'.$subcategoria->id) }}" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="_method" value="delete">
                                                <button type="button" class="btn btn-danger btn-delete">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $subcategorias->render() !!}
                            </div>
                            <button class="btn btn-default btn-circle btn-lg text-center" data-target="#new" data-toggle="modal">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- BOOTSTRAP MODAL -->
                        <div id="new" class="modal fade" aria-labelledby="new" role="dialog" tabindex="1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ URL::to('api/subcategorias') }}" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                            <h4 class="modal-title" id="myModalLabel">Nueva Subcategoria</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cat_cod">Categoria</label>
                                                <select name="cat_cod" id="cat_cod" class="form-control">
                                                    @foreach($categorias as $cod_cat => $nom_categoria)
                                                        <option value="{{ $cod_cat }}">{{ $nom_categoria }}</option>
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
                            <input type="hidden" id="editUrl" value="{{ URL::to('api/subcategorias').'/' }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" id="editForm" method="PUT">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                            <h4 class="modal-title" id="myModalLabel">Nueva Subcategoria</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group">
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
    <script>
        var errorMsg = 'Hubo un error al eliminar la subcategoria! Posiblemente tenga productos asociados a la misma.';
    </script>
@stop