@extends('layouts.dsbd')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="#">Recuperar Contraseña de Usuario</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@stop
@section('content')
	
	<div class="admin-form">
			

            {{Form::open(array('action'=>'UsersController@dsbd_actualizarContrasenaUsuario', 'class'=>'form-horizontal row-border','id'=>'form-wizard', 'name'=>'form-wizard','data-parsley-validate'=>'true'))}}
            <!--<form method="get" action="/" id="form-wizard">-->
			{{Form::hidden('IdUsuario', $usuario->IdUsuario)}}

              <!-- end .form-body section -->
              <div class="panel-footer p25 pv15">

               <div class="section">
						<label for="Nombre" class="field-label">Nombre de usuario</label>
						<div class="smart-widget sm-right">
						  <label for="Nombre" class="field prepend-icon">
							{{Form::text('Nombre', $usuario->getNombreCompleto(), array('class'=>'gui-input', 'name'=>'Nombre', 'required'=>'required'))}}
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
	

          $("#form-wizard").kendoValidator({
              rules: {
                  verifyPasswords: function(input){
                     var ret = true;
                             if (input.is("[name=Password-confirm]")) {
                                 ret = input.val() === $("#Password").val();
                             }
                             return ret;
                  }
              },
              messages: {
                  verifyPasswords: "Passwords do not match!"
              }
          });
   });
</script>
@stop