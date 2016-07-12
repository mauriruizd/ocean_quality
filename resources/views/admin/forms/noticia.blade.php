<form action="{{ URL::to('api/noticias/'.$noticia->id) }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">Editar Noticia</h4>
    </div>
    <div class="modal-body">
        <div class="input-group">
            <label for="nombre">Titulo</label>
            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" required value="{{ $noticia->titulo }}">
        </div>
        <div class="input-group">
            <label for="cuerpo">Cuerpo</label>
            <textarea name="cuerpo" id="cuerpo" cols="100" rows="10" class="form-control" required>{{ $noticia->cuerpo }}</textarea>
        </div>
        @foreach($noticia->imagenes as $imagen)
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="imagenes_antiguas[]" value="{{ $imagen->id }}" checked>
                    <img src="{{ URL::to($imagen->img_url) }}" class="img-rounded" width="60px" height="60px">
                </label>
            </div>
        @endforeach
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
        <button type="button" class="btn btn-primary" id="m-update">Guardar</button>
    </div>
</form>