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
			{{Form::open(array('action'=>'UsersController@dsbd_actualizarEstatus', 'class'=>'form-horizontal row-border','id'=>'form-wizard', 'name'=>'form-wizard','data-parsley-validate'=>'true'))}}
            <!--<form method="get" action="/" id="form-wizard">-->
			{{Form::hidden('IdUsuario', $usuario->IdUsuario)}}
                <!-- Wizard step 1 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-user pr5"></i> Cambiar estátus del usuario</h4>
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
						<label for="Activo" class="field-label">Selecciona el estátus</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="Activo" class="field prepend-icon">
							{{Form::select('Activo', array('1'=>'activo', '0'=>'Inactivo'), 0,array('class'=>'gui-input','name'=>'Activo', 'id'=>'Activo', 'required'=>'required'))}}
							<span class="k-invalid-msg" data-for="Password"></span><br />
						  </label>
						</div>
					</div>
					
					<div class="section">
						<label for="FechaFin" class="field-label">Introduce la fecha en la que el usuario dejó de laborar</label>
						<div class="smart-widget sm-right smr-120">
						  <label for="FechaFin" class="field prepend-icon">
							{{Form::text('FechaFin',null, array('class'=>'gui-input', 'id'=>'FechaFin', 'required'=>'required'))}}
							<span class="k-invalid-msg" data-for="FechaFin"></span><br />
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
{{HTML::script('avalon/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}
	<script>
		$(document).ready(function() {
			$('#FechaFin').datepicker({
				todayHighlight: true,
	    		startView: 3,
	    		format: 'yyyy-mm-dd'
			});
		});
	</script>
@stop