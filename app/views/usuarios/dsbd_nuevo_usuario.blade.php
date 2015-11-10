@extends('layouts.dsbd')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="#">Nuevo Usuario</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@stop
@section('content')
	
	<div class="admin-form">
			{{Form::open(array('action'=>'UsersController@dsbd_registrarUsuario', 'class'=>'form-horizontal row-border','id'=>"form-wizard",'data-parsley-validate'=>'true'))}}
            <!--<form method="get" action="/" id="form-wizard">-->
			
			<!------------------------------------------------------------->
	<section id="content_wrapper">
 

      <!-- Begin: Content -->
      

        <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">

          <div class="panel panel-info mt10 br-n">

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

                <!-- .section-divider -->

                <!-- end section -->

              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix">
				{{Form::submit('Registrar', array('class'=>'button btn-primary pull-right"'))}}
              </div>
              <!-- end .form-footer section -->
            
          </div>
        </div>


    </section>

    {{Form::close()}}          
	</div>
          
@stop

@section('scripts')
<script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Form Wizard 
    var form = $("#form-wizard");
    form.children(".wizard").steps({
      headerTag: ".wizard-section-title",
      bodyTag: ".wizard-section",
      onStepChanging: function(event, currentIndex, newIndex) {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
      },
      onFinishing: function(event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
      },
      onFinished: function(event, currentIndex) {
        alert("Submitted!");
      }
    });

    
  });
</script>
@stop