@extends('layouts.oficialia')

@section('content')
<div class="admin-form theme-success mw1000 center-block">
	<h2>Nuevo oficio</h2>
	<div class="panel panel-success heading-border">
		{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
			<div class="panel-body">
				<div class="section row">
					<div class="col-md-6">
						<label for="Dependencia" class="field prepend-icon">
							{{Form::label('Dependencia', $dependencia->AcronimoDependencia,array('class'=>'gui-input','id'=>'Dependencia'))}}
							{{Form::hidden('DependenciaId', $dependencia->IdDependencia,array('class'=>'gui-input','id'=>'DependenciaId'))}}
							<label for="Dependencia" class="field-icon">
								<i class="fa fa-institution"></i>
							</label>
						</label>
					</div>
					<div class="col-md-6">
						<label for="Area" class="field prepend-icon">
							{{Form::label('Area', $area->NombreDependenciaArea,array('class'=>'gui-input','id'=>'Area'))}}
							{{Form::hidden('AreaId', $area->IdDependenciaArea,array('class'=>'gui-input','id'=>'AreaId'))}}
							<label for="Area" class="field-icon">
								<i class="fa fa-institution"></i>
							</label>
						</label>
					</div>
				</div>
				<div class="section row">
					<div class="col-md-6">
						<label for="Entidad" class="field prepend-icon">
							{{Form::label('Entidad', $entidad->getNombreCompletoE(),array('class'=>'gui-input','id'=>'Entidad'))}}
							{{Form::hidden('EntidadId', $entidad->IdEntidadExterna,array('class'=>'gui-input','id'=>'EntidadId'))}}
							<label for="Entidad" class="field-icon">
								<i class="fa fa-institution"></i>
							</label>
						</label>
					</div>
				</div>
				<div class="section-divider mt20 mb40">
					<span> ¿Qué tipo de oficio desea registrar? </span>
				</div>
				<div class="section row">
					<div class="col-md-12">
						<label for="TipoOficio" class="field prepend-icon">
							<select id="TipoOficio" name="TipoOficio" class="gui-input">
								<option value="1">Oficio entrante</option>
								<option value="2">Oficio saliente</option>
							</select>
							<label for="TipoOficio" class="field-icon">
								<i class="fa fa-institution"></i>
							</label>
						</label>
					</div>
					<div class="col-md-6">
						<a href="#" class="button btn-gray">Cancelar</a>
					</div>
					<div class="col-md-6 text-right">
						<button type="submit" class="button btn-success"> Siguiente </button>
					</div>
				</div>
			</div>
		{{Form::close()}}
	</div>    
</div>
<br>
@stop