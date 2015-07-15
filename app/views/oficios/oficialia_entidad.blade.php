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
							{{Form::label('Dependencia', $dependencia->AcronimoDependencia,array('class'=>'gui-input','id'=>'Dependencia','required'=>'required'))}}
							{{Form::hidden('DependenciaId', $dependencia->IdDependencia,array('class'=>'gui-input','id'=>'DependenciaId'))}}
							<label for="Dependencia" class="field-icon">
								<i class="fa fa-institution"></i>
							</label>
						</label>
					</div>
					<div class="col-md-6">
						<label for="Area" class="field prepend-icon">
							{{Form::label('Area', $area->NombreDependenciaArea,array('class'=>'gui-input','id'=>'Area','required'=>'required'))}}
							{{Form::hidden('AreaId', $area->IdDependenciaArea,array('class'=>'gui-input','id'=>'AreaId'))}}
							<label for="Area" class="field-icon">
								<i class="fa fa-institution"></i>
							</label>
						</label>
					</div>
				</div>
				<div class="section-divider mt20 mb40">
					<span> Seleccione la entidad que emite el oficio</span>
				</div>
				<div class="section row">
					<div class="col-md-12">
						<label for="DepArea" class="field prepend-icon">
							<select id="DepEntidad" name="DepEntidad" class="gui-input">
							@foreach($entidades as $entidad)
								<option value="{{$entidad->IdEntidadExterna}}">{{$entidad->getNombreCompletoE()}}</option>
							@endforeach
							</select>
							<label for="DepArea" class="field-icon">
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
				<div class="col-md-6">
					<h4>¿No se muestra la Entidad que desea?</h4>
					<a href="{{action('OficiosController@personal_nuevaentidad',array('IdArea'=>$area->IdDependenciaArea,'IdDependencia'=>$dependencia->IdDependencia))}}" class="button btn-success"><i class="fa fa-plus"></i> Añadir nueva Entidad</a>
				</div>
			</div>
		{{Form::close()}}
	</div>    
</div>
<br>
@stop