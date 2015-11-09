@extends('layouts.dsbd')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="#">Por seguridad puedes cambiar tu contraseña</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@stop
@section('content')
	
	<div class="admin-form">
			{{Form::open(array('action'=>'UsersController@personal_actualizarContrasenaUsuario', 'class'=>'form-horizontal row-border','id'=>'form-wizard', 'name'=>'form-wizard','data-parsley-validate'=>'true'))}}
            <!--<form method="get" action="/" id="form-wizard">-->
			{{Form::hidden('IdUsuario', $usuario->IdUsuario)}}
                <!-- Wizard step 1 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-user pr5"></i> Cambiar contraseña</h4>
                <section class="wizard-section">
					<div class="section">
						<label for="Nombre" class="field-label">Nombre de usuario</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Nombre" class="field prepend-icon">
							{{Form::text('Nombre', $usuario->getNombreCompleto(), array('class'=>'gui-input', 'name'=>'Nombre', 'required'=>'required'))}}
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="Password" class="field-label">Introduce tu password anterior</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="PasswordA" class="field prepend-icon">
							{{Form::password('PasswordA', array('class'=>'gui-input', 'name'=>'PasswordA', 'id'=>'Password', 'required'=>'required'))}}
							<span class="k-invalid-msg" data-for="PasswordA"></span><br />
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="Password" class="field-label">Introduce un nuevo password</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Password" class="field prepend-icon">
							{{Form::password('Password', array('class'=>'gui-input', 'name'=>'Password', 'id'=>'Password', 'required'=>'required'))}}
							<span class="k-invalid-msg" data-for="Password"></span><br />
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="Password-confirm" class="field-label">Confirmar password</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Password-confirm" class="field prepend-icon">
							{{Form::password('PasswordC', array('class'=>'gui-input', 'name'=>'PasswordC', 'id'=>'PasswordC', 'required'=>'required'))}}
							<span class="k-invalid-msg" data-for="Password-confirm"></span><br />
						  </label>
						</div>
					</div>

                </section>
				{{Form::submit('Recuperar', array('class'=>'btn btn-default"'))}}
				
            {{Form::close()}}
            <!-- End Account2 Form -->

          
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