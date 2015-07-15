@extends('layouts.oficialia')

@section('content')
	<div class="panel">
	  <!-- Panel Heading -->
	  <div class="panel-heading"><h2>Memorándums enviados</h2></div>
	  <div class="panel-menu table-responsive">
		  <div class="form-group">
			<table class="table table-striped">
				<tr>
					<td><a href="{{action('MemosController@oficialia_nuevo_saliente')}}" class="btn btn-success">Nuevo memorándum</a></td>
					<form class="form-horizontal">
					<td><label for="inputEmail3" class="col-sm-9 control-label">Buscar memorándums:</label></td>
					<td><input type="text" class="form-control" id="inputEmail3" placeholder="Ingrese búsqueda..."></td>
					<td><label for="inputEmail3" class="col-sm-2 control-label">Por:</label></td>
					<td><select class="form-control">
						   <option value="1">Consecutivo</option>
						   <option value="2">Pendientes</option>
						   <option value="3">Atendidos</option>
						   <option value="4">ID de memorándum</option>
						   <option value="5">Fecha de emisión</option>
						   <option value="6">Fecha de recepción</option>
						   <option value="7">Dirigido a</option>
						   <option value="8">Dependencia que recibe</option>
						   <option value="10">Estatus</option>
						</select> 
					<td>
					<td><button class="btn btn-success">Buscar</button></td>
					</form>
				</tr>
			</table>
		  </div>
      </div>

	  <!-- Panel Body with Table (no padding) -->
	  <div class="panel-body pn">
	      <table class="table table-striped">
			<tr class="success">
				<td>&nbsp;</td>
				<td>Memorándum</td>
				<td>Emisor</td>
				<td>Asunto</td>
				<td>Fecha de redacción</td>
				<td>Acciones para el oficio</td>
			<tr>
			<tr class="danger">
				<td>1</td>
				<td>CMPL/MEMO/2015/45</td>
				<td>Rogelio Sotelo Boyás</td>
				<td>Reunión primer prototipo de SISA-CMPL</td>
				<td>05/06/2015</td>
				<td>
					<div class="btn-group">
					  <button class="btn btn-sucesss dropdown-toggle" aria-expanded="false" type="button" data-toggle="dropdown">
					    <span class="caret"></span>&nbsp;&nbsp;<i class="fa fa-gears"></i>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li>
					      <a href="#">Turnar a</a>
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
					    <li class="divider"></li>
					    <li>
					      <a href="#">Cancelar memorándum</a>
					    </li>
					  </ul>
					</div>
				</td>
			<tr>
			<tr>
				<td>2</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			<tr>
			<tr>
				<td>3</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			<tr>
			<tr>
				<td>4</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			<tr>
			<tr>
				<td>5</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			<tr>
		  </table>
	  </div>
	</div>
@stop