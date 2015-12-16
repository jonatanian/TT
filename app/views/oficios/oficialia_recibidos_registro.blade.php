@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left br-primary">
				<li class="">
					<a href="{{action('OficiosController@oficialia_recibidos')}}">Oficios entrantes</a>
				</li>
				<li>&frasl;</li>
				<li class="active">
					<a href="#">Nuevo</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('OficiosEntrantesController@oficialia_nuevoOficio')}}" class="btn btn-default btn-sm fw600 ml10">
			<span class="fa fa-plus pr5"></span> Nuevo oficio entrante</a>
		</div>
	</header>
	<!-- End: Topbar -->
@endsection
@section('content')

	<!-- Form Wizard -->
          <div class="admin-form theme-success">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"form-wizard",'files'=>true))}}
            <!--<form method="get" action="/" id="form-wizard">-->
              <div class="wizard steps-bg steps-justified">

                <!-- Wizard step 1 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-user pr5"></i> Datos del remitente</h4>
                <section class="wizard-section">
                
                   <div class="section col-md-6">
                    <label for="Remitente" class="field-label">Nombre del emisor</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="Remitente" class="field prepend-icon">
                        <select id="Remitente" name="Remitente" class="gui-input">
                      		@foreach($entidades_externas as $entidad_externa)
                      			@if($e == $entidad_externa->IdEntidadExterna)
                      				<option value="{{$entidad_externa->IdEntidadExterna}}" selected="selected">{{$entidad_externa->getNombreCompletoPMN()}}</option>
                      			@else
									<option value="{{$entidad_externa->IdEntidadExterna}}">{{$entidad_externa->getNombreCompletoPMN()}}</option>
								@endif
							@endforeach
						</select>
                        <label for="Remitente" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                      <a href="{{action('InstanciasExternasController@nuevoEmisorSaliente',array('DependenciaE'=>1,'AreaE'=>1))}}" class="button btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="CargoEmisor" class="field-label">Cargo del emisor</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="CargoEmisor" class="field prepend-icon">
                        <select id="CargoEmisor" name="CargoEmisor" class="gui-input">
                      		@foreach($cargos_entidades as $cargo_entidad)
                      			@if($ce == $cargo_entidad->IdCargoEntidad)
                      				<option value="{{$cargo_entidad->IdCargoEntidad}}" selected="selected">{{$cargo_entidad->NombreCargoEntidad}}</option>
                      			@else
                      				<option value="{{$cargo_entidad->IdCargoEntidad}}">{{$cargo_entidad->NombreCargoEntidad}}</option>
                      			@endif
							@endforeach
						</select>
                        <label for="CargoEmisor" class="field-icon">
                          <i class="fa fa-bookmark"></i>
                        </label>
                      </label>
                      <a href="{{action('InstanciasExternasController@nuevoCargoSaliente',array('DependenciaE'=>1,'AreaE'=>1))}}" class="button  btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>
                  <!-- end section -->
                
                  <div class="section col-md-6">
                    <label for="AreaE" class="field-label">Área que emite</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="AreaE" class="field prepend-icon">
                        <select id="AreaE" name="AreaE" class="gui-input">
                      		@foreach($dep_areas as $dep_area)
								@if($a == $dep_area->IdDependenciaArea)
									<option value="{{$dep_area->IdDependenciaArea}}" selected="selected">{{$dep_area->NombreDependenciaArea}}</option>
								@else
									<option value="{{$dep_area->IdDependenciaArea}}">{{$dep_area->NombreDependenciaArea}}</option>
								@endif
							@endforeach
						</select>
						<label for="AreaE" class="field-icon">
                          <i class="fa fa-circle-o-notch"></i>
                        </label>
                      </label>
                      <a href="{{action('InstanciasExternasController@nuevaAreaSaliente',array('DependenciaE'=>1))}}" class="button btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
                    </div>
                    <!-- end .smart-widget section -->
                  </div>

                  <div class="section col-md-6">
                    <label for="DependenciaE" class="field-label">Dependencia que emite</label>
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
                      <a href="{{action('InstanciasExternasController@nuevaDependenciaSaliente')}}" class="button btn-success"><i class="fa fa-plus-circle"></i>&nbsp;</a>
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
                      	{{Form::text('IdOficio', null, array('class'=>'gui-input','placeholder'=>'No. de oficio entrante...','id'=>'IdOficio','required'=>'required'))}}
                        <label for="IdOficio" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Requerido</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="DirigidoA" class="field-label">Dirigido a</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="DirigidoA" class="field prepend-icon">
                        <select id="DirigidoA" name="DirigidoA" class="gui-input">
							@foreach($usuarios as $usuario)
								@if($usuario->Cargo_Id == 1)
									<option selected="selected" value="{{$usuario->IdUsuario}}">{{$usuario->getNombreCompletoPMN()}}&nbsp;({{$usuario->NombreCargo}})</option>
								@else
									<option value="{{$usuario->IdUsuario}}">{{$usuario->getNombreCompletoPMN()}}&nbsp;({{$usuario->NombreCargo}})</option>
								@endif
							@endforeach
						</select>
						<label for="DirigidoA" class="field-icon">
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
                          <i class="fa fa-calendar"></i>
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
                      	{{Form::text('FechaRecepcion',$Fecha->format('d/m/Y'), array('class'=>'gui-input','id'=>'FechaRecepcion','required'=>'required'))}}
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
                  
                  <div class="section col-md-12">
                    <label for="TagsConfidenciales" class="field-label">¿Contiene datos confidenciales?</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="TagsConfidenciales" class="field prepend-icon">
                        <input type="text" id="TagsConfidenciales" name="TagsConfidenciales" class="form-control tm-input1" placeholder="Ingresa uno a uno los datos confidenciales, separados por un Enter...">
                      	<div class="tag-container tags1"></div>
                        <label for="TagsConfidenciales" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Opcional</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-12">
                    <label for="TagsAnexos" class="field-label">¿Contiene anexos?</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="TagsAnexos" class="field prepend-icon">
                        <input type="text" id="TagsAnexos" name="TagsAnexos" class="form-control tm-input2" placeholder="Ingresa uno a uno los anexos, separados por un Enter...">
                      	<div class="tag-container tags2"></div>
                        <label for="TagsAnexos" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Opcional</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                </section>

                <!-- Wizard step 3 -->
                <h4 class="wizard-section-title">
                  <i class="fa fa-cog pr5"></i> Configuración</h4>
                <section class="wizard-section">

				  <div class="section col-md-6">
                    <label for="TipoDeOficio" class="field-label">Selecciona el tipo de información del oficio</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="TipoDeOficio" class="field prepend-icon">
                        <select id="TipoDeOficio" name="TipoDeOficio" class="gui-input">
                        	@foreach($caracteres as $caracter)
								<option value="{{$caracter->IdCaracter}}">{{$caracter->NombreCaracter}}</option>
							@endforeach
						</select>
                        <label for="TipoDeOficio" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Requerido</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>
                  
                  <div class="section col-md-6">
                    <label for="PrioridadOE" class="field-label">Selecciona la prioridad del oficio</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="PrioridadOE" class="field prepend-icon">
                        <select id="PrioridadOE" name="PrioridadOE" class="gui-input">
                        	@foreach($prioridades as $prioridad)
								<option value="{{$prioridad->IdPrioridad}}">{{$prioridad->NombrePrioridad}}</option>
							@endforeach
						</select>
                        <label for="PrioridadOE" class="field-icon">
                          <i class="fa fa-file-o"></i>
                        </label>
                      </label>
                        <a href="#" class="button">Requerido</a>
	                </div>
                    <!-- end .smart-widget section -->
                  </div>

                  <div class="section col-md-12">
                    <label for="IdOficioR" class="field-label">¿Es un oficio de respuesta?</label>
                    <div class="smart-widget sm-right smr-120">
                      <label for="IdOficioR" class="field prepend-icon">
                        <select id="IdOficioR" name="IdOficioR" class="gui-input">
                        	<option value="0">Selecciona el ID del oficio saliente al que se responde...</option>
                        	@foreach($OSs as $OS)
								<option value="{{$OS->Correspondencia_Id}}">{{$OS->IdOficioSaliente}}</option>
							@endforeach
						</select>
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
                      	{{Form::text('FechaLimiteR', null, array('class'=>'gui-input','placeholder'=>'Selecciona una fecha límite para responder a este oficio...','id'=>'FechaLimiteR'))}}
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
	                <span class="text-warning">&lowast; Debe ser en formado PDF, menor a 1 MB (&lt;1024 KB)</span>
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
    
    // Init jQuery Tags Manager 
    $(".tm-input1").tagsManager({
      tagsContainer: '.tags1',
      tagClass: 'tm-tag-alert',
    });
    $(".tm-input2").tagsManager({
      tagsContainer: '.tags2',
      tagClass: 'tm-tag-system',
    });
    
    // Init Select2 - Basic Single
    $(".select2-success").select2();
	
    $(document).ready(function() {
		$('#FechaEmision').datepicker({
			todayHighlight: true,
    		startView: 3,
    		format: 'dd-mm-yyyy',
		});

		$('#FechaRecepcion').datepicker({
			todayHighlight: true,
    		startView: 3,
    		format: 'dd-mm-yyyy',
    		defaultDate: "12/12/2015",
		});
		
		$('#FechaLimiteR').datepicker({
			todayHighlight: true,
    		startView: 3,
    		format: 'dd-mm-yyyy',
		});
	});
  });
</script>
@stop