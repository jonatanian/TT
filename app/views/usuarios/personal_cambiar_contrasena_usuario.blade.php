<!DOCTYPE html>
<html>

<head>
<!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>SISA-CMPL | Instituto Politécnico Nacional</title>
  <meta name="keywords" content="SISA-CMPL IPN" />
  <meta name="description" content="Centro Mexicano para la Producción más Limpia del Instituto Politécnico Nacional">
  <meta name="author" content="Alcántara Carrillo Oscar; Castañeda Chavero Jonatan Ian">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  {{HTML::style("http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700")}}
  <!-- Theme CSS -->
  {{HTML::style("assets/skin/default_skin/css/theme.css")}}
  <!-- Admin Forms CSS -->
  {{HTML::style("assets/admin-tools/admin-forms/css/admin-forms.css")}}
  <!-- Favicon -->
  {{HTML::style("assets/img/favicon.ico")}}
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">


  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- begin canvas animation bg -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>

      <!-- Begin: Content -->
      <section id="content" class="animated fadeIn">

        <div class="admin-form theme-info mw500" style="margin-top: 10%;" id="login">
          <div class="row mb15 table-layout">

            <div class="col-xs-6 pln">
              <a href="dashboard.html" title="Return to Dashboard">
                <img src="{{asset('images/LogoSISAv4.png')}}" title="AdminDesigns Logo" class="img-responsive w250">
              </a>
            </div>

            <div class="col-xs-6 va-b">
              <div class="login-links text-right">
                <a href="#" class="" title="False Credentials">Cambia tu contraseña por seguridad</a>
              </div>
            </div>
          </div>

          <div class="panel panel-info">

            {{Form::open(array('action'=>'UsersController@personal_actualizarContrasenaUsuario', 'class'=>'form-horizontal row-border','id'=>'form-wizard', 'name'=>'form-wizard','data-parsley-validate'=>'true'))}}
            <!--<form method="get" action="/" id="form-wizard">-->
			{{Form::hidden('IdUsuario', $usuario->IdUsuario)}}
              
              <!-- end .form-body section -->
              <div class="panel-footer p25 pv15">

               <div class="section">
			   @if(Session::has('msgf'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{Session::get('msgf')}}
					</div>
				@endif
						<label for="Nombre" class="field-label">Nombre del usuario</label>
						<div class="smart-widget sm-right">
						  <label for="Nombre" class="field prepend-icon">
							{{Form::label('Nombre', $usuario->getNombreCompleto(), array('class'=>'gui-input', 'name'=>'Nombre', 'required'=>'required'))}}
						  </label>
						</div>
					</div>
					
					<div class="section">
						<div class="smart-widget sm-right">
						  <label for="PasswordA" class="field prepend-icon">
							{{Form::password('PasswordA', array('class'=>'gui-input', 'name'=>'PasswordA', 'id'=>'Password', 'placeholder'=>'Contraseña actual...', 'required'=>'required'))}}
							<span class="k-invalid-msg" data-for="PasswordA"></span><br />
						  </label>
						</div>
						
					</div>
					
					<div class="section">
						<label for="Password" class="field-label">Introduce un nuevo password</label>
						<div class="smart-widget sm-right">
						  <label for="Password" class="field prepend-icon">
							{{Form::password('Password', array('class'=>'gui-input', 'name'=>'Password', 'id'=>'Password', 'placeholder'=>'Nueva contraseña...','required'=>'required'))}}
							<span class="k-invalid-msg" data-for="Password"></span><br />
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="Password-confirm" class="field-label">Confirmar password</label>
						<div class="smart-widget sm-right">
						  <label for="Password-confirm" class="field prepend-icon">
							{{Form::password('PasswordC', array('class'=>'gui-input', 'name'=>'PasswordC', 'id'=>'PasswordC', 'placeholder'=>'Confirmar contraseña...','required'=>'required'))}}
							<span class="k-invalid-msg" data-for="Password-confirm"></span><br />
						  </label>
						</div>
					</div>
                <!-- end section -->
					{{Form::submit('Cambiar', array('class'=>'button btn-primary pull-right'))}}
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

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  
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


    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2.1,
        y: window.innerHeight / 4.2
      },
    });
  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
