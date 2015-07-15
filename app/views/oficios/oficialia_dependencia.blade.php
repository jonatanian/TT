@extends('layouts.oficialia')

@section('content')
<div class="admin-form theme-success mw1000 center-block">
	<h2>Nuevo oficio</h2>
	<div class="panel panel-success heading-border">
		{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
			<div class="panel-body">
				<div class="section-divider mt20 mb40">
					<span> Seleccione la dependencia que emite el oficio</span>
				</div>
				<div class="section row">
					<div class="col-md-12">
						<label for="iDependencia" class="field prepend-icon">
							<select id="iDependencia" name="iDependencia" class="gui-input">
							@foreach($dependencias as $dependencia)
								<option id="{{$dependencia->IdDependencia}}">{{$dependencia->NombreDependencia}}</option>
							@endforeach
							</select>
							<label for="iDependencia" class="field-icon">
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
					<h4>¿No se muestra la dependencia que desea?</h4>
					<a href="{{action('OficiosController@oficialia_nuevaDependencia')}}" class="button btn-success"><i class="fa fa-plus"></i> Añadir nueva dependencia</a>
				</div>
			</div>
		{{Form::close()}}
	</div>    
</div>
<br>
@stop
