@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li>
					<a href="{{action('OficiosController@dsbd_salientes')}}">Oficios entrantes</a>
				</li>
				<li>&frasl;</li>
				<li class="">
					<a href="{{action('OficiosSalientesController@dsbd_nuevoOficio')}}">Nuevo</a>
				</li>
				<li>&frasl;</li>
				<li class="active">
					<a href="#">Nueva dependencia</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('OficiosSalientesController@dsbd_nuevoOficio')}}" class="btn btn-default btn-sm fw600 ml10">
			<span class="fa fa-plus pr5"></span> Nuevo oficio entrante</a>
		</div>
	</header>
	<!-- End: Topbar -->
@endsection

@section('content')
	<!-- Validation Example -->
    <div class="admin-form theme-success mw1000 center-block">
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