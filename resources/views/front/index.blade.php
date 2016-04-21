<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    {{--font-family: 'Arizonia', cursive;--}}
    <link rel="icon" href="">

    <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.css'>
    <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.theme.css'>
    <link rel="stylesheet" href="{{ URL::to('css/reset.css') }}">
    <title>Ocean</title>
    <link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/styleMark.css') }}">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <style type="text/css"></style><style type="text/css"></style></head>
<!--  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
<link href="{{ URL::to('css/flatWeatherPlugin.css') }}" rel="stylesheet">
<!-- include a copy of jquery (if you haven't already) -->
<script src="{{ URL::to('js/jquery-2.1.1.min.js') }}"></script>
<!-- include flatWeatherPlugin.js -->

<script src="{{ URL::to('js/jquery.flatWeatherPlugin.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        //Setup the plugin, see readme for more examples
        var example = $("#example").flatWeatherPlugin({
            location: "ciudad del este, cde", //city and region *required
            country: "paraguay",         //country *required
            //optional:
            api: "yahoo", //default: openweathermap (openweathermap or yahoo)
            //apikey: "your-api-key",   //optional api key for openweather
            view : "full", //default: full (partial, full, simple, today or forecast)
            displayCityNameOnly : true, //default: false (true/false) if you want to display only city name
            forecast: 4, //default: 5 (0 -5) how many days you want forecast
            render: true, //default: true (true/false) if you want plugin to generate markup
            loadingAnimation: true //default: true (true/false) if you want plugin to show loading animation
            //units : "metric" or "imperial" default: "auto"
        });

    });
</script>


