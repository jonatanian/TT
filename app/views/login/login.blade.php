<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>Iniciar sesión - SISA CMPL | Instituto Politécnico Nacional</title>
  <meta name="keywords" content="Bootstrap 3 Admin Dashboard Template Theme" />
  <meta name="description" content="AdminDesigns - Bootstrap 3 Admin Dashboard Theme">
  <meta name="author" content="AdminDesigns">
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
   {{HTML::style("https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js")}}
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   {{HTML::style("https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js")}}
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- begin canvas animation bg -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>

      <!-- Begin: Content -->
      <section id="content">
      	<div class="admin-form theme-success" id="login1">

          <div class="row mb15 table-layout">

            <div class="col-xs-6 va-m pln">
              <img src="{{asset('images/LogoSISA-SIG.png')}}" alt="SISA CMPL" class="img-responsive w250">
            </div>

            <div class="col-xs-6 text-right va-b pr5">
              <div class="login-links">
                <a href="http://www.sisacmpl.com.mx" class="active" title="Sign In">Página principal</a>
              </div>
            </div>

          </div>

          <div class="panel panel-info mt10 br-n">
            <!-- end .form-header section -->
            {{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
              <div class="panel-body bg-light p30">
                <div class="row">
                  <div class="col-sm-7 pr30">
                    <div class="section">
                      <label for="email" class="field-label text-muted fs18 mb10">Correo institucional</label>
                      <label for="email" class="field prepend-icon">
                        <!--<input type="text" name="email" id="email" class="gui-input" placeholder="correocmpl@ipn.mx">-->
						{{Form::text('email', null, array('class'=>'gui-input'))}}
                        <label for="email" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                      <label for="password" class="field-label text-muted fs18 mb10">Contraseña</label>
                      <label for="password" class="field prepend-icon">
                        <!--<input type="password" name="password" id="password" class="gui-input" placeholder="Ingrese contraseña">-->
						{{Form::password('password', array('class'=>'gui-input'))}}
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                  </div>
                  <div class="col-sm-5 br-l br-grey pl30">
                    <img src="./images/banner5.jpg" alt="CMPL" class="img-responsive w300">
                  </div>
                </div>
                @if(Session::has('msg'))
	                <div class="alert alert-success">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    {{Session::get('msg')}}
	                </div>
	            @endif
	            @if(Session::has('msgf'))
	                <div class="alert alert-warning">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    {{Session::get('msgf')}}
	                </div>
	            @endif              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix p10 ph15">
                <button type="submit" class="button btn-success mr10 pull-right">Iniciar sesión</button>
              </div>
              <!-- end .form-footer section -->
            {{Form::close()}}
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
    //Demo.init();

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2,
        y: window.innerHeight / 3.3
      },
    });

  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
