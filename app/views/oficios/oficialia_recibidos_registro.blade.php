@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="#">Oficios entrantes</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('OficiosEntrantesController@oficialia_nuevoOficio')}}" class="btn btn-default btn-sm fw600 ml10">
			<span class="fa fa-plus pr5"></span> Nuevo oficio entrante</a>
		</div>
	</header>
	<!-- End: Topbar -->
@stop
@section('content')

	<!-- Form Wizard -->
          <div class="admin-form">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"form-wizard",'data-parsley-validate'=>'true'))}}
            <!--<form method="get" action="/" id="form-wizard">-->
              <div class="wizard steps-bg steps-justified">

                <!-- Wizard step 1 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-user pr5"></i> Datos del oficio</h4>
                <section class="wizard-section">

                  <div class="section">
                    <label for="Dependencia" class="field-label">Dependencia que emite</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Dependencia" class="field prepend-icon">
                      	<select id="Dependencia" name="Dependencia" class="gui-input">
                      		<option id="0">Selecciona una dependencia...</option>
							@foreach($dependencias as $dependencia)
								<option id="{{$dependencia->IdDependencia}}">{{$dependencia->NombreDependencia}}</option>
							@endforeach
						</select>
                        <label for="Dependencia" class="field-icon">
                          <i class="fa fa-bank"></i>
                        </label>                        
                      </label>
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i>&nbsp;</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="Area" class="field-label">Área</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Area" class="field prepend-icon">
                        <select id="Area" name="Area" class="gui-input">
                      		<option id="0">Selecciona una área...</option>
							@foreach($dep_areas as $dep_area)
								<option id="{{$dep_area->IdDependenciaArea}}">{{$dep_area->NombreDependenciaArea}}</option>
							@endforeach
						</select>
                        <label for="Area" class="field-icon">
                          <i class="fa fa-circle-o-notch"></i>
                        </label>
                      </label>
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="Remitente" class="field-label">Remitente</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Remitente" class="field prepend-icon">
                        <select id="Area" name="Area" class="gui-input">
                      		<option id="0">Selecciona un remitente...</option>
							@foreach($entidades_externas as $entidad_externa)
								<option id="{{$entidad_externa->IdEntidadExterna}}">{{$entidad_externa->getNombreCompletoPMN()}}</option>
							@endforeach
						</select>
                        <label for="Remitente" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="Cargo" class="field-label">Cargo</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Cargo" class="field prepend-icon">
                        <select id="Area" name="Area" class="gui-input">
                      		<option id="0">Selecciona un cargo...</option>
							@foreach($cargos_entidades as $cargo_entidad)
								<option id="{{$cargo_entidad->IdCargoEntidad}}">{{$cargo_entidad->NombreCargoEntidad}}</option>
							@endforeach
						</select>
                        <label for="Cargo" class="field-icon">
                          <i class="fa fa-bookmark"></i>
                        </label>
                      </label>
                      <a href="#" class="button"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  <!-- end section -->

                </section>

                <!-- Wizard step 2 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-cog pr5"></i> Configuración del oficio</h4>
                <section class="wizard-section">

                  

                </section>

                <!-- Wizard step 3 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-paperclip pr5"></i> Anexos</h4>
                <section class="wizard-section">

                  
                </section>
              </div>
              <!-- End: Wizard -->

            {{Form::close()}}
            <!-- End Account2 Form -->

          </div>
          <!-- end: .admin-form -->
          
          
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