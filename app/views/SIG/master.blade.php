@extends('layouts.SIG')

@section('content')
	<div class="content-header">
      <h1 class="text-muted">{{$areas->NombreArea}}</h1><!--nombre de departamento-->
	  	<div class="content-header">
				<h2 class="text-primary">Objetivo</h2>

				<blockquote class="blockquote-primary text-left">
					<p style="text-align:justify">{{$areas->Objetivo}}</p> <!--  Objetivo  -->
          @if(isset($responsable))
						<footer>{{$responsable->GradoAcademico}}&nbsp;{{$responsable->ApPaterno}}&nbsp;{{$responsable->ApMaterno}}&nbsp;{{$responsable->Nombre}}&nbsp;-&nbsp;{{$responsable->NombreCargo}}</footer>
					@else
						<footer>&nbsp;</footer>
					@endif
				</blockquote>
		</div>
      <img class="img-responsive" src="{{asset($areas->OrganigramaURL)}}" alt="Organigrama de {{$areas->NombreArea}}">
    </div>


	@foreach($secciones as $sec)

	<div class="content-header">
      <h2 class="text-primary">{{$sec->NombreSeccion}}</h2> <!--Titulo de la seccion -->
			@if($sec->Descripcion!=null)
				<blockquote class="blockquote-info text-left">{{$sec->Descripcion}}</blockquote>
			@endif
			@if($sec->TipoDeContenido_Id == 2 )
					<!-- Panel with: Basic Footable -->
					<!-- Store Settings -->
					<div class="panel panel-primary panel-border top mb35">

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
												<td>&nbsp;</td>
												<td>{{$con->NombreODescripcion}}</td>
												<td><a href = "{{action('SIGController@descargarDocumento',array('IdContenido'=>$con->IdContenido))}}" class="btn btn-system" target="_blank">Descargar</a></td>
											</tr>
										@endif
									@endforeach
								</table>
							</div>
						</div>
					</div>
				@else
				<div class="panel panel-primary panel-border top mb35">
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
											<td>&nbsp;</td>
											<td>{{$con->NombreODescripcion}}</td>
											@if($con->AccionesOMetas!=null)
												<td>{{$con->AccionesOMetas}}</td>
											@else
												<td>N&frasl;A</td>
											@endif
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
<!--  Secciones dadas de alta -->

@stop
