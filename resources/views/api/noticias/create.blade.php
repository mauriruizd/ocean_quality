@extends('api.master')
@section('contenido')
    <form action="{{ URL::to('api/noticias') }}" method="POST">
        Nombre zona: <input type="text" name="titulo">
        Cuerpo: <br> <textarea name="cuerpo" id="cuerpo" cols="30" rows="10"></textarea> <br>
        Codigo del administrador: <input type="number" name="adm_cod" value="1">
        <input type="text" name="imagen_url[]" value="http://www.py.undp.org/content/dam/undp/images/design_images/country_office_maps/dark_blue/png/paraguay.png">
        <input type="text" name="imagen_url[]" value="http://www.py.undp.org/content/dam/undp/images/design_images/country_office_maps/dark_blue/png/paraguay.png">
        <input type="text" name="imagen_url[]" value="http://www.py.undp.org/content/dam/undp/images/design_images/country_office_maps/dark_blue/png/paraguay.png">
        <input type="text" name="imagen_url[]" value="http://www.py.undp.org/content/dam/undp/images/design_images/country_office_maps/dark_blue/png/paraguay.png">
        <input type="text" name="imagen_url[]" value="http://www.py.undp.org/content/dam/undp/images/design_images/country_office_maps/dark_blue/png/paraguay.png">
        <input type="text" name="imagen_url[]" value="http://www.py.undp.org/content/dam/undp/images/design_images/country_office_maps/dark_blue/png/paraguay.png">
        <input type="submit" value="Enviar">
    </form>
@stop