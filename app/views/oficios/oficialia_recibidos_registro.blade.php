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
                  <i class="fa fa-user pr5"></i> Datos del remitente</h4>
                <section class="wizard-section">

                  <div class="section col-md-6">
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
                      <a href="{{action('InstanciasExternasController@nuevaDependencia')}}" class="button btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="Area" class="field-label">Área que emite</label>
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
                      <a href="#" class="button btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="Remitente" class="field-label">Nombre del emisor</label>
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
                      <a href="#" class="button btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="Cargo" class="field-label">Cargo del emisor</label>
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
                      <a href="#" class="button  btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  <!-- end section -->

                </section>

				<!-- Wizard step 2 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-file-o pr5"></i> Datos del oficio</h4>
                <section class="wizard-section">

                  <div class="section col-md-6">
                    <label for="IdOficio" class="field-label">Número de oficio</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="IdOficio" class="field prepend-icon">
                        <input type="text" name="IdOficio" id="IdOficioR" class="gui-input" placeholder="No. de oficio entrante...">
                        <label for="IdOficio" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Requerido</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="Remitente" class="field-label">Dirigido a</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Remitente" class="field prepend-icon">
                        <select id="DirigidoA" name="DirigidoA" class="gui-input">
							@foreach($usuarios as $usuario)
								@if($usuario->Cargo_Id == 1)
									<option selected="selected" value="{{$usuario->IdUsuario}}">{{$usuario->getNombreCompletoPMN()}}</option>
								@else
									<option value="{{$usuario->IdUsuario}}">{{$usuario->getNombreCompletoPMN()}}</option>
								@endif
							@endforeach
						</select>                        
						<label for="Remitente" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                      <a href="#" class="button">Requerido</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="FechaEmision" class="field-label">Fecha de emisión</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="FechaEmision" class="field prepend-icon">
                        <input type="text" name="FechaEmision" id="FechaEmision" class="gui-input" placeholder="Elije una fecha...">
                        <label for="FechaEmision" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Requerido</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="FechaRecepcion" class="field-label">Fecha de recepción</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="FechaRecepcion" class="field prepend-icon">
                        <input type="text" name="FechaRecepcion" id="FechaRecepcion" class="gui-input" placeholder="Elije una fecha...">
                        <label for="FechaRecepcion" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Requerido</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-12">
                    <label for="Asunto" class="field-label">Asunto</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Asunto" class="field prepend-icon">
						{{Form::textarea('Asunto', null, array('class'=>'gui-textarea','id'=>'Asunto','placeholder'=>'Asunto...','required'=>'required'))}}
						<label for="Asunto" class="field-icon">
							<i class="fa fa-comments"></i>
						</label>
						<span class="input-footer">
							<strong>Recomendación:</strong> Sea breve, claro y conciso en la redacción del asunto.
						</span>
					  </label>
					  	<a href="#" class="button">Requerido</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                </section>

                <!-- Wizard step 3 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-cog pr5"></i> Configuración</h4>
                <section class="wizard-section">

                  <div class="section">
                    <label for="IdOficioR" class="field-label">¿Es un oficio de respuesta?</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="IdOficioR" class="field prepend-icon">
                        <input type="text" name="IdOficioR" id="IdOficioR" class="gui-input" placeholder="Escribe el número del oficio al que se responde...">
                        <label for="IdOficioR" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Opcional</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="FechaLimiteR" class="field-label">¿Requiere respuesta?</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="FechaLimiteR" class="field prepend-icon">
                        <input type="text" name="FechaLimiteR" id="FechaLimiteR" class="gui-input" placeholder="Seleccione fecha límite para responder a este oficio...">
                        <label for="FechaLimiteR" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Opcional</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section">
                    <label for="PDF" class="field-label">Subir copia digital</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="file1" class="field file">
						<span class="button bg-system"> Adjuntar </span>
						<input type="file" class="gui-file" name="DocPDF" id="DocPDF" onChange="document.getElementById('uploader1').value = this.value;">
						<input type="text" class="gui-input" id="uploader1" placeholder="No se ha seleccionado documento PDF" readonly>
					  </label>
					  	<a href="#" class="button">Requerido</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                </section>
              </div>
              <!-- End: Wizard -->

            {{Form::close()}}
            <!-- End Account2 Form -->

          </div>
          <!-- end: .admin-form -->
          
          
@stop

@section('scripts')
{{HTML::script('avalon/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}

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
        return form.submit();
      }
    });

    $(document).ready(function() {
		$('#FechaEmision').datepicker({
			todayHighlight: true,
    		startView: 3,
    		format: 'yyyy-mm-dd'
		});

		$('#FechaRecepcion').datepicker({
			todayHighlight: true,
    		startView: 3,
    		format: 'yyyy-mm-dd'
		});
		
		$('#FechaLimiteR').datepicker({
			todayHighlight: true,
    		startView: 3,
    		format: 'yyyy-mm-dd'
		});
	});
  });
</script>
@stop