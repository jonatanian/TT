@extends('layouts.oficialia')

@section('content')
	
	<div class="panel">
	  <!-- Panel Heading -->
	  <div class="panel-heading"><h2>Turnar correspondencia</h2></div>
	  
	  <!-- Panel Body with Table (no padding) -->
	  <div class="panel-body pn">
	      <table class="table table-striped">
			<tr class="dark">
				<td>&nbsp;</td>
				<td>Correspondencia</td>
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
	  
	  <div class="panel-menu table-responsive">
		  <div class="form-group">
			<table class="table table-striped">
				<tr>
					
						<td><label for="inputEmail3" class="col-sm-9 control-label">Búsqueda por nombre: </label></td>
						<td><input type="text" class="form-control" id="inputEmail3" placeholder="Ingrese búsqueda..."></td>
						<td><button class="btn btn-success">Buscar</button></td>
						
						<td><label for="inputEmail3" class="col-sm-2 control-label">Búsqueda por departamento:</label></td>
						<td><select class="form-control">
							   <option value="1">Direcci&oacute;n</option>
							   <option value="2">Subdirecci&oacute;n</option>
							   <option value="3">Subdirecci&oacute;n de Posgrado</option>
							   <option value="4">Subdirecci&oacute;n de Vinculaci&oacute;n</option>
							   <option value="5">Departamento de Servicios Administrativos y Técnicos</option>
							   <option value="6">Departamento de Sistemas y Banco de Datos</option>
							   <option value="7">Sala de juntas</option>
							   <option value="8">Biblioteca</option>
							   <option value="10">Vigilancia</option>
							</select> 
						</td>
						<td><button class="btn btn-success">Buscar</button></td>
					
				</tr>
			</table>
		  </div>
		  
		  <div class="form-group">
			<table class="table table-striped">
				<tr>
					
						<td><label for="inputEmail3" class="col-sm-9 control-label">Resultados de la búsqueda:</label></td>
						<td>Departamento de Sistemas y Banco de Datos</td>
						<td>&nbsp;</td>
					
				</tr>
				<tr class="dark">
					<td>Nombre</td>
					<td>Cargo</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Nidia Orea Escalona</td>
					<td>Jefe de Departamento</td>
					<td><button class="btn btn-success">A&ntilde;dir</button></td>
				</tr>
				<tr>
					<td>Lourdes Josefina García Alba</td>
					<td>Personal del departamento</td>
					<td><button class="btn btn-success">A&ntilde;dir</button></td>
				</tr>

			</table>
		  </div>
		  
		  <div class="form-group">
			<div class="panel-footer text-right">
				{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
					<table class="table table-responsive">
						<tr>
								<td><label for="inputEmail3" class="col-sm-9 control-label">Turnar a:</label></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Nidia Orea Escalona</td>
							<td>Jefe de Departamento</td>
							<td>Departamento de Sistemas y Banco de Datos</td>
							<td><a href="#" class="btn btn-success">Excluir</a></td>
						</tr>
					</table>
					<li class="divider"></li>
			        <button type="submit" class="btn btn-success"> Turnar correspondencia </button>
			        <a href="#" class="btn btn-dark">Cancelar</a>
		        {{Form::close()}}
		    </div>

		  </div>
      </div>
      
	</div>


@stop
