<!DOCTYPE html>
<!-- saved from url=(0042)http://getbootstrap.com/examples/carousel/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="ISO-8859-1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- jQuery library (served from Google) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bxSlider Javascript file -->

    <!-- bxSlider CSS file-->
    <link href="{{ url('css/jquery.bxslider.css') }}" rel="stylesheet" />



    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Ocean Quality</title>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ url('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/style-nuevo.css') }}" media="screen" title="no title" charset="utf-8">

    <style type="text/css">:root #content > #right > .dose > .dosesingle,
        :root #content > #center > .dose > .dosesingle
        {display:none !important;}</style><style type="text/css"></style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="{{ url('css/carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/yamm.css') }}">
    <script>
        $(document).ready(function() {
            $('#divLuna').load('{{ url('/luna_actual')}}');
            $('#divTiempo').load('{{ url('/temperaturas_actuales') }}', cleanResponse);

            function fahrenheitToCelsius(f) {
                return Number.parseInt( (5/9) * (f-32) );
            }

            function cleanResponse() {
                var target = $('#divTiempo');
                var divMeteoCDE = $('#divMeteoCDE');
                target.children('ul').each(function () {
                    var ul = $(this);
                    ul.children('li').each(function () {
                        $(this).attr('class', '');
                        var infoDiv = $(this).children('.info');
                        var num = Number.parseInt(infoDiv.children('span').html());
                        infoDiv.children('span').html(fahrenheitToCelsius(num) + '°');
                        if(/ciudad del este/i.test(infoDiv.children('h6').children('a').html())) {
                            divMeteoCDE.html('<div id="silverDiv"><img src="img/meteorologia.jpg" alt=""></div>' + infoDiv.html().replace('<h6>', '<h2>').replace('</h6>', '</h2>'));
                        }
                        divMeteoCDE.children('a').children('img').attr({ width : '', height : '' });
                    });
                    var html = ul[0].outerHTML;
                    ul.parent().append('<div class="col-md-6">' + html + '</div>');
                    ul.remove();
                });
            }
        });
    </script>
</head>
<!-- NAVBAR
================================================== -->
<body data-pinterest-extension-installed="cr1.39.1">
<!-- Modal fases lunares -->
<div class="modal fade" id="fasesLunaresModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Fases Lunares
                </h4>
            </div>
            <div class="modal-body">
                <div id="CalendarioLunarTutiempo"><a href="http://www.tutiempo.net">El Tiempo</a> | <a href="http://www.tutiempo.net/luna/fases.htm">Calendario Fases Lunares</a></div>
                <script type="text/javascript">
                    /* Ancho: 420; Alto: 491 */
                    var DatosCalendarioTutiempo = '1;0;1;1;1;10;N;000000;FFFFFF;FFFFFF';
                </script>
                <script type="text/javascript" src="http://www.tutiempo.net/TTapi/cal/fases_0_0"></script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Clima-->
<div class="modal fade" id="temperaturasActualesModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Meteorología
                </h4>
            </div>
            <div class="modal-body">
                <div class="row" id="divTiempo">
                    <img src="{{ url('img/cargando.gif') }}" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="fondo">
    <p class="container mail">
        Oceanquality@Oceanquality.Net

    </p>
    <div class="ro">  </div>
    <div class="logo">
        <a href="{{ url('/') }}"><img src="{{ url('img/logo.png') }}" alt="Ocean Quality" /></a>

    </div>
</div>
@include('front.nav')
<!-- Carousel
================================================== -->
<div id="main-carousel" class="carousel slide imag" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @for($i = 0; $i < $banners->count(); $i++)
            <li data-target="#main-carousel" data-slide-to="{{ $i }}" {{ $i == 0 ? 'class="active"' : '' }}></li>
        @endfor
        <!--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($banners as $index => $banner)
            <div class="item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ url($banner->img_url) }}" alt="{{ $banner->titulo }}">
            </div>
        @endforeach
        <!--<div class="item active">
            <img src="http://contenido.com.mx/revista/wp-content/uploads/2015/04/banner-productos-tomates.jpg" alt="...">
            <div class="carousel-caption">

            </div>
        </div>
        <div class="item">
            <img src="http://www.buhlergroup.com/static/europe/es/media/02-Process_Technologies/Banner_Broccolisorting_001.jpg" alt="...">
            <div class="carousel-caption">

            </div>
        </div>-->

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="bu"></div>
<!-- /.carousel -->
<div class="container marketing">
    <div class="row featurette">
        <div class="col-md-12 ">
            <div class="col-md-12">
                <img class="featurette-image img-responsive center-block" src="{{ url('img/linea.png') }}" data-holder-rendered="true">
            </div>
            <img class="featurette-image img-responsive center-block" src="{{ url('img/bg-mascota.png') }}" data-holder-rendered="true">
            <div class="col-md-12">
                <img class="featurette-image img-responsive center-block" src="{{ url('img/linea2.png') }}" data-holder-rendered="true">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4  col-lg-4">
            <div class="cuadr">
                <div class="cuadro">
                    <iframe src="http://www.mercosurcambios.com/selo/5140847cf6a60728" allowtransparency="yes" frameborder="0" scrolling="no" width="201px" height="342px"></iframe>
                </div>
            </div>
        </div><!-- /.col-lg-4 -->
        <style media="screen">
            .cuadro img{
                padding: 10px;
            }
        </style>
        <div class="col-sm-4 col-lg-4">
            <div class="cuadr">
                <div class="cuadro">
                    <div id="divMeteoCDE">
                    </div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#temperaturasActualesModal">Ver más</button>
                </div>

            </div>

        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4 col-lg-4">

            <div class="cuadr">
                <div class="cuadro">
                    <div id="divLuna">
                        <img src="{{ url('img/cargando.gif') }}" alt="Fases de la luna">
                    </div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#fasesLunaresModal">Ver más fases de la luna</button>
                </div>

            </div>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    <br>
    <style>
        .bx-wrapper img {
            max-width: 100%;
            display: block;
            height: 70px;
        }
        .bx-wrapper .bx-viewport {
            -moz-box-shadow: 0 0 5px #ccc;
            -webkit-box-shadow: 0 0 5px #ccc;
            box-shadow: 0 0 5px #ccc;
            border: 0px solid #fff;
            left: -5px;
            background: #fff;
            -webkit-transform: translatez(0);
            -moz-transform: translatez(0);
            -ms-transform: translatez(0);
            -o-transform: translatez(0);
            transform: translatez(0);
        }
    </style>
    <div class=" container col-md-4">
        <p class="socios">
            SOCIOS COMERCIALES
        </p>

    </div>

    <div class="col-md-12">
        <img class="featurette-image img-responsive center-block" src="{{ url('img/linea2.png') }}" data-holder-rendered="true">
    </div>

    <!-- FOOTER -->


