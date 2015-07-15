@extends('layouts.oficialia')

@section('content')
	<div class="panel">
	  <!-- Panel Heading -->
	  <div class="panel-heading"><h2>Memorándums recibidos</h2></div>
	  <div class="panel-menu table-responsive">
		  <div class="form-group">
			<table class="table table-striped">
				<tr>
					<td><a href="{{action('MemosController@oficialia_nuevo_recibido')}}" class="btn btn-success">Nuevo Memorándum</a></td>
					<form class="form-horizontal">
					<td><label for="inputEmail3" class="col-sm-9 control-label">Buscar memos:</label></td>
					<td><input type="text" class="form-control" id="inputEmail3" placeholder="Ingrese búsqueda..."></td>
					<td><label for="inputEmail3" class="col-sm-2 control-label">Por:</label></td>
					<td><select class="form-control">
						   <option value="1">Consecutivo</option>
						   <option value="2">Pendientes</option>
						   <option value="3">Atendidos</option>
						   <option value="4">Id. de memo</option>
						   <option value="5">Fecha de emisión</option>
						   <option value="6">Fecha de recepción</option>
						   <option value="7">Dirigido a</option>
						   <option value="8">Emisor</option>
						   <option value="9">Dependencia</option>
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
				<td>Consecutivo</td>
				<td>ID de memo</td>
				<td>Dirigido a</td>
				<td>Emisor</td>
				<td>Asunto</td>
				<td>Estatus</td>
			<tr>
			<tr>
				<td>1</td>
				<td>CMPL/MEMO/2015/47</td>
				<td>Nidia Orea Escalona</td>
				<td>Rogelio Sotelo Boyás</td>
				<td>Intranet CMPL</td>
				<td><a href="#" class="btn btn-success">Cancelar proceso</a></td>
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