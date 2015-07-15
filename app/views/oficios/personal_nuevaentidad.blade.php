@extends('layouts.oficialia')

@section('content')
	<!-- Validation Example -->
    <div class="admin-form theme-success mw1000 center-block">
		<h2>Nuevo oficio</h2>
		<div class="panel panel-success heading-border">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}   
				<div class="panel-body"> 
					<div class="section-divider mt20 mb40">
						<span> Registre una nueva Entidad para {{$area->NombreDependenciaArea}}</span>
						{{Form::hidden('DepAreaId', $area->IdDependenciaArea,null,array('id'=>'DepAreaId'))}}
						{{Form::hidden('DependenciaId', $IdDependencia,null,array('id'=>'DependenciaId'))}}
					</div>
					<div class="section row">
						<div class="col-md-12">
							<span>Nombres</span>
							<label for="NombreEntidad" class="field prepend-icon">
								{{Form::text('NombreEntidad',null, array('class'=>'gui-input','id'=>'NombreEntidad','required'=>'required'))}}
								<label for="NombreEntidad" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
						</div>
						<div class="col-md-6">
							<span>Apellido paterno</span>
							<label for="ApPaternoE" class="field prepend-icon">
								{{Form::text('ApPaternoE',null, array('class'=>'gui-input','id'=>'ApPaternoE','required'=>'required'))}}
								<label for="ApPaternoE" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
						</div>
						<div class="col-md-6">
							<span>Apellido materno</span>
							<label for="ApMaternoE" class="field prepend-icon">
								{{Form::text('ApMaternoE',null, array('class'=>'gui-input','id'=>'ApMaternoE','required'=>'required'))}}
								<label for="ApMaternoE" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
						</div>
					</div>
					<div class="section-divider mt20 mb40">
						<span>Cargo</span>
					</div>
					<div class="section row">
						<div class="col-md-6">
							<label for="CargoEntidadR" class="field prepend-icon">
								<select id="CargoEntidadR" name="CargoEntidadR" class="gui-input">
									@foreach($cargos as $cargo)
										<option value="{{$cargo->IdCargoEntidad}}">{{$cargo->NombreCargoEntidad}}</option>
									@endforeach
								</select>
								<label for="CargoEntidadR" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
								<h4>¿No se muestra el cargo que desea?</h4>
								<label for="CargoEntidad" class="field prepend-icon">
									{{Form::text('CargoEntidad',null, array('class'=>'gui-input','id'=>'CargoEntidad','placeholder'=>'Regístrelo aquí'))}}
									<label for="CargoEntidad" class="field-icon">
										<i class="fa fa-institution"></i>
									</label>
								</label>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button type="submit" class="button btn-success"> Registrar </button>
						</div>
					</div>
				{{Form::close()}}
			</div>    
		</div>
		<br>
	</div>
@stop
