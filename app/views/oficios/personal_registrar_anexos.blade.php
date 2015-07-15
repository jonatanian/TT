@extends('layouts.oficialia')

@section('content')
{{Form::open(array('class'=>'form-horizontal row-border', 'id'=>'datos'))}}
	  <div class="panel">
	  <!-- Panel Heading -->
	  <div class="panel-heading"><h2>Oficios pendientes a registar</h2></div>
	  <div class="panel-menu table-responsive">
		<div class="form-group">
			<table class="table table-striped">
			<tr class="dark">
				<td>&nbsp;</td>
				<td>No. de oficio</td>
				<td>Dirigido a</td>
				<td>Asunto</td>
				<td>Fecha de elaboración</td>
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
				<td>{{$oficio->IdConsecutivo}}</td>
				<td>{{$oficio->IdOficioSaliente}}</td>
				<td>{{$oficio->NombreEntidad}}</td>
				<td>{{$oficio->Asunto}}</td>
				<td>{{$oficio->FechaElaboracion}}</td>
				<td>
					  <a href="{{action('OficiosController@oficialia_validar_oficio_saliente',array('id'=>$oficio->IdConsecutivo))}}" class="btn btn-primary"><i class="fa fa-pencil"></i><br> Registrar anexos</a>
					  <div class="btn-group">
					  <button class="btn btn-sucesss dropdown-toggle" aria-expanded="false" type="button" data-toggle="dropdown">
					    <span class="caret"></span>&nbsp;&nbsp;<i class="fa fa-gears"></i>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					   
					    <li>
					      <a href="{{action('OficiosController@personal_agregar_anexos',array('id'=>$oficio->IdConsecutivo))}}"><i class="fa fa-pencil"></i><br> Agregar anexos</a>
					    </li>
					    <li>
					      <a href="#">Quitar anexos</a>
					    </li>
					    <li>
					      <a href="#">Enviar Correspondencia</a>
					    </li>
					  </ul>
					</div>
				</td>
			</tr>
			@endforeach
		  </table>
	  </div>
      <!-- end .form-footer section -->
	</div>
	</div>
	{{Form::close()}}
@stop

@section('scripts')
	{{HTML::script('avalon/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}
	<script>
		$(document).ready(function() {
		
			$('#FechaEmision').datepicker({
				todayHighlight: true,
	    		startView: 3,
	    		format: 'yyyy-mm-dd'
			});

			$('#FechaEntrega').datepicker({
				todayHighlight: true,
	    		startView: 3,
	    		format: 'yyyy-mm-dd'
			});
			
			$('#FechaLimite').datepicker({
				todayHighlight: true,
	    		startView: 3,
	    		format: 'yyyy-mm-dd'
			});
			
		});
		
	</script>
@stop