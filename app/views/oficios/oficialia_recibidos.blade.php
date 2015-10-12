@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="ecommerce_dashboard.html">Oficios entrantes</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('OficiosEntrantesController@oficialia_nuevoOficio')}}" class="btn btn-default btn-sm fw600 ml10">
			<span class="fa fa-plus pr5"></span> Nuevo oficio entrante</a>
		</div>
	</header>
	<!-- End: Topbar -->
@stop
@section('content')
	<div class="panel">
	  <!-- Panel Heading --><!--
	  <div class="panel-menu table-responsive">
		  <div class="form-group">
			<table class="table table-striped">
				<tr>
					{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
					<td><label for="inputEmail3" class="col-sm-9 control-label">Filtrar oficios por:</label></td>
					<td><input type="text" class="form-control" id="inputEmail3" placeholder="Ingrese búsqueda..."></td>
					<td><label for="inputEmail3" class="col-sm-2 control-label">Por:</label></td>
					<td><select id = "opcion" name ="opcion" class="form-control">
						   <option value="1">Prioridad</option>
						   <option value="2">Estatus</option>
						   <option value="3">Dependencia</option>
						</select> 
					<td>
					<td><button class="btn btn-success">Buscar</button></td>
					{{Form::close()}}
				</tr>
			</table>
		  </div>
      </div>-->

	  <!-- Panel Body with Table (no padding) -->
	  <div class="panel-body pn">
	      <table class="table table-striped">
			<tr class="dark">
				<td>&nbsp;</td>
				<td>No. de oficio</td>
				<td>Dependencia</td>
				<td>Asunto</td>
				<td>Fecha de entrega</td>
				<td>Acciones para el oficio</td>
			<tr>
			@foreach($oficios as $oficio)
			@if($oficio->Prioridad_Id == 1)
				<tr class="danger">
			@endif
			@if($oficio->Prioridad_Id == 2)
				<tr class="warning">
			@endif
			@if($oficio->Prioridad_Id == 3)
				<tr class="success">
			@endif
				<td>{{$oficio->IdOficioEntrante}}</td>
				<td>{{$oficio->IdOficioDependencia}}</td>
				<td>{{$oficio->NombreDependencia}}</td>
				<td>{{$oficio->Asunto}}</td>
				<td>{{$oficio->FechaEntrega}}</td>
				<td>
					<div class="btn-group">
					  <button class="btn btn-sucesss dropdown-toggle" aria-expanded="false" type="button" data-toggle="dropdown">
					    <span class="caret"></span>&nbsp;&nbsp;<i class="fa fa-gears"></i>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li>
					      <a href="{{action('CorrespondenciaController@turnar_a')}}">Turnar a</a>
					    </li>
					    <li>
					      <a href="#">Enviar copia a</a>
					    </li>
					    <li>
					      <a href="#">Cambiar estatus</a>
					    </li>
					    <li>
					      <a href="#">Descargar PDF</a>
					    </li>
					    <li>
					      <a href="#">Ver detalles</a>
					    </li>					    
					    <li class="divider"></li>
					    <li>
					      <a href="#">Cancelar oficio</a>
					    </li>
					  </ul>
					</div>
				</td>
			</tr>
			@endforeach
		  </table>
	  </div>
	</div>
@stop