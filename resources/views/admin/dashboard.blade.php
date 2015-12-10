@extends('admin.index')
@section('titulo')
    Dashboard
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Está aprovechando {!! round($progress, 2) !!}% del sistema</h1>
        </div>
        <div class="panel-body">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-{{ $progress < 35 ? 'danger' : ( $progress < 80 ? 'warning' : '' )  }} active" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%">
                    <span class="sr-only">{{ $progress }}% Complete</span>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Productos por subcategoria</h1>
        </div>
        <div class="panel-body">
            @if(count($prodSub)<= 0)
                <div class="alert alert-danger" role="alert">Aún no hay subcategorias cadastradas.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            @foreach($prodSub as $sub)
                                <th>{{ $sub->nombre }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($prodSub as $sub)
                                <td>
                                    <ul>
                                        @if(count($sub->productos) <= 0)
                                            <b>Aún no hay productos cadastrados en esta subcategoria.</b>
                                        @else
                                            @foreach($sub->productos as $producto)
                                                <li>{{ $producto->nombre }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Proveedores Cadastrados</h1>
        </div>
        <div class="panel-body">
            @if(count($provs) <= 0)
                <div class="alert alert-danger" role="alert">Aún no hay proveedores cadastrados. <b>No se recomienda cadastro de productos sin proveedores!</b></div>
            @else
                <ul class="list-group">
                    @foreach($provs as $prov)
                        <li class="list-group-item">{{ $prov->nombre }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Numero de Empleados por Zona</h1>
        </div>
        <div class="panel-body">
            @if(count($zons) <= 0)
                <div class="alert alert-danger" role="alert">Aún no hay proveedores cadastrados. <b>No se recomienda cadastro de productos sin proveedores!</b></div>
            @else
                <div class="list-group">
                    @foreach($zons as $zon)
                        <a href="{{ URL::to('admin/empleados') }}" class="list-group-item">
                            <span class="badge">{{ count($zon->empleados) }}</span>
                            {{ $zon->nombre }} ({{ $zon->departamento->nombre  }})
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Ultimas Noticias Cadastradas</h1>
        </div>
        <div class="panel-body">
            @if(count($notis) <= 0)
                <h3>Aún no hay noticias cadastrados.</h3>
            @else
                <div class="row">
                    @foreach($notis as $noti)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{ isset($noti->imagenes[0]) ? $noti->imagenes[0]->img_url : '' }}" alt="{{ $noti->titulo }}">
                                <div class="caption">
                                    <h3>{{ $noti->titulo }}</h3>
                                    <p>
                                        @if(strlen($noti->cuerpo) <= 200)
                                            {{ $noti->cuerpo }}
                                        @else
                                            {{ substr($noti->cuerpo, 0, 200) }}...
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Banners Cadastrados</h1>
        </div>
        <div class="panel-body">
            @if(count($bannrs) <= 0)
                <div class="alert alert-danger">No hay Banners cadastrados. <b>El sitio no funcionará correctamente sin por lo menos un banner!</b> </div>
            @else
                <div class="row">
                    <div class="row">
                        @foreach($bannrs as $banner)
                            <div class="col-xs-6 col-md-3">
                                <a href="{{ URL::to('admin/banners') }}" class="thumbnail">
                                    <img src="{{ $banner->img_url != '' ? $banner->img_url : '' }}" alt="{{ $banner->titulo }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

@stop