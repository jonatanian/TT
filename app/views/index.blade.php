<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>SISA - CMPL | Instituto Politécnico Nacional</title>
    <meta name="keywords" content="SISA SIG CMPL IPN" />
    <meta name="description" content="Sistema de Administración del Centro Mexicano para la Producción más Limpia del IPN">
    <meta name="author" content="Oscar Alcántara Carrillo, Castañeda Chavero Jonatan Ian, Ruiz González Brenda Angélica">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -- Local Version -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/theme.css" rel="stylesheet">

    <!-- Custom Fonts -->
    {{HTML::style("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css")}}
	{{HTML::style("http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700")}}
	{{HTML::style("http://fonts.googleapis.com/css?family=Roboto:300,400,500,700")}}
	{{HTML::style("http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic")}}
   
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">


    <!-- Navigation -->
    <nav class="navbar navbar-default">


        <!-- Topbar Nav (hidden) -->
        <div class="topbar-nav clearfix">
            <div class="container">
                <ul class="topbar-left list-unstyled list-inline">
                    <li> <span class="fa fa-phone"></span> 57-29-60-00 ext. 52611 </li>
                    <li> <span class="fa fa-envelope"></span> noreae@ipn.mx </li>
                </ul>
                <ul class="topbar-right list-unstyled list-inline topbar-social">
                    <li> <a href="#"> <span class="fa fa-facebook"></span> </a></li>
                    <li> <a href="#"> <span class="fa fa-twitter"></span> </a></li>
                    <li> <a href="#"> <span class="fa fa-google-plus"></span> </a></li>
                    <li> <a href="#"> <span class="fa fa-dribbble"></span> </a></li>
                    <li> <a href="#"> <span class="fa fa-instagram"></span> </a></li>
                </ul>

            </div>
        </div> 

        <div class="container" style="max-width: 1050px;">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Instituto Politécnico Nacional</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active hidden">
                        <a href="#page-top">Página principal</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Hero Content -->
    <header id="hero">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in hidden">This is a lead in statement!</div>
                <div class="intro-heading">Sistema de Administración del <b>Centro Mexicano para la Producción más Limpia</b> SISA</div>
                <a href="{{action('LoginController@login_index')}}" class="page-scroll btn btn-xl mr30 btn-primary">Iniciar sesión</a>
            </div>
        </div>
    </header>

    

    <!-- Footer -->
    <footer id="footer">
        <div class="container mw850">
            <div class="row">
                <div class="col-md-6 text-left">
                <span class="copyright text-muted">Copyright &copy; <b>CMPL-IPN</b> 2016</span>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <!-- <script src="js/vendor/jquery.js"></script> -- Local Version -->
    {{HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')}}
    {{HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js')}}

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="js/vendor/bootstrap.min.js"></script> -- Local Version -->
	{{HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js')}}
	
    <!-- Contact Form JavaScript -->
    {{HTML::script('js/vendor/jqBootstrapValidation.js')}}
    {{HTML::script('js/contact_me.js')}}

    <!-- Custom Theme JavaScript -->
    {{HTML::script('js/main.js')}}

</body>

</html>