<script type="text/javascript">


    jQuery(document).ready(function ($) {

        // $('#checkbox').change(function(){
        setInterval(function () {
            moveLeft();
        }, 7000);
        //});

        var slideCount = $('#slider ul li').length;
        var slideWidth = $('#slider ul li').width();
        var slideHeight = $('#slider ul li').height();
        var sliderUlWidth = slideCount * slideWidth;


        $('#slider').css({ width: slideWidth, height: slideHeight });

        $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

        $('#slider ul li:last-child').prependTo('#slider ul');

        function moveLeft() {
           $('#slider ul').animate({
                left: + slideWidth
            }, 600, function () {
                $('#slider ul li:last-child').prependTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        }

        function moveRight() {
            $('#slider ul').animate({
                left: - slideWidth
            }, 600, function () {
                $('#slider ul li:first-child').appendTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };

        $('a.control_prev').click(function () {
            moveLeft();
        });

        $('a.control_next').click(function () {
            moveRight();
        });

    });

</script>
<style>

    /* style the container however you please */
    #example {
        color:#0967a4;
        /*background: silver;*/
        padding: 1px;
        margin: 0 auto; ;
        width: 250px;


    }
    .fuentes_banner{
        width: 90%;

        font-family: 'Indie Flower', cursive;
        /*font: 400 100px/1.3 'Oleo Script', Helvetica, sans-serif;*/
        font-size: 45px;
        color: #2b2b2b;
        text-shadow: 4px 4px 0px rgba(0,0,0,0.1);
    margin-top: 80px;

    }
    .cuadro{

        vertical-align: middle;
    }
    /* styling for this page only, ignore */



</style>

<body ng-app="myApp" ng-controller="AppCtrl" lang="en">

<nav class="bar ">
    <div class="container-fluid">
        <div class="container">
            <h4 id="text"><i class="glyphicon glyphicon-envelope"></i> Oceanquality@Oceanquality.Net</h4>
        </div><!-- /.container -->
    </div>
</nav>

<div class=" container">
    <div class="centro"><!--logo-->
        <a href="{{URL::to('/')}}" id="logo">
            <img src="{{ URL::to('img/logo.png') }}">
        </a>
    </div><!--logo-->
</div><!-- /.container -->


<div id="slider">




    {{--banner--}}

    <div id="carousel" class="owl-carousel owl-theme">
        @foreach($banners as $banner)
        <div class="item"><a href="{{ $banner->link }}"><img src="{{ $banner->img_url }}"></a></div>
        @endforeach
    </div>
    {{--banner--}}







    {{--<a href="#" class="control_next">></a>--}}
    {{--<a href="#" class="control_prev"><</a>--}}
    {{--<ul>--}}
        {{--<!--<li><img src="{{ URL::to('img/banner.jpg') }}"></li>--}}
        {{--<li ><img src="{{ URL::to('img/banner2.jpg') }}"></li>--}}
        {{--<li><img src="{{ URL::to('img/banner3.jpg') }}"></li>-->--}}
        {{--@foreach($banners as $banner)--}}
            {{--<li>--}}
                {{--<a href="{{ $banner->link }}"><img src="{{ $banner->img_url }}"></a>--}}
            {{--</li>--}}
        {{--@endforeach--}}

    {{--</ul>--}}
</div>

<div class="lineablu"></div>
<div class=" container">
    @include('front.menu')
    <div class="linea">
        <img src="{{ URL::to('img/linea.png') }}"></div>
    <div class="cuadro">
        <div class="col-md-4 mascota"><img src="{{ URL::to('img/mascota.png') }}"></div>
        {{--<div class="col-md-8 text"><img src="{{ URL::to('img/text.png') }}"></div>--}}
        <div class="fuentes_banner">“Una buena cosecha comienza en Ocean Quality”</div>
    </div>

    <div class="linea2"><img src="{{ URL::to('img/linea2.png') }}"></div>
    <div class="espacio"></div>
    <div class="col-md-4">
        <div class="box">
            <div class="box_interno">
                <div class="box_blanco">
                    <div class="cambio">
                        <iframe src="http://www.mercosurcambios.com/selo/5140847cf6a60728" allowtransparency="yes" frameborder="0" scrolling="no" width="201px" height="342px"></iframe>
                    </div>
                </div></div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box">
            <div class="box_interno">
                <div class="box_blanco">
                    <div id="example"></div>

                </div></div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box ">
            <div class="box_interno box3">
                <div class="box_blanco ">
                    <div calendar class="calendar" id="calendar"> </div>
                </div></div>
        </div>
    </div>
    @include('front.socios')



</div><!-- /.container -->
<div class="container-fluid menu_inferior"></div>
<div class="espacio"></div>
<footer class="">
    <div class="col-md-4 footer_logo"><img src="{{ URL::to('img/logo_blanco.png') }}"></div>
    <div class="col-md-2 blanco"><h3>ATENDIMIENTO</h3>
        <h4 class="text2"><i class="glyphicon glyphicon-envelope"></i> Oceanquality@Oceanquality.Net</h4>
        <h4 class="text2"><i class="glyphicon glyphicon-earphone"></i> 061 - 501 313</h4>
    </div>
    <div class="col-md-2 blanco"><h3>SOCIAL</h3></div>
    <div class="col-md-2 py"><img src="{{ URL::to('img/py.png') }}"></div>
</footer>
<div class="container">
    <div class="linea_footer"></div>
    <div class="linea_footer_box">
        {{--aca--}}
        {{--fin--}}
        <h4>Av. San Blás, Esquina Venezuela, Km 9  Acaray, Ciudad Del Este - PY</h4>
    </div>
</div>
<style>
    #carousel{
        width: 100%;
        height: 400px;
    }
    #carousel .item img {
        display: block;
        width: 100%;
        height: 400px;
        cursor:grab;
        cursor:-webkit-grab;
    }

    /* Styling Pagination*/
    .owl-theme .owl-controls .owl-page span{
        margin-top: -100px;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        background: black;
        border:1px solid #000;
    }

    .owl-theme .owl-controls .owl-page.active span,
    .owl-theme .owl-controls.clickable .owl-page:hover span{
        background:white;
        border:2px solid black;
        margin-top: -100px;


    }
</style>
<script >
    $(document).ready(function() {
        $("#carousel").owlCarousel({
            navigation : false,
            slideSpeed : 500,
            paginationSpeed : 800,
            rewindSpeed : 500,
            singleItem:true,
            autoPlay : true,
            stopOnHover : true,
        });
    });
</script>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.8/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
<script src="{{ URL::to('js/index.js') }}"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.js'></script>


<script src="{{ URL::to('js/jquery.lbslider.js') }}"></script>
<script>
    jQuery('.slider1').lbSlider({
        leftBtn: '.sa-left',
        rightBtn: '.sa-right',
        visible: 5,
        autoPlay: true,
        autoPlayDelay: 5
    });
</script>

</body></html>
