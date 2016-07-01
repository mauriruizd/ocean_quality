@extends('front.master2')
@section('titulo', '# Productos')
@section('contenido')
        <!--**************productos********************-->
@if(!$productos->isEmpty())
<div class="row ">

    <div class="col-md-12 ">

        <!--*******************tab**********************-->
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                @foreach($productos as $index => $producto)
                    <li role="presentation" {!! $index === 0 ? 'class="active"' : '' !!}>
                        <a href="#{{ $producto->slug }}" id="{{ $producto->slug }}-tab" role="tab" data-toggle="tab" aria-expanded="true">
                            <span class="text">{{ $producto->nombre }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div id="productos-tabs-content" class="tab-content">
                @foreach($productos as $prod_index => $producto)
                <div role="tabpanel" class="tab-pane fade in{!! $prod_index === 0 ? ' active' : '' !!}" id="{{ $producto->slug }}" aria-labelledby="{{ $producto->slug }}-tab">
                        <!--******************tab*******************-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="carousel-{{ $producto->slug }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($producto->imagenes as $index => $imagen)
                                            <div class="item{!! $index == 0 ? ' active': '' !!}">
                                                <img src="{{ url($imagen->img_url) }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div id="thumbcarousel-{{ $producto->slug }}" class="thumbcarousel carousel slide" data-interval="false">
                                        <div class="carousel-inner">
                                            @foreach($producto->imagenes as $index => $imagen)
                                                @if($index === 0)
                                                    <div class="item active">
                                                @endif
                                                    <div data-target="#carousel-{{ $producto->slug }}" data-slide-to="{{ $index }}" class="thumb">
                                                        <img src="{{ url($imagen->img_url) }}">
                                                    </div>
                                                @if((($index + 1) % 4 == 0) && ($index > 0))
                                                    </div><!-- /item -->
                                                    <div class="item">
                                                @endif
                                                @if($index == $producto->imagenes->count() - 1)
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div><!-- /carousel-inner -->
                                        <a class="left carousel-control" href="#thumbcarousel-{{ $producto->slug }}" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#thumbcarousel-{{ $producto->slug }}" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    </div> <!-- /thumbcarousel -->
                                </div><!-- /clearfix -->
                            </div> <!-- /col-sm-6 -->
                            <div class="espacio col-sm-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="gris"># {{ $producto->nombre }}</h2>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                @if($producto->epoca != "")
                                                <tr>
                                                    <td>Epoca</td>
                                                    <td>{{ $producto->epoca }}</td>
                                                </tr>
                                                @endif
                                                @if($producto->ciclo_promedio != "")
                                                <tr>
                                                    <td>Ciclo Promedio</td>
                                                    <td>{{ $producto->ciclo_promedio }}</td>
                                                </tr>
                                                @endif
                                                @if($producto->segmento != "")
                                                <tr>
                                                    <td>Segmento</td>
                                                    <td>{{ $producto->segmento }}</td>
                                                </tr>
                                                @endif
                                                @if($producto->envase != "")
                                                <tr>
                                                    <td>Envase</td>
                                                    <td>{{ $producto->envase }}</td>
                                                </tr>
                                                @endif
                                                @if($producto->variedad != "")
                                                <tr>
                                                    <td>Variedad</td>
                                                    <td>{{ $producto->variedad }}</td>
                                                </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h2 class="gris"># Descripcion</h2>
                                        <p>
                                            {{ $producto->descripcion }}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- /col-sm-6 -->
                        </div> <!-- /row -->
                    </div>
                    <!--*******************fin_tab******************-->
                </div>
                @endforeach
            </div>
        </div>
<script !src="">
    (function($) {

        'use strict';

        $(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e) {
            var $target = $(e.target);
            var $tabs = $target.closest('.nav-tabs-responsive');
            var $current = $target.closest('li');
            var $parent = $current.closest('li.dropdown');
            $current = $parent.length > 0 ? $parent : $current;
            var $next = $current.next();
            var $prev = $current.prev();
            var updateDropdownMenu = function($el, position){
                $el
                        .find('.dropdown-menu')
                        .removeClass('pull-xs-left pull-xs-center pull-xs-right')
                        .addClass( 'pull-xs-' + position );
            };

            $tabs.find('>li').removeClass('next prev');
            $prev.addClass('prev');
            $next.addClass('next');

            updateDropdownMenu( $prev, 'left' );
            updateDropdownMenu( $current, 'center' );
            updateDropdownMenu( $next, 'right' );
        });

    })(jQuery);
</script>
<!--***************js tab******************-->




</div>



</div>


<!--******************fin_productos****************************-->
@else
    <h2>No hay productos en esta subcategoria.</h2>
@endif
@stop