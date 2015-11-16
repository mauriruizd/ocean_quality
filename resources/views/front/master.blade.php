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
    <link rel="icon" href="">

    <title>Ocean</title>
    <link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/styleMark.css') }}">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <style type="text/css"></style><style type="text/css"></style></head>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
@yield('includes')
<script type="text/javascript">


    jQuery(document).ready(function ($) {

        // $('#checkbox').change(function(){
        setInterval(function () {
            moveRight();
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
        };

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


<body>


<nav class="bar ">
    <div class="container-fluid">
        <div class="container">
            <h4 id="text"><i class="glyphicon glyphicon-envelope"></i> Oceanquality@Oceanquality.Net</h4>

        </div><!-- /.container -->
    </div>
</nav>

<div class=" container">
    <div class="centro"><!--logo-->
        <a href="{{ URL::to('/') }}" id="logo">
            <img src="{{ URL::to('img/logo.png') }}">
        </a>
    </div><!--logo-->
</div><!-- /.container -->


<div id="slider2">

    <ul>
        <!--<li><img src="{{ URL::to('img/banner.jpg') }}"></li>-->
        <li>
            <a href="{{ $banner->link }}"><img src="{{ URL::to($banner->img_url) }}"></a>
        </li>
    </ul>
</div>

<div class="lineablu"></div>
<div class=" container">
    @include('front.menu')
    <div class="linea">
        <img src="{{ URL::to('img/linea.png') }}">
    </div>



    <div class="espacio"> </div>
    <div class="container barra_gris"><h3><!--# EMPRESA--> @yield('titulo') </h3> </div>
    <div class="col-md-12">

    </div>
    <br>
    <div class="container ">
        @yield('contenido')
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
    <div class="col-md-2 py"><img src="img/py.png"></div>
</footer>
<div class="container">
    <div class="linea_footer"></div>
    <div class="linea_footer_box">
        <h4>Av. San Blás, Esquina Venezuela, Km 9  Acaray, Ciudad Del Este - PY</h4>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->


<script src="{{ URL::to('js/jquery.lbslider.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('.menu_delos_prod:first li').click(function(e) {
            e.preventDefault();
            var id = $(this).children('a').attr('href');
            var elm = $(id).prev();
            var prod_cont = $('.foto_produc:first');
            var pos = prod_cont.scrollTop() + elm.position().top - 5;

            prod_cont.animate({
                scrollTop : pos
            }, 400);
        });
    });

    jQuery('.slider1').lbSlider({
        leftBtn: '.sa-left',
        rightBtn: '.sa-right',
        visible: 5,
        autoPlay: true,
        autoPlayDelay: 5
    });
</script>

</body></html>
