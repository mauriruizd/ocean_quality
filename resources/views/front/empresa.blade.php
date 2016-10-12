@extends('front.master')
@section('titulo')
    # Empresa
@stop
@section('contenido')
    <p>
        Ocean Quality, fundada en el año 2008, fue la primera empresa en Paraguay a dedicarse exclusivamente a la horticultura. Tiene en su DNA más de 30 años de experiencia en el mercado paraguayo y desde su primer día el principal objetivo es hacer pacerías con proveedores conceptuados, que disponen de productos de alta calidad y garantía de eficiencia. Entre los productos destacamos las semillas, fertilizantes químicos, foliares, hidrosolubles y organominerales, plásticos agrícolas, bandejas, media sombras, sistema de riego, substratos y algunos agroquímicos destinados al mercado de hortalizas.   El suceso de los productos y el trabajo realizado genero participación en otros mercados como tabaco, Ka’a he’ê, forestales, flores y algunos frutales. Hoy Ocean Quality cuenta con equipo comercial y técnico en las principales zonas productivas apoyando y desarrollando la mejor producción.

    </p>

    <style>
        .lis_empre h1{
            text-align: left;
        }
        .lis_empre p{
            text-align: left;
        }
    </style>
    <ul class="lis_empre">
        <li>
            <h1>Visión</h1>
            <p>
                Ser referencia, en el mercado, de calidad, garantía de productos y servicios juntamente con nuestros colaboradores y proveedores, buscando la excelencia e manteniendo la ética profesional durante toda nuestra trayectoria.
            </p>
        </li>
        <li>
            <h1>-Misión</h1>
            <p>
                Fortalecer nuestro conocimiento de los clientes y colaboradores, trayendo nuevas técnicas y productos que hagan con que el productor logre lo mejor resultado a cada cosecha. Motivar y superar los desafíos y barreras encontradas en el día a día.
            </p>
        </li>
        <li>
            <h1>Valores</h1>
            <p>
                Trabajar con productos de garantía;
                Insistir en la innovación con ética profesional y pasión por nuestro sector hortícola;
                Respetar física e moralmente a los clientes, colaboradores y proveedores;
            </p>
        </li>
    </ul>


        <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="text_azul">Noticias</h3>
                </div>
                <div class="modal-body">

                    <h4>hola como estas es ete es noticias
                        hola como estas es ete es noticias...</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>
@stop