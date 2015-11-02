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
                                    <th>Categoria</th>
                                    <th>Subcategoria</th>
                                    <th>Proveedores</th>
                                    <th style="width: 100px">Descripcion</th>
                                    <th>Epoca</th>
                                    <th>Ciclo Promedio</th>
                                    <th>Segmento</th>
                                    <th>Envase</th>
                                    <th style="max-width: 280px;">Imagenes</th>
                                    <th>Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->categoria->nombre }}</td>
                                        <td>{{ $producto->subcategoria->nombre }}</td>
                                        <td>
                                            <ul class="list-group">
                                            @foreach($producto->proveedorProducto as $provProd)
                                                <li class="list-group-item">{{ $provProd->nombre }}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ strlen($producto->descripcion) < 50 ? $producto->descripcion : substr($producto->descripcion, 0, 50).'...'  }}</td>
                                        <td>{{ $producto->epoca }}</td>
                                        <td>{{ $producto->ciclo_promedio }}</td>
                                        <td>{{ $producto->segmento }}</td>
                                        <td>{{ $producto->envase }}</td>
                                        <td>
                                            @foreach($producto->imagenes as $imagen)
                                                <img src="{{ URL::to($imagen->img_url) }}" alt="{{ $producto->nombre }}" class="img-rounded" width="60px" height="60px">
                                            @endforeach
                                        </td>
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
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
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
                                                    @foreach($categorias as $cod_cat => $nom_categoria)
                                                        <option value="{{ $cod_cat }}">{{ $nom_categoria }}</option>
                                                    @endforeach
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
                                                <label for="proveedores[]">Proveedores</label><br>
                                                @foreach($proveedores as $cod_proveedor => $nom_proveedor)
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="proveedores[]" value="{{ $cod_proveedor }}">{{ $nom_proveedor }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="input-group">
                                                <label for="descripcion">Descripcion: </label>
                                                <textarea name="descripcion" id="descripcion" cols="30" rows="5" required class="form-control"></textarea>
                                            </div>
                                            <div class="input-group">
                                                <label for="epoca">Epoca</label>
                                                <input type="text" class="form-control" name="epoca" id="epoca" placeholder="Epoca" required>
                                            </div>
                                            <div class="input-group">
                                                <label for="ciclo_promedio">Ciclo Promedio</label>
                                                <input type="text" class="form-control" name="ciclo_promedio" id="ciclo_promedio" placeholder="Ciclo Promedio" required>
                                            </div>
                                            <div class="input-group">
                                                <label for="segmento">Segmento</label>
                                                <input type="text" class="form-control" name="segmento" id="segmento" placeholder="Segmento" required>
                                            </div>
                                            <div class="input-group">
                                                <label for="nombre">Envase</label>
                                                <input type="text" class="form-control" name="envase" id="envase" placeholder="Envase" required>
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
    <script>
        $('#cat_cod').on('change', function(){
            if($(this).val() == 0){
                $('#subcat_cod').attr('disabled', true);
                return;
            }
            $('#subcat_cod').attr('disabled', false);
            $('.subcat').each(function(){
                if($(this).parent().prop('tagName').toLowerCase() == 'span'){
                    $(this).unwrap('<span/>');
                }
            });
            $('.subcat').wrap('<span/>');
            $('.cat-' + $(this).val()).unwrap('<span/>');
        });
        $('#m-more-images').on('click', function(){
            $(this).parent().append($(this).prev()[0].outerHTML);
        });

        //nuevo
        (function(){
            var button = $('#m-submit');
            var form = button.closest('form');
            var url = form.attr('action');
            var method = form.attr('method');
            function save(){
                $.ajax({
                    method : method,
                    url : url,
                    data : new FormData(form[0]),
                    enctype : 'multipart/form-data',
                    processData : false,
                    contentType : false,
                    success : function(response){
                        //location.reload();
                        console.log(response);
                    }
                });
            }

            button.on('click', save);
        })();
    </script>
@stop