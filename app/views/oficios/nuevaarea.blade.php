@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li>
					<a href="#">Oficios entrantes</a>
				</li>
				<li class="active">
					<a href="#">Nueva área</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('OficiosEntrantesController@oficialia_nuevoOficio')}}" class="btn btn-default btn-sm fw600 ml10">
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
				{{Form::hidden('DependenciaS',$dependencia, array('id'=>'DependenciaS'))}}
					<div class="section-divider mt20 mb40">
						<span> Registra una nueva Área </span>
					</div>
					<div class="section row">
						<div class="col-md-6">
							<span>Escribe el nombre del Área</span>
							<label for="AreaE" class="field prepend-icon">
								{{Form::text('AreaE',null, array('class'=>'gui-input','id'=>'AreaE','required'=>'required'))}}
								<label for="AreaE" class="field-icon">
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
	</div>@stop