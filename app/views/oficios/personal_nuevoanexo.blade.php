﻿@extends('layouts.oficialia')

@section('content')

<div class="admin-form theme-success mw1000 center-block">
	@if($TipoOficio == 1)
		<h2>Registro de anexos para Oficios Entrantes</h2>
		<p class="lead">Por favor, rellene los siguientes campos.</p>
		<div class="panel panel-success heading-border">
			<div class="panel-body">
				{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
					<div class="section row">
						<div class="col-md-6">
							<h4>Dependencia:</h4>
							<label for="Dependencia" class="field prepend-icon">
								{{Form::label('Dependencia',$OficioEntrante->AcronimoDependencia, array('class'=>'gui-input','id'=>'Dependencia','required'=>'required'))}}
								<label for="Dependencia" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
						</div>
						<div class="col-md-6">
							<h4>Id del oficio:</h4>
							<label for="AreaAEnviar" class="field prepend-icon">
								{{Form::label('IdOficioDependencia',$OficioEntrante->IdOficioDependencia, array('class'=>'gui-input','id'=>'IdOficioDependencia',))}}
								{{Form::hidden('IdCorrespondencia',$OficioEntrante->IdCorrespondencia)}}
								<label for="AreaAEnviar" class="field-icon">
									<i class="fa fa-adjust"></i>
								</label>
							</label>
						</div>
					</div>
					
					<div class="section-divider mt20 mb40">
						<span> Datos del nuevo anexo </span>
					</div>
					<div class="section row">
						<div class="col-md-6">
							<h4>Nonmbre del anexo:</h4>
							<label for="IdOficio" class="field prepend-icon">
								{{Form::text('NombreAnexo',null, array('class'=>'gui-input','placeholder'=>'Ingrese el nombre del anexo...','id'=>'NombreAnexo'))}}
								<label for="IdOficio" class="field-icon">
									<i class="fa fa-file"></i>
								</label>
							</label>
						</div>
					</div>
	
					
					<div class="section-divider mt20 mb40">
						<span> Descripción del anexo </span>
					</div>
					<div class="section">
						<label for="DescripcionAnexo" class="field prepend-icon">
							{{Form::textarea('DescripcionAnexo', null, array('class'=>'gui-textarea','id'=>'DescripcionAnexo','placeholder'=>'Asunto...','required'=>'required'))}}
							<label for="DescripcionAnexo" class="field-icon">
								<i class="fa fa-comments"></i>
							</label>
							<span class="input-footer">
								<strong>Recomendación:</strong> Sea breve, claro y conciso en la descripción del anexo.
							</span>
						</label>
					</div>
					
					<div class="section-divider mt20 mb40">
						<span> Ubicación Física </span>
					</div>
					<div class="section">
						<label for="UbicacionFisica" class="field prepend-icon">
							{{Form::textarea('UbicacionFisica', null, array('class'=>'gui-textarea','id'=>'UbicacionFisica','placeholder'=>'Asunto...','required'=>'required'))}}
							<label for="UbicacionFisica" class="field-icon">
								<i class="fa fa-comments"></i>
							</label>
							<span class="input-footer">
								<strong>Recomendación:</strong> Sea breve, claro y conciso en la descripción de la ubicación del anexo.
							</span>
						</label>
					</div>
					
					<div class="panel-footer text-right">
						<button type="submit" class="button btn-primary"> Registrar Anexo</button>
						<a href="#" class="button btn-dark">Cancelar</a>
					</div>
					
					<div class="panel-footer text-right">
						<button type="submit" class="button btn-success"> Registrar Correspondencia</button>
					</div>
				{{Form::close()}}
			</div>
		</div>
	@else
		<h2>Registro de anexos para Oficios Salientes</h2>
		<p class="lead">Por favor, rellene los siguientes campos.</p>
		<div class="panel panel-success heading-border">
			<div class="panel-body">
				{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
					<div class="section row">
						<div class="col-md-6">
							<h4>Dependencia:</h4>
							<label for="Dependencia" class="field prepend-icon">
								{{Form::label('Dependencia',$OficioEntrante->AcronimoDependencia, array('class'=>'gui-input','id'=>'Dependencia','required'=>'required'))}}
								<label for="Dependencia" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
						</div>
						<div class="col-md-6">
							<h4>Id del oficio:</h4>
							<label for="IdOficio" class="field prepend-icon">
								{{Form::label('IdOficioDependencia',$OficioEntrante->IdOficioDependencia, array('class'=>'gui-input','id'=>'IdOficioDependencia',))}}
								{{Form::hidden('IdCorrespondencia',$OficioEntrante->IdCorrespondencia)}}
								<label for="IdOficio" class="field-icon">
									<i class="fa fa-adjust"></i>
								</label>
							</label>
						</div>
					</div>
					
					<div class="section-divider mt20 mb40">
						<span> Datos del nuevo anexo </span>
					</div>
					<div class="section row">
						<div class="col-md-6">
							<h4>Nonmbre del anexo:</h4>
							<label for="IdOficio" class="field prepend-icon">
								{{Form::text('NombreAnexo',null, array('class'=>'gui-input','placeholder'=>'Ingrese el nombre del anexo...','id'=>'NombreAnexo'))}}
								<label for="IdOficio" class="field-icon">
									<i class="fa fa-file"></i>
								</label>
							</label>
						</div>
					</div>
	
					
					<div class="section-divider mt20 mb40">
						<span> Descripción del anexo </span>
					</div>
					<div class="section">
						<label for="DescripcionAnexo" class="field prepend-icon">
							{{Form::textarea('DescripcionAnexo', null, array('class'=>'gui-textarea','id'=>'DescripcionAnexo','placeholder'=>'Decripción del anexo...','required'=>'required'))}}
							<label for="DescripcionAnexo" class="field-icon">
								<i class="fa fa-comments"></i>
							</label>
							<span class="input-footer">
								<strong>Recomendación:</strong> Sea breve, claro y conciso en la descripción del anexo.
							</span>
						</label>
					</div>
					
					<div class="section-divider mt20 mb40">
						<span> Ubicación Física </span>
					</div>
					<div class="section">
						<label for="UbicacionFisica" class="field prepend-icon">
							{{Form::textarea('UbicacionFisica', null, array('class'=>'gui-textarea','id'=>'UbicacionFisica','placeholder'=>'Ubicación física del anexo...','required'=>'required'))}}
							<label for="UbicacionFisica" class="field-icon">
								<i class="fa fa-comments"></i>
							</label>
							<span class="input-footer">
								<strong>Recomendación:</strong> Sea breve, claro y conciso en la descripción de la ubicación del anexo.
							</span>
						</label>
					</div>
					
					<div class="panel-footer text-right">
						<button type="submit" class="button btn-primary"> Registrar Anexo</button>
						<a href="#" class="button btn-dark">Cancelar</a>
					</div>
					
					<div class="panel-footer text-right">
						<button type="submit" class="button btn-success"> Registrar Correspondencia</button>
					</div>
				{{Form::close()}}
			</div>
		</div>
	@endif
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