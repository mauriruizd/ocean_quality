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
</head>
<!-- NAVBAR
================================================== -->
<body data-pinterest-extension-installed="cr1.39.1">
<!-- Modal fases lunares -->


<!-- Modal Clima-->

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
<div class="imag">
    <img class="featurette-image img-responsive center-block" src="http://contenido.com.mx/revista/wp-content/uploads/2015/04/banner-productos-tomates.jpg" data-holder-rendered="true">

</div>
<div class="bu">  </div>
<div class="espa">  </div>


<!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <style>
        /*.carousel {*/
        /*margin-top: 20px;*/
        /*}*/
        .item .thumb {
            width: 25%;
            height: auto;
            cursor: pointer;
            float: left;
        }
        .item .thumb img {
            width: 100%;
            margin: 2px;
        }
        .item img {
            width: 100%;
        }
        p.fonte{
            margin-top: 20px;
            background:#E6E7E8 ;
            color: #e00400;

            font-size: 25px;
            font-family: 'Oswald', sans-serif;
        }
        .espacio{
            font-size: 15px;
            font-family: 'Oswald', sans-serif;
            padding: 20px;
        }
        .espa{
            font-size: 17px;
            font-family: 'Oswald', sans-serif;
            padding-left: 30px;

        }


    </style>

    <!-- START THE FEATURETTES -->
    <!--**************productos********************-->
    <div class="row ">
        <div class="col-md-12 ">
            <div class="col-md-12">
                <img class="featurette-image img-responsive center-block" src="{{ url('img/linea.png') }}" data-holder-rendered="true">
            </div>
            <p class="fonte">
                @yield('titulo')
            </p>

            <!--*******************tab**********************-->
            <style>
                .margen{
                    padding: 5px;
                }
                .lis_empre img{
                    width: 250px;
                    height: auto;
                }
            </style>
            <div class="margen">
                @yield('contenido')
            </div>
            <!--********************fin_tab*********************-->
        </div>
    </div>
    <!--******************fin_productos****************************-->
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
    @for($i = 1; $i < 19; $i++)
        <div class="slide"><img src="{{ url('imagen-nuevo/'.$i.'.jpg') }}"></div>
    @endfor
    {{--<div class="slide"><img src="{{ url('imagen-nuevo/06.jpg') }}"></div>--}}
    {{--@for($i = 7; $i < 17; $i++)--}}
        {{--<div class="slide"><img src="{{ url('imagen-nuevo/'.$i.'.jpg') }}"></div>--}}
    {{--@endfor--}}
</div>
<!-- fin de socios -->


<div class="barra"></div>
<div class="container">
    <!-- <hr> -->


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

@yield('includes')

<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg><span style="height: 20px; width: 40px; position: absolute; opacity: 1; z-index: 8675309; display: none; cursor: pointer; border: none; background-image: url(&quot;data:image/png;base64,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&quot;); background-color: transparent; background-size: 40px 20px;"></span></body></html>
