<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Ocean Quality">
    <meta name="author" content="">

    <title>Ocean Quality | Admin</title>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ URL::to('css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::to('css/m-style.css') }}">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <!-- M CSS -->
    <link rel="stylesheet" href="{{ URL::to('css/login.css') }}">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <a href="{{ URL::to('/') }}">Volver al website</a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="loginmodal-container">
                <h1>Acceso Restricto</h1><br>
                <form action="{{ URL::to('admin/login') }}" method="POST">
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Contraseña">
                    <input type="submit" class="login loginmodal-submit" value="Entrar">
                </form>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ URL::to('js/sb-admin-2.js') }}"></script>
@yield('javascript')
</body>

</html>