</div><!-- /.container -->



<script type="text/javascript">
    $(document).ready(function(){
        $('.slider1').bxSlider({
            slideWidth: 200,
            minSlides: 2,
            maxSlides: 5,
            slideMargin: 10
        });
    });

</script>

<!-- socios -->
<div class="slider1">
    @for($i = 2; $i < 5; $i++)
        <div class="slide"><img src="{{ url('imagen-nuevo/'.$i.'.jpg') }}"></div>
    @endfor
    <div class="slide"><img src="{{ url('imagen-nuevo/06.jpg') }}"></div>
    @for($i = 7; $i < 17; $i++)
        <div class="slide"><img src="{{ url('imagen-nuevo/'.$i.'.jpg') }}"></div>
    @endfor
</div>
<!-- fin de socios -->


<div class="barra">
</div>
<div class="container">
    <!-- <hr> -->


</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Meteorologia</h4>
            </div>
            <div class="modal-body">
                <div id="cont_923017875bf716f928599ec4c87799fd"><span id="h_923017875bf716f928599ec4c87799fd">El Tiempo <a id="a_923017875bf716f928599ec4c87799fd" href="http://www.meteored.com.py/tiempo-en_Asuncion-America+Sur-Paraguay-Central--1-22742.html" target="_blank" rel="nofollow" style="color:#00ABEB;font-family:Roboto;font-size:14px;">Asunci&oacute;n</a></span><script type="text/javascript" async src="https://www.meteored.com.py/wid_loader/923017875bf716f928599ec4c87799fd"></script></div>
                <hr>
                <div id="cont_39240dacf543efc7cc1ee39379cbd2c3"><span id="h_39240dacf543efc7cc1ee39379cbd2c3">El Tiempo <a id="a_39240dacf543efc7cc1ee39379cbd2c3" href="http://www.meteored.com.py/tiempo-en_Ciudad+del+Este-America+Sur-Paraguay-Alto+Parana--1-22739.html" target="_blank" rel="nofollow" style="color:#00ABEB;font-family:Roboto;font-size:14px;">Ciudad del Este</a></span><script type="text/javascript" async src="https://www.meteored.com.py/wid_loader/39240dacf543efc7cc1ee39379cbd2c3"></script></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>


<br>
<div class="footer">

    <footer class="blog-footer">
        <div class="container ">
            <div class="row">
                <div class="col-xs-6 col-lg-4 logo_blanco"><img src="{{ url('img/logo_blanco.png') }}" alt="" /></div>
                <div class="col-xs-6 col-lg-4"><p>
                        ATENDIMIENTO
                    </p>
                    <h5>Av. San Blás, Esquina Venezuela, Km 9  Acaray, Ciudad Del Este -  Alto Paraná – Paraguay</h5>
                    <h5> Oceanquality@Oceanquality.Net</h5>
                    <h5>Tel./Fax: Local: 061-579813 - Tel./Fax: De otros países: 595 61 579813</h5>


                </div>
                <div class="col-xs-6 col-lg-4 logo_blanco text-right"><img src="{{ url('img/py.png') }}" alt="" /></div>

            </div>
        </div>
        <!-- <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p> -->

    </footer>


</div>


</body>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="{{ url('js/holder.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ url('js/ie10-viewport-bug-workaround.js') }}"></script>

<script src="{{ url('js/jquery.bxslider.min.js') }}"></script>



<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg><span style="height: 20px; width: 40px; position: absolute; opacity: 1; z-index: 8675309; display: none; cursor: pointer; border: none; background-image: url(&quot;data:image/png;base64,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&quot;); background-color: transparent; background-size: 40px 20px;"></span></body></html>
