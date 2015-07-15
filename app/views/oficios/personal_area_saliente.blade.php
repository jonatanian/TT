@extends('layouts.oficialia')

@section('content')
<div class="admin-form theme-success mw1000 center-block">
	<h2>Nuevo oficio</h2>
	<div class="panel panel-success heading-border">
		{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
			<div class="panel-body">
				<div class="section row">
					<div class="col-md-12">
						<label for="DependenciaL" class="field prepend-icon">
							{{Form::label('DependenciaL', $dependencia->NombreDependencia,array('class'=>'gui-input','id'=>'DependenciaL'))}}
							{{Form::hidden('Dependencia', $dependencia->NombreDependencia,array('class'=>'gui-input','id'=>'Dependencia'))}}
							<label for="DependenciaL" class="field-icon">
								<i class="fa fa-institution"></i>
							</label>
						</label>
					</div>
				</div>
				<div class="section-divider mt20 mb40">
					<span> Seleccione el Área que recibe el oficio</span>
				</div>
				<div class="section row">
					<div class="col-md-12">
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
					<div class="col-md-6">
						<a href="#" class="button btn-gray">Cancelar</a>
					</div>
					<div class="col-md-6 text-right">
						<button type="submit" class="button btn-success"> Siguiente </button>
					</div>
				</div>
				<div class="col-md-6">
					<h4>¿No se muestra el Área que desea?</h4>
					<a href="{{action('OficiosController@oficialia_nuevaArea',array('IdDep'=>$dependencia->IdDependencia))}}" class="button btn-success"><i class="fa fa-plus"></i> Añadir nueva Área</a>
				</div>
			</div>
		{{Form::close()}}
	</div>    
</div>
<br>
@stop