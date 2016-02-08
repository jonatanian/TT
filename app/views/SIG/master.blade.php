@extends('layouts.SIG')

@section('content')
	<div class="content-header">
      <h1 class="text-muted">{{$areas[0]->NombreArea}}</h1><!--nombre de departamento-->
	  	<div class="content-header">
				<h2 class="text-primary">Objetivo</h2>

				<blockquote class="blockquote-primary">
					<p style="text-align:justify">{{$secciones[0]->Objetivo}}</p> <!--  Objetivo  -->
					<footer>Anotaciones importantes</footer>
				</blockquote>
		</div>
      <img class="img-responsive" src="{{asset($secciones[0]->OrganigramaURL)}}" alt="Organigrama del Departamento de Servicios Administrativos y Técnicos" height="225px">
    </div>

<!--  Secciones dadas de alta -->
	@foreach ($secciones as $sec)
	<div class="content-header">
      <h2 class="text-primary">{{$sec->NombreSeccion}}</h2> <!--Titulo de la seccion -->
			<p>{{$sec->Descripcion}}</p>
			@if($sec->TipoDeContenido_Id == 2 )
					<!-- Panel with: Basic Footable -->
					<!-- Store Settings -->
					<div class="panel panel-light panel-border top mb35">
						<div class="panel-body bg-light dark">
							<div class="admin-form">
				<table class="table table-striped">
					<tr>
						<th>No.</th>
						<th width="2000">Nombre</th>
						<th>Acciones</th>
					</tr>
					@foreach($contenido as $con)
						@if($con->Secciones_Id == $sec->IdSeccion)
							<tr>
								<td>x</td>
								<td>{{$con->NombreODescripcion}}</td>
								<td><a href = "{{action('SIGController@descargarDocumento',array('IdContenido'=>$Item->IdContenido))}}" class="btn btn-system" target="_blank">Descargar</a></td>
							</tr>
						@endif
					@endforeach
				</table>
							</div>
						</div>
					</div>
				@else
				<div class="panel panel-light panel-border top mb35">
					<div class="panel-body bg-light dark">
						<div class="admin-form">
				<table class="table table-striped">
					<tr>
						<th>No.</th>
						<th width="1000">Nombre</th>
						<th width="1000">Descripcion</th>

					</tr>
					@foreach($contenido as $con)
						@if($con->Secciones_Id == $sec->IdSeccion)
							<tr>
								<td>x</td>
								<td>{{$con->NombreODescripcion}}</td>
								<td>{{$con->AccionesOMetas}}</td>
							</tr>
						@endif
					@endforeach
				</table>
						</div>
					</div>
				</div>
				@endif


    </div>
		@endforeach
@stop
