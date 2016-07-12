@extends('front.master2')
@section('titulo', '# Empresa')
@section('contenido')
    <p>
        Ocean Quality actúa en el mercado Paraguayo con diversas distribuciones de conceptuadas empresas de semillas, fertilizantes químicos, foliares y organominerales, plásticos agrícolas, bandejas, media sombras, sistemas de riego, substratos y algunos agroquímicos destinados al mercado de hortalizas, tabaco, Ka’a he’ê, forestales y algunos frutales. Siempre buscando llevar a sus clientes productos de altísima calidad y garantía.
    </p>


    <div class="row" id="lista_empresa">
        <div class="col-md-9 col-md-offset-1">
            <ul class="">
                <li>
                    <div class="row">
                        <div class="col-md-5">
                            <img class="img-responsive" src="{{ url('img/alter.jpg') }}">
                        </div>
                        <div class="col-md-7">
                            <h2 class="text-center">Satisfacción</h2>
                            <p>
                                Atender a sus clientes con productos garantizados, llevando así al productor final la

                                seguridad de una buena cosecha y mejor producción.
                            </p>

                        </div>

                    </div>

                </li>

                <li>
                    <div class="row">
                        <div class="col-md-5">
                            <img class="img-responsive" src="{{ url('img/alter.jpg') }}">
                        </div>
                        <div class="col-md-7">
                            <h2 class="text-center">Credibilidad</h2>
                            <p>
                                Ser referencia de innovación por calidad de productos y servicios ofrecidos, motivados por el suceso de los diversos parceros que actúan con nuestra empresa en Paraguay, así como al esfuerzo conjunto del equipo de colaboradores.
                            </p>

                        </div>

                    </div>

                </li>

                <li>
                    <div class="row">
                        <div class="col-md-5">
                            <img class="img-responsive" src="{{ url('img/alter.jpg') }}">
                        </div>
                        <div class="col-md-7">
                            <h2 class="text-center">Orgullo</h2>
                            <p>
                                - Hacer todo con pasión.
                                - Respetar y valorizar cada persona y empresa relacionada con Ocean Quality.
                                - Estar comprometido con la mejoría continua de servicios y nuevas tecnologías,
                                - Motivación para superar los desafíos y barreras encontradas en el día a día.
                                trayendo mayores soluciones en su segmento.
                            </p>

                        </div>

                    </div>

                </li>





            </ul>
        </div>
    </div>
@stop
@section('includes')
@stop