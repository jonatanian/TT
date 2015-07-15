@extends('layouts.oficialia')

@section('content')
	<!-- Validation Example -->
    <div class="admin-form theme-success mw1000 center-block">
		<h2>Nuevo oficio</h2>
		<div class="panel panel-success heading-border">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}   
				<div class="panel-body"> 
					<div class="section-divider mt20 mb40">
						<span> Registre una nueva Área para {{$dependencia->AcronimoDependencia}}</span>
					</div>
					<div class="section row">
						<div class="col-md-6">
							<span>Escriba el nombre del Área</span>
							<label for="NuevaArea" class="field prepend-icon">
								{{Form::text('NuevaArea',null, array('class'=>'gui-input','id'=>'NuevaArea','required'=>'required'))}}
								<label for="NuevaArea" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
						</div>
						<div class="col-md-6">
							<span>O seleccione una de la lista</span>
							<label for="DepArea" class="field prepend-icon">
								<select id="DepArea" name="DepArea" class="gui-input">
								@foreach($areas as $area)
									<option value="{{$area->IdDependenciaArea}}">{{$area->NombreDependenciaArea}}</option>
								@endforeach
								</select>
								<label for="DepArea" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
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
