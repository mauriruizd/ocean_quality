@extends('front.master2')
@section('titulo', '# Vendedores')
@section('contenido')
<div class="row">
    <div id="mapa" style="width: 400px; height: 400px; margin: auto;"></div>
</div>
<div class="row">
    @foreach($departamentos as $departamento)
        <div class="col-lg-3 deptos depto{{ $departamento->id }}">
            @foreach($departamento->zonas as $zona)
                <h3>{{ $zona->nombre }}</h3><br>
                <ul>
                    @foreach($zona->empleados as $empleado)
                        <li>
                            <h4>{{ $empleado->nombre }}</h4>
                            <p>
                                @foreach($empleado->telefonos as $telefono)
                                    <i class="glyphicon glyphicon-earphone"></i>
                                    {{ $telefono->telefono }}<br>
                                @endforeach
                            </p>
                            <p>
                                <?php $count = 0; ?>
                                @foreach($empleado->correos as $correo)
                                    <i class="glyphicon glyphicon-envelope"></i>
                                    {{ $correo->correo }}<br>
                                @endforeach
                            </p>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    @endforeach
</div>
@stop
@section('includes')
    <link rel="stylesheet" href="{{ URL::to('css/jquery-jvectormap-2.0.3.css') }}">
    <script src="{{ URL::to('js/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ URL::to('js/jvector_paraguay.js') }}"></script>
    <script>
        function getFuncionariosByClick(e, code) {
            $('.deptos').hide('fast');
            $('.depto' + code).show('fast');
        }

        $(document).ready(function(){
            $('#mapa').vectorMap({
                map : 'paraguay',
                backgroundColor : '#FFF',
                regionsSelectable : true,
                regionsSelectableOne : true,
                onRegionClick : getFuncionariosByClick,
                regionStyle : {
                    initial : {
                        fill : '#044D99',
                        'fill-opacity' : 1
                    },
                    hover : {
                        'fill-opacity' : 0.8,
                        cursor : 'pointer'
                    },
                    selected : {
                        fill : '#EB1D21'
                    }
                }
            });
        });
    </script>
@stop