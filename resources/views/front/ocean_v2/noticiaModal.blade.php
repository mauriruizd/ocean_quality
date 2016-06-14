<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="text_azul">{{ $noticia->titulo }}</h3>
        </div>
        <div class="modal-body">
            @foreach($noticia->imagenes as $imagen)
                <img src="{{ $imagen->img_url }}" alt="{{ $noticia->titulo }}" class="img-rounded" height="150px">
            @endforeach
            <p>
                {{ $noticia->cuerpo }}
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        </div>
    </div>
</div>