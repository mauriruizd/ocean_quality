@extends('front.master')
@section('titulo')
    # Trabaje con Nosotros
@stop
@section('contenido')
    @if(\Illuminate\Support\Facades\Session::has('message'))
        <span style="color:red">
            {{ Session::get('message') }}
        </span>
    @endif
    <form class="formulario" action="{{ URL::to('trabaje_con_nosotros') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="nombre">NOMBRE COMPLETO</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
        </div>
        <div class="form-group">
            <label for="nombre_empresa">NOMBRE DE LA EMPRESA</label>
            <input type="text" class="form-control" id="nombre_empresa" placeholder="Empresa" name="nombre_empresa">
        </div>
        <div class="form-group">
            <label for="email">E-MAIL</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="telefono">TELEFONO</label>
            <input type="text" class="form-control" id="telefono" placeholder="Telefono" name="telefono">
        </div>
        <div class="form-group">
            <label for="area_interes">ÁREA DE INTERÉS</label>
            <select id="area_interes" class="form-control" name="area_interes">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mensaje">MENSAJE</label>
            <textarea class="form-control" id="mensaje" name="mensaje"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@stop