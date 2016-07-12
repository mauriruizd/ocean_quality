@extends('admin.index')
@section('titulo')
    Noticias
@stop
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Cadastro de Noticias
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
                                    <th>Titulo</th>
                                    <th>Cuerpo</th>
                                    <th style="max-width: 280px;">Imagenes</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($noticias as $noticia)
                                    <tr>
                                        <td>{{ $noticia->id }}</td>
                                        <td>{{ $noticia->titulo }}</td>
                                        <td>{{ substr($noticia->cuerpo, 0, 250) }}...</td>
                                        <td>
                                            @foreach($noticia->imagenes as $imagen)
                                                <img src="{{ URL::to($imagen->img_url) }}" alt="{{ $noticia->nombre }}" class="img-rounded" width="60px" height="60px">
                                            @endforeach
                                        </td>
                                        <td>
                                            <button class="btn btn-success m-edit" value="{{ $noticia->id }}" data-target="#editModal" data-toggle="modal">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{ URL::to('api/noticias/'.$noticia->id) }}" method="POST">
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
                                {!! $noticias->render() !!}
                            </div>
                            <button class="btn btn-default btn-circle btn-lg text-center" data-target="#new" data-toggle="modal">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- BOOTSTRAP MODAL -->
                        <div id="new" class="modal fade" aria-labelledby="new" role="dialog" tabindex="1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ URL::to('api/noticias') }}" method="POST" class="dropzone" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                            <h4 class="modal-title" id="myModalLabel">Nueva producto</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group">
                                                <label for="nombre">Titulo</label>
                                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" required>
                                            </div>
                                            <div class="input-group">
                                                <label for="cuerpo">Cuerpo</label>
                                                <textarea name="cuerpo" id="cuerpo" cols="100" rows="10" class="form-control" required></textarea>
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
                            <input type="hidden" id="editUrl" value="{{ URL::to('api/noticias').'/' }}">
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