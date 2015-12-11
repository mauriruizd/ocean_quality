@extends('front.master')
@section('titulo')
    # Productos
@stop
@section('contenido')
    @if(count($productos) > 0)
        <div class="contenedor_pro">
            <div class="menu_delos_prod">

                <ul>
                    @foreach($productos as $producto)
                        <li>
                            <a href="#{{ $producto->slug }}">  ► {{ $producto->nombre }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="foto_produc">
                @foreach($productos as $producto)
                    <div class="titulo_prod"><h3><img src="{{ URL::to('img/flecha.png') }}"> {{ $producto->nombre }}</h3></div>
                    <div class="container" id="{{ $producto->slug }}">
                        <div class="col-md-8" >
                            <div class="col-md-4 fo">
                                <img src="{{ count($producto->imagenes) > 0 ? URL::to($producto->imagenes[0]->img_url) : '' }}">
                            </div>
                            <div class="col-md-4 fo1"><!--datos de foto-->
                                <div class="cuadr"><h4>• EPOCA</h4></div>
                                <div class="cuadr1"><h4>• CICLO PROMEDIO</h4></div>
                                <div class="cuadr1"><h4>• SEGMENTO</h4></div>
                                <div class="cuadr1"><h4>• ENVASE</h4></div>
                                <div class="cuadr1"><h4>• PROVEDOR</h4></div>

                            </div><!--datos de foto-->

                            <div class="col-md-4 fo1"><!--datos de foto-->
                                <div class="cuadr"><h4> {{ $producto->epoca }}</h4></div>
                                <div class="cuadr1"><h4> {{ $producto->ciclo_promedio }}</h4></div>
                                <div class="cuadr1"><h4> {{ $producto->segmento }}</h4></div>
                                <div class="cuadr1"><h4> {{ $producto->envase }}</h4></div>
                                <div class="cuadr1">
                                    <ol>
                                        @foreach($producto->proveedorProducto as $prov)
                                            <li>{{ $prov->proveedor->nombre }}</li>
                                        @endforeach
                                    </ol>
                                </div>

                            </div><!--datos de foto-->

                        </div>

                        <div class="col-md-8">
                            <div class="carac">
                                <h4>• CARACTERISTICAS GENERALES</h4>
                            </div>

                            <div class="carac1">
                                {{ $producto->descripcion }}
                            </div>

                        </div>
                    </div><!--container-->
                @endforeach
            </div><!--foto_produc-->
        </div><!--contenedor_pro-->
    @else
        <h1>No hay productos en esta subcategoria</h1>
    @endif
@stop
@section('includes')
    <script src="{{ URL::to('js/jquery.scrollTo.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            $('.menu_delos_prod:first li').click(function(e) {
                e.preventDefault();
                var id = $(this).children('a').attr('href');
                var elm = $(id).prev();
                console.log(elm);
                $('.foto_produc:first').scrollTo(elm, 200);
            });
        });
    </script>
@stop