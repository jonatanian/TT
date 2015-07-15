@extends('layouts.oficialia')

@section('content')

<div class="admin-form theme-success mw1000 center-block">
	<h2>Nuevo oficio saliente</h2>
	<p class="lead">Por favor, rellene los siguientes campos.</p>
	<div class="panel panel-success heading-border">
		<div class="panel-body">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
			{{Form::hidden('TipoOficio',$TipoOficio, array('id'=>'TipoOficio'))}}
				<div class="section-divider mt20 mb40">
					<span> Datos del receptor </span>
				</div>
				<div class="section row">
					<div class="col-md-6">
						<h4>Dependencia a enviar:</h4>
						<label for="DependenciaAEnviar" class="field prepend-icon">
							{{Form::label('DependenciaAEnviar',$dependencia->AcronimoDependencia, array('class'=>'gui-input','id'=>'DependenciaAEnviar','placeholder'=>'Dependencia','required'=>'required'))}}
							{{Form::hidden('IdDependenciaAEnviar',$dependencia->IdDependencia, array('id'=>'IdDependenciaAEnviar'))}}
							<label for="DependenciaAEnviar" class="field-icon">
								<i class="fa fa-institution"></i>
							</label>
						</label>
					</div>
					<div class="col-md-6">
						<h4>Área a enviar:</h4>
						<label for="AreaAEnviar" class="field prepend-icon">
							{{Form::label('AreaAEnviar',$area->NombreDependenciaArea, array('class'=>'gui-input','id'=>'AreaAEnviar','placeholder'=>'Área que emite','required'=>'required'))}}
							{{Form::hidden('IdAreaAEnviar',$area->IdDependenciaArea, array('id'=>'IdAreaAEnviar'))}}
							<label for="AreaAEnviar" class="field-icon">
								<i class="fa fa-adjust"></i>
							</label>
						</label>
					</div>
				</div>
				<div class="section row">
					<div class="col-md-6">
						<h4>Nombre del destinatario:</h4>
						<label for="Destinatario" class="field prepend-icon">
							{{Form::label('Destinatario',$entidad->getNombreCompletoE(), array('class'=>'gui-input','id'=>'Destinatario','placeholder'=>'Nombre del emisor','required'=>'required'))}}
							{{Form::hidden('IdEntidad',$entidad->IdEntidadExterna, array('id'=>'IdEntidad'))}}
							<label for="Destinatario" class="field-icon">
								<i class="fa fa-user"></i>
							</label>
						</label>
					</div>
					<div class="col-md-6">
						<h4>Cargo del destinatario:</h4>
						<label for="CargoDestinatario" class="field prepend-icon">
							{{Form::label('CargoDestinatario',$entidad->NombreCargoEntidad, array('class'=>'gui-input','id'=>'CargoDestinatario','placeholder'=>'Cargo','required'=>'required'))}}
							{{Form::hidden('IdCargoEntidad',$entidad->IdCargoEntidad, array('id'=>'IdCargoEntidad'))}}
							<label for="CargoDestinatario" class="field-icon">
								<i class="fa fa-dashcube"></i>
							</label>
						</label>
					</div>
				</div>
				
				<div class="section-divider mt20 mb40">
					<span> Datos del oficio </span>
				</div>
				<div class="section row">
					<div class="col-md-6">
						<h4>Número de oficio:</h4>
						<label for="IdOficio" class="field prepend-icon">
							{{Form::label('IdOficio','Se generará al finalizar el registro', array('class'=>'gui-input','id'=>'IdOficio'))}}
							<label for="IdOficio" class="field-icon">
								<i class="fa fa-file"></i>
							</label>
						</label>
					</div>
					<div class="col-md-6">
						<h4>Emitido por:</h4>
						<label for="DirigidoA" class="field prepend-icon">
							{{Form::label('NombreEmisor',Auth::User()->getNombreCompleto(),array('class'=>'gui-input','id'=>'NombreEmisor'))}}
							<label for="DirigidoA" class="field-icon">
								<i class="fa fa-user"></i>
							</label>
						</label>
					</div>
				</div>
				<div class="section row">
					<div class="col-md-6">
						<h4>Fecha de emisión:</h4>
						<label for="FechaEmision" class="field prepend-icon">
							{{Form::text('FechaEmision', null, array('class'=>'gui-input','id'=>'FechaEmision','placeholder'=>'Fecha de emisión','required'=>'required'))}}
							<label for="FechaEmision" class="field-icon">
								<i class="fa fa-calendar"></i>
							</label>
						</label>
					</div>
					<div class="col-md-6">
						<h4>Fecha de recepción:</h4>
						<label for="FechaEntrega" class="field prepend-icon">
							{{Form::text('FechaEntrega', null, array('class'=>'gui-input','id'=>'FechaEntrega','placeholder'=>'Fecha de entrega','required'=>'required'))}}
							<label for="FechaEntrega" class="field-icon">
								<i class="fa fa-calendar"></i>
							</label>
						</label>
					</div>
				</div>
				
				<div class="section-divider mt20 mb40">
					<span> Asunto </span>
				</div>
				<div class="section">
					<label for="Asunto" class="field prepend-icon">
						{{Form::textarea('Asunto', null, array('class'=>'gui-textarea','id'=>'Asunto','placeholder'=>'Asunto...','required'=>'required'))}}
						<label for="Asunto" class="field-icon">
							<i class="fa fa-comments"></i>
						</label>
						<span class="input-footer">
							<strong>Recomendación:</strong> Sea breve, claro y conciso en la redacción del asunto.
						</span>
					</label>
				</div>
				<div class="section-divider mv40" id="spy5">
					<span> Configuración del oficio </span>
				</div>
				<div class="section row">
					<div class="col-md-6">
						<h4>Establecer prioridad:</h4>
						<label for="Prioridad" class="field prepend-icon">
							{{Form::select('Prioridad',$prioridad,null,array('class'=>'gui-input','id'=>'Prioridad','required'=>'required'))}}
							<label for="Prioridad" class="field-icon">
								<i class="fa fa-warning"></i>
							</label>
						</label>
					</div>
					<div class="col-md-6">
						<h4>Oficio de carácter:</h4>
						<label for="Caracter" class="field prepend-icon">
							{{Form::select('Caracter',$caracteres,null,array('class'=>'gui-input','id'=>'Caracter','required'=>'required'))}}
							<label for="Caracter" class="field-icon">
								<i class="fa fa-"></i>
							</label>
						</label>
					</div>
				</div>
				<div class="section row">
					
					<div class="col-md-6">
						<label for="FechaLimiteR" class="field prepend-icon">
							<h4>¿Requiere respuesta?</h4>
							<label for="FechaLimiteR" class="field prepend-icon">
								{{Form::text('FechaLimiteR', null, array('class'=>'gui-input','id'=>'FechaLimiteR','placeholder'=>'Fecha límite de respuesta'))}}
								<label for="FechaLimiteR" class="field-icon">
									<i class="fa fa-calendar"></i>
								</label>
							</label>
						</label>
					</div>
				<div class="section row">
					<div class="col-md-6">
						<h4>¿Es un oficio en respuesta a un oficio anterior?</h4>
						<label for="EnRespuestaA" class="field prepend-icon">
							{{Form::text('EnRespuestaA', null, array('class'=>'gui-input','id'=>'EnRespuestaA','placeholder'=>'Escriba aquí el número de oficio anterior'))}}
							<label for="EnRespuestaA" class="field-icon">
								<i class="fa fa-file-o"></i>
							</label>
						</label>
					</div>
					<div class="col-md-6">
						<h4>¿El oficio contiene anexos?</h4>
						<div class="checkbox-custom checkbox-success mb5">
							{{Form::checkbox('TieneAnexos','true',true, array('id'=>'TieneAnexos'))}}
							<label for="TieneAnexos"> Sí / No</label>
                        </div>
					</div>
				</div>
				<div class="section row">
					<div class="col-md-12">
						<h4>Subir copia digital:</h4>
						<label for="file1" class="field file">
							<span class="button btn-system"> Adjuntar documento </span>
							<input type="file" class="gui-file" name="DocPDF" id="DocPDF" onChange="document.getElementById('uploader1').value = this.value;">
							<input type="text" class="gui-input" id="uploader1" placeholder="No se ha seleccionado documento PDF" readonly>
						</label>
					</div>
				</div>
				<div class="panel-footer text-right">
					<button type="submit" class="button btn-success"> Registrar </button>
					<a href="{{action('OficiosController@oficialia_recibidos')}}" class="button btn-dark">Cancelar</a>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<br>
@stop

@section('scripts')
	{{HTML::script('avalon/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}
	<script>
		$(document).ready(function() {
			$('#FechaEmision').datepicker({
				todayHighlight: true,
	    		startView: 3,
	    		format: 'yyyy-mm-dd'
			});

			$('#FechaEntrega').datepicker({
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
		
	</script>
@stop