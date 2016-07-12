@extends('api.master)
@section('contenido')
    <form action="{{ URL::to('api/zonas') }}" method="POST">
        Nombre zona: <input type="text" name="nombre">
        Codigo del departamento: <input type="number" name="depto_cod">
        <input type="submit" value="Enviar">
    </form>
@stop