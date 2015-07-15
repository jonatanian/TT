@extends('layouts.oficialia')

@section('content')
	<div class="admin-form theme-success mw1000 center-block">
	<div class="panel">
	  <!-- Panel Heading -->
	  <div class="panel-heading"><h2>Subir acuse de recibido</h2></div>
	  
	  <!-- Panel Body with Table (no padding) -->
	  <form method="post" action="/" id="admin-form">
		  <div class="panel-body pn">
		      <table class="table table-striped">
				<tr class="dark">
					<td>&nbsp;</td>
					<td>Oficio enviado</td>
					<td>Emisor</td>
					<td>Asunto</td>
					<td>Fecha de redacción</td>
				</tr>
				<tr class="warning">
					<td>1</td>
					<td>CMPL/2015/90</td>
					<td>Nidia Orea Escalona</td>
					<td>Configuración de la aplicación de SISA para el CMPL</td>
					<td>20/05/2015</td>
				</tr>
			  </table>
		  </div>
		  
	      <div class="panel-footer text-right">
	        <div class="section row">
		        <label for="file1" class="field file">
		          <span class="button btn-system"> Adjuntar documento </span>
		          <input type="file" class="gui-file" name="upload1" id="file1" onChange="document.getElementById('uploader1').value = this.value;">
		          <input type="text" class="gui-input" id="uploader1" placeholder="No se ha seleccionado documento PDF" readonly>
		        </label>
	      	</div>
	      	<button type="submit" class="button btn-success"> Subir </button>
	        <a href="{{action('OficiosController@oficialia_enviados')}}" class="button btn-dark">Cancelar</a>  
	      </div>
      </form>
	</div>


@stop
