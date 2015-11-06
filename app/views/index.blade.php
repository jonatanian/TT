<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>SISA-CMPL | Instituto Politécnico Nacional</title>
  <meta name="SISACMPL" content="Sistema de Administración del CMPL-IPN">
  <meta name="description" content="Sistema de Administración del CMPL-IPN">
  <meta name="author" content="Alcántara Carrillo Oscar, Castañecha Chavero Jonatan Ian, Ruiz González Brenda Angélica">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
  {{HTML::style("http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700")}}
  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
  {{HTML::style("assets/skin/default_skin/css/theme.css")}}
  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
  {{HTML::style("assets/admin-tools/admin-forms/css/admin-forms.css")}}
  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  {{HTML::style("assets/img/favicon.ico")}}
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   {{HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   {{HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')}}
   
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">
  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- Begin: Animated Canvas BG -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>
      
      <!-- Begin: Content -->
      <section id="content">

        <a href="#" class="" title="home"><img src="{{asset('images/LogoSISAv4.png')}}" alt="AdminDesigns Logo" class="img-responsive w200 ml10"></a>
		
        <div class="admin-form theme-info" id="login1" style="margin-top: 6%;">

          <div id="counter"></div>

          <h1 class="coming-soon-title">¡Estamos casi listos para comenzar!</h1>
          <div class="panel panel-info bw10">

            <!-- end .form-header section -->
            <form method="post" action="/" id="contact">
              <div class="panel-menu">
                <div class="row">
                  <div class="col-md-12">
                  	<a href="#" class="button btn-success mr10 btn-block">Acceder al SISA</a>
                  	<a href="{{action('SIGController@SIG_index')}}" class="button btn-info mr10 btn-block">Volver al SIG</a>
                  </div>
                </div>
              </div>
              <!-- end .form-body section -->

            </form>
          </div>
        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

  </div>
  <!-- End: Main -->
  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  {{HTML::script('vendor/jquery/jquery-1.11.1.min.js')}}
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
  {{HTML::script('vendor/jquery/jquery_ui/jquery-ui.min.js')}}
  <!-- Countdown Plugin -->
  <script src="vendor/plugins/countdown/jquery.plugin.min.js"></script>
  {{HTML::script('vendor/plugins/countdown/jquery.plugin.min.js')}}
  <script src="vendor/plugins/countdown/jquery.countdown.min.js"></script>
  {{HTML::script('vendor/plugins/countdown/jquery.countdown.min.js')}}
  <!-- CanvasBG Plugin(creates mousehover effect) -->
  <script src="vendor/plugins/canvasbg/canvasbg.js"></script>
  {{HTML::script('vendor/plugins/canvasbg/canvasbg.js')}}
  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  {{HTML::script('assets/js/utility/utility.js')}}
  <script src="assets/js/demo/demo.js"></script>
  {{HTML::script('assets/js/demo/demo.js')}}
  <script src="assets/js/main.js"></script>
  {{HTML::script('assets/js/main.js')}}

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core      
    Core.init();

    // Init Demo JS
    Demo.init();

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 10,
        y: window.innerHeight / 20
      },
    });

    // Init Countdown Plugin
    var newYear = new Date();
    newYear = new Date(2015,11,14);
    $('#counter').countdown({
      until: newYear
    });

    // For further documentation, settings, and examples
    // see http://keith-wood.name/countdownRef.html



  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
