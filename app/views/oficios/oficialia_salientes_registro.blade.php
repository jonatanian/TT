@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="#">Oficios salientes</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('OficiosSalientesController@oficialia_nuevoOficio')}}" class="btn btn-default btn-sm fw600 ml10">
			<span class="fa fa-plus pr5"></span> Nuevo oficio saliente</a>
		</div>
	</header>
	<!-- End: Topbar -->
@stop
@section('content')

	<!-- Form Wizard -->
          <div class="admin-form">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"form-wizard",'data-parsley-validate'=>'true','files'=>true))}}
            <!--<form method="get" action="/" id="form-wizard">-->
              <div class="wizard steps-bg steps-justified">

                <!-- Wizard step 1 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-user pr5"></i> Datos del destinatario</h4>
                <section class="wizard-section">
                
                   <div class="section col-md-6">
                    <label for="Destinatario" class="field-label">Nombre del destinatario</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Destinatario" class="field prepend-icon">
                        <select id="Destinatario" name="Destinatario" class="gui-input">
                      		@foreach($entidades_externas as $entidad_externa)
                      			@if($e == $entidad_externa->IdEntidadExterna)
                      				<option value="{{$entidad_externa->IdEntidadExterna}}" selected="selected">{{$entidad_externa->getNombreCompletoPMN()}}</option>
                      			@else
									<option value="{{$entidad_externa->IdEntidadExterna}}">{{$entidad_externa->getNombreCompletoPMN()}}</option>
								@endif
							@endforeach
						</select>
                        <label for="Destinatario" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                      <a href="{{action('InstanciasExternasController@nuevoEmisor',array('DependenciaD'=>1,'AreaD'=>1))}}" class="button btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="CargoDestinatario" class="field-label">Cargo del destinatario</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="CargoDestinatario" class="field prepend-icon">
                        <select id="CargoDestinatario" name="CargoDestinatario" class="gui-input">
                      		@foreach($cargos_entidades as $cargo_entidad)
                      			@if($ce == $cargo_entidad->IdCargoEntidad)
                      				<option value="{{$cargo_entidad->IdCargoEntidad}}" selected="selected">{{$cargo_entidad->NombreCargoEntidad}}</option>
                      			@else
                      				<option value="{{$cargo_entidad->IdCargoEntidad}}">{{$cargo_entidad->NombreCargoEntidad}}</option>
                      			@endif
							@endforeach
						</select>
                        <label for="CargoDestinatario" class="field-icon">
                          <i class="fa fa-bookmark"></i>
                        </label>
                      </label>
                      <a href="{{action('InstanciasExternasController@nuevoCargo',array('DependenciaD'=>1,'AreaD'=>1))}}" class="button  btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  <!-- end section -->
                
                  <div class="section col-md-6">
                    <label for="AreaD" class="field-label">Área del destinatario</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="AreaD" class="field prepend-icon">
                        <select id="AreaD" name="AreaD" class="gui-input">
                      		@foreach($dep_areas as $dep_area)
								@if($a == $dep_area->IdDependenciaArea)
									<option value="{{$dep_area->IdDependenciaArea}}" selected="selected">{{$dep_area->NombreDependenciaArea}}</option>
								@else
									<option value="{{$dep_area->IdDependenciaArea}}">{{$dep_area->NombreDependenciaArea}}</option>
								@endif
							@endforeach
						</select>
						<label for="AreaD" class="field-icon">
                          <i class="fa fa-circle-o-notch"></i>
                        </label>
                      </label>
                      <a href="{{action('InstanciasExternasController@nuevaArea',array('DependenciaE'=>1))}}" class="button btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>

                  <div class="section col-md-6">
                    <label for="DependenciaE" class="field-label">Dependencia del destinatario</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="DependenciaE" class="field prepend-icon">
                      	<select id="DependenciaE" name="DependenciaE" class="gui-input" onclick="{{action('InstanciasExternasController@nuevaDependencia')}}" >
                      		@foreach($dependencias as $dependencia)
								@if($dep == $dependencia->IdDependencia)
									<option value="{{$dependencia->IdDependencia}}" selected="selected">{{$dependencia->NombreDependencia}}&nbsp;-&nbsp;{{$dependencia->AcronimoDependencia}}</option>
								@else
									<option value="{{$dependencia->IdDependencia}}">{{$dependencia->NombreDependencia}}&nbsp;-&nbsp;{{$dependencia->AcronimoDependencia}}</option>
								@endif
							@endforeach
						</select>
						<label for="DependenciaE" class="field-icon">
                          <i class="fa fa-bank"></i>
                        </label>                        
                      </label>
                      <a href="{{action('InstanciasExternasController@nuevaDependencia')}}" class="button btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                </section>

				<!-- Wizard step 2 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-file-o pr5"></i> Datos del oficio</h4>
                <section class="wizard-section">

                  <div class="section col-md-6">
                    <label for="IdOficio" class="field-label">Número de oficio</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="IdOficio" class="field prepend-icon">
                      	{{Form::text('IdOficio', $idOficio, array('class'=>'gui-input','id'=>'IdOficio','required'=>'required', 'readonly'=>'readonly'))}}
                        <label for="IdOficio" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Requerido</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="Remitente" class="field-label">Remitente</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Remitente" class="field prepend-icon">
                        <select id="Remitente" name="Remitente" class="gui-input">
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
	                    {{Form::text('FechaEmision', null, array('class'=>'gui-input','placeholder'=>'Elije una fecha...','id'=>'FechaEmision','required'=>'required'))}}
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
                      	{{Form::text('FechaRecepcion', null, array('class'=>'gui-input','placeholder'=>'Se registra hasta que llegue el acuse','id'=>'FechaRecepcionx', 'readonly'=>'readonly'))}}
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

                  <!--<div class="section">
                    <label for="IdOficioR" class="field-label">¿Es un oficio de respuesta?</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="IdOficioR" class="field prepend-icon">
                        <select id="IdOficioR" name="IdOficioR" class="gui-input">
                        	<option value="0">Selecciona el oficio al que se responde...</option>
                      		@foreach($OEs as $OE)
								<option value="{{$OE->Correspondencia_Id}}">{{$OE->Correspondencia_Id}}</option>
							@endforeach
						</select>
                        <label for="IdOficioR" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Opcional</a>
	                </div>
                    <!-- end .smart-widget section ->
                  </div>-->
                  
                  
				  
				  <div class="section">
                    <label for="FechaLimiteR" class="field-label">Si requiere respuesta introduzca una fecha límite para respuesta</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="FechaLimiteR" class="field prepend-icon">
                      	{{Form::text('FechaLimiteR', null, array('class'=>'gui-input','placeholder'=>'Introduzca una fecha límite...','id'=>'FechaLimiteR'))}}
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