@extends('layouts.oficialia')

@section('content')
	<!-- Validation Example -->
    <div class="admin-form theme-success mw1000 center-block">
		<h2>Nuevo oficio</h2>
		<div class="panel panel-success heading-border">
			{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}   
				<div class="panel-body"> 
					<div class="section-divider mt20 mb40">
						<span> Registre una nueva dependencia </span>
					</div>
					<div class="section row">
						<div class="col-md-6">
							<span>Nombre de la dependencia</span>
							<label for="NuevaDependencia" class="field prepend-icon">
								{{Form::text('NuevaDependencia',null, array('class'=>'gui-input','id'=>'NuevaDependencia','required'=>'required'))}}
								<label for="NuevaDependencia" class="field-icon">
									<i class="fa fa-institution"></i>
								</label>
							</label>
						</div>
						<div class="col-md-6">
							<span>Nombre corto de la dependencia</span>
							<label for="NuevaDependenciaAcronimo" class="field prepend-icon">
								{{Form::text('NuevaDependenciaAcronimo',null, array('class'=>'gui-input','id'=>'NuevaDependenciaAcronimo','required'=>'required'))}}
								<label for="NuevaDependenciaAcronimo" class="field-icon">
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
