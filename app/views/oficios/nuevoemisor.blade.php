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
					<a href="#">Nuevo emisor</a>
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
					<div class="section-divider mt20 mb40">
						<span> Registre un nuevo emisor</span>
						{{Form::text('DependenciaS',$dependencia,null,array('id'=>'DependenciaS'))}}
						{{Form::text('AreaS',$area,null,array('id'=>'AreaS'))}}
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
							<span>Seleccione el cargo del emisor</span>
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
						
						<div class="col-md-6">
							<span>¿No se muestra el cargo que desea?</span>
							<label for="CargoEntidad" class="field prepend-icon">
								{{Form::text('CargoEntidad',null, array('class'=>'gui-input','id'=>'CargoEntidad','placeholder'=>'Regístrelo aquí'))}}
								<label for="CargoEntidad" class="field-icon">
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
@endsection