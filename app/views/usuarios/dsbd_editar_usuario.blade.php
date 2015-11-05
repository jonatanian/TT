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
			{{Form::open(array('action'=>'UsersController@dsbd_actualizarUsuario', 'class'=>'form-horizontal row-border','id'=>"form-wizard",'data-parsley-validate'=>'true'))}}
            <!--<form method="get" action="/" id="form-wizard">-->
			{{Form::hidden('IdUsuario', $usuario->IdUsuario)}}
                <!-- Wizard step 1 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-user pr5"></i> Datos del nuevo usuario</h4>
                <section class="wizard-section">
					<div class="section">
						<label for="Nombre" class="field-label">Nombre</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Nombre" class="field prepend-icon">
							{{Form::text('Nombre', $usuario->Nombre, array('class'=>'gui-input', 'name'=>'Nombre', 'required'=>'required'))}}
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="ApPaterno" class="field-label">Apellido paterno</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="ApPaterno" class="field prepend-icon">
							{{Form::text('ApPaterno', $usuario->ApPaterno, array('class'=>'gui-input', 'name'=>'ApPaterno', 'required'=>'required'))}}
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="ApMaterno" class="field-label">Apellido Materno</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="ApMaterno" class="field prepend-icon">
							{{Form::text('ApMaterno', $usuario->ApMaterno, array('class'=>'gui-input', 'name'=>'ApMaterno', 'required'=>'required'))}}
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="Extension" class="field-label">Extensión</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Extension" class="field prepend-icon">
							{{Form::text('Extension', $usuario->Extension, array('class'=>'gui-input', 'name'=>'Extension', 'required'=>'required'))}}
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="Email" class="field-label">Email</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Email" class="field prepend-icon">
							{{Form::text('Email', $usuario->Email, array('class'=>'gui-input', 'name'=>'Email', 'required'=>'required'))}}
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="Area" class="field-label">Área</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Area" class="field prepend-icon">
						  {{Form::select('IdArea', $areas, $usuario->Area_Id, array('class'=>'gui-input', 'name'=>'Area_Id'))}}
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="Cargo" class="field-label">Cargo</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Cargo" class="field prepend-icon">
						  {{Form::select('IdCargo', $cargos, $usuario->Cargo_Id, array('class'=>'gui-input', 'name'=>'Cargo_Id'))}}
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="Rol" class="field-label">Rol</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Rol" class="field prepend-icon">
						  {{Form::select('IdRol', $roles, $usuario->Rol_Id, array('class'=>'gui-input', 'name'=>'Rol_Id'))}}
						  </label>
						</div>
					</div>
                </section>
				{{Form::submit('Actualizar', array('class'=>'btn btn-default"'))}}
				
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

    
  });
</script>
@stop