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


  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- begin canvas animation bg -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>

      <!-- Begin: Content -->
      <section id="content" class="">

        <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">

          <div class="row mb15 table-layout">
              <a href="#" class="" title="home"><img src="{{asset('images/LogoSISAv4.png')}}" alt="AdminDesigns Logo" class="img-responsive w200 ml10"></a>
          </div>

          <div class="panel panel-info mt10 br-n">


            {{Form::open(array('action'=>'UsersController@dsbd_registrarUsuario', 'class'=>'form-horizontal row-border','id'=>"form-wizard",'data-parsley-validate'=>'true'))}}
              <div class="panel-body p25 bg-light">
                <div class="section-divider mt10 mb40">
                  <span>Datos del nuevo usuario</span>
                </div>
                <!-- .section-divider -->
				<div class="section">
                  <label for="Nombre" class="field prepend-icon">
                    <input type="text" name="Nombre" id="Nombre" class="gui-input" placeholder="Nombre(s)...">
                    <label for="Nombre" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
                </div>

                <div class="section row">
                  <div class="col-md-6">
                    <label for="ApPaterno" class="field prepend-icon">
                      <input type="text" name="ApPaterno" id="ApPaterno" class="gui-input" placeholder="Apellido paterno...">
                      <label for="ApPaterno" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->

                  <div class="col-md-6">
                    <label for="ApMaterno" class="field prepend-icon">
                      <input type="text" name="ApMaterno" id="ApMaterno" class="gui-input" placeholder="Apellido Materno...">
                      <label for="ApMaterno" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>
                  <!-- end section -->
                </div>
                <!-- end .section row section -->

        
				
				<div class="section">
                  <label for="Extension" class="field prepend-icon">
                    <input type="text" name="Extension" id="Extension" class="gui-input" placeholder="Extensión">
                    <label for="Extension" class="field-icon">
                      <i class="fa fa-phone"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->

                <div class="section">
                  <div class="smart-widget sm-right smr-120">
                    <label for="Email" class="field prepend-icon">
                      <input type="email" name="Email" id="Email" class="gui-input" placeholder="e-mail">
                      <label for="Email" class="field-icon">
                        <i class="fa fa-envelope"></i>
                      </label>
                    </label>
                    <label for="Email" class="button">@ipn.mx</label>
                  </div>
                  <!-- end .smart-widget section -->
                </div>
                <!-- end section -->
				<div class="section row">
				
					<div class="col-md-6">
					  <label for="Password" class="field prepend-icon">
						<input type="password" name="Password" id="Password" class="gui-input" placeholder="Introduce una contraseña">
						<label for="Password" class="field-icon">
						  <i class="fa fa-unlock-alt"></i>
						</label>
					  </label>
					</div>

					<div class="col-md-6">
					  <label for="PasswordC" class="field prepend-icon">
						<input type="password" name="PasswordC" id="PasswordC" class="gui-input" placeholder="Repita contraseña">
						<label for="PasswordC" class="field-icon">
						  <i class="fa fa-lock"></i>
						</label>
					  </label>
					</div>
				
				</div>
				@if(Session::has('msgf'))
	                <div class="alert alert-danger">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    {{Session::get('msgf')}}
	                </div>
				@endif
				<div class="section row">
					<div class="col-md-6">
						<label for="Area" class="field-label">Área</label>
						
						  <label for="Area" class="field prepend-icon">
						  {{Form::select('IdArea', $areas, array(''), array('class'=>'gui-input', 'name'=>'Area_Id'))}}
						  </label>
						
					</div>
					
					<div class="col-md-6">
						<label for="Cargo" class="field-label">Cargo</label>
						  <label for="Cargo" class="field prepend-icon">
						  {{Form::select('IdCargo', $cargos, array(''), array('class'=>'gui-input', 'name'=>'Cargo_Id'))}}
						  </label>
						
					</div>
				</div>
					
					<div class="section">
						<label for="Rol" class="field-label">Rol</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Rol" class="field prepend-icon">
						  {{Form::select('IdRol', $roles, array(''), array('class'=>'gui-input', 'name'=>'Rol_Id'))}}
						  </label>
						</div>
					</div>
                
                <!-- end section -->

              </div>
              <!-- end .form-body section -->
			  <div class="panel-footer clearfix">
				{{Form::submit('Registrar', array('class'=>'button btn-primary pull-right'))}}
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
