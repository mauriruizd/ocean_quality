@extends('front.master')
@section('titulo')
    # Busqueda
@stop
@section('contenido')
    <style>
        .search-item{
            margin-bottom: 8px;
            box-shadow: 0 3px 3px rgba(0,0,0,0.3);
        }
        .pagination li span{
            width: auto;
            height : auto;
        }
    </style>
    @if(count($productos) > 0)
        @foreach($productos as $producto)
            <div class="row search-item">
                <div class="col col-lg-3">
                    <img src="{{ count($producto->imagenes) > 0 ? URL::to($producto->imagenes[0]->img_url) : ''  }}" class="img-thumbnail" width="250" height="200">
                </div>
                <div class="col col-lg-9">
                    <div class="row">
                        <h2><a href="{{ URL::to('productos/'.$producto->cat_cod.'/'.$producto->subcat_cod) }}">
                                {{ $producto->nombre }}
                            </a></h2>
                    </div>
                    <div class="row">
                        <p>
                            {{ $producto->descripcion }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
            {!! $productos->render() !!}
        </div>
    @else
        <h1>Ningún producto encontrado</h1>
    @endif
@stop