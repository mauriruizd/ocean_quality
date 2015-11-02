@extends('admin.index')
@section('titulo')
    Productos
@stop
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Cadastro de Productos
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
                                @foreach($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td><span class="depto_cod">
                                                {{ $producto->depto_cod }}
                                            </span></td>
                                        <td>
                                            <button class="btn btn-success m-edit" value="{{ $producto->id }}" data-target="#editModal" data-toggle="modal">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $productos->render() !!}
                            </div>
                            <button class="btn btn-default btn-circle btn-lg text-center" data-target="#new" data-toggle="modal">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- BOOTSTRAP MODAL -->
                        <div id="new" class="modal fade" aria-labelledby="new" role="dialog" tabindex="1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ URL::to('api/productos') }}" method="POST" class="dropzone" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Nueva producto</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                                            </div>
                                            <div class="input-group">
                                                <label for="cat_cod">Categoria</label>
                                                <select name="cat_cod" id="cat_cod" class="form-control">
                                                    <option value="0">--Seleccione Categoria--</option>
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <label for="subcat_cod">Subcategoria</label>
                                                <select name="subcat_cod" id="subcat_cod" class="form-control" disabled required>
                                                    @foreach($subcategorias as $subcategoria)
                                                        <option value="{{ $subcategoria->id }}" class="subcat cat-{{ $subcategoria->cat_cod }}">{{ $subcategoria->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <label for="descripcion">Descripcion: </label>
                                                <textarea name="descripcion" id="descripcion" cols="30" rows="5" required class="form-control"></textarea>
                                            </div>
                                            <div class="input-group">
                                                <label for="imagenes">Imagenes</label>
                                                <input type="file" name="imagenes[]" class="form-control imagenes">
                                                <button type="button" id="m-more-images" class="btn btn-circle btn-sm btn-success">
                                                    <i class="fa fa-plus"></i>
                                                </button>
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
                            <input type="hidden" id="editUrl" value="{{ URL::to('api/productos').'/' }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" id="editForm" method="PUT">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
    <script>
        (function(){
            var deptos_py = [
                {
                    cod : 1,
                    nombre : 'Concepcion'
                },
                {
                    cod : 2,
                    nombre : 'San Pedro'
                },
                {
                    cod : 3,
                    nombre : 'Cordillera'
                },
                {
                    cod : 4,
                    nombre : 'Guairá'
                },
                {
                    cod : 5,
                    nombre : 'Caaguazú'
                },
                {
                    cod : 6,
                    nombre : 'Caazapá'
                },
                {
                    cod : 7,
                    nombre : 'Itapúa'
                },
                {
                    cod : 8,
                    nombre : 'Misiones'
                },
                {
                    cod : 9,
                    nombre : 'Paraguarí'
                },
                {
                    cod : 10,
                    nombre : 'Alto Paraná'
                },
                {
                    cod : 11,
                    nombre : 'Central'
                },
                {
                    cod : 12,
                    nombre : 'Ñeembucú'
                },
                {
                    cod : 13,
                    nombre : 'Amambay'
                },
                {
                    cod : 14,
                    nombre : 'Canindeyú'
                },
                {
                    cod : 15,
                    nombre : 'Presidente Hayes'
                },
                {
                    cod : 16,
                    nombre : 'Boquerón'
                },
                {
                    cod : 17,
                    nombre : 'Alto Paraguay'
                }
            ];

            function findById(id) {
                for(var i = 0; i < deptos_py.length; i++) {
                    if(deptos_py[i].id == id) {
                        return deptos_py[i].nombre;
                    }
                }
                return '';
            }

            function findNameById(id) {
                return findById(id).nombre;
            }

            $('.depto_cod').each(function() {
                var thisHtml = $(this).html();
                $(this).html(findNameById(thisHtml));
            });
        })();
    </script>
@stop