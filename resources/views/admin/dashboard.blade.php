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
                <h3>Aún no hay subcategorias cadastradas.</h3>
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

@stop