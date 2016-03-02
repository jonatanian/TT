@extends('layouts.SIG')

@section('content')
	<div class="content-header">
      <h1 class="text-muted">{{$areas->NombreArea}}</h1><!--nombre de departamento-->
	  	<div class="content-header">
		</div>
	  <h2 class="text-primary">Organigrama</h2>
      <img class="img-responsive" src="{{asset($areas->OrganigramaURL)}}" alt="Organigrama de {{$areas->NombreArea}}">
      @if($areas->IdArea == 1)
      <div class="content-header">
			<h2 class="text-primary">Misión</h2>
			<blockquote class="blockquote-primary text-left">
				<p style="text-align:justify">Ofrecer servicios de formación de recursos humanos, investigación científica, desarrollo
				tecnológico y asistencia técnica, que influyan en la industria nacional para maximizar su productividad y competividad,
				mediante la aplicación de la metodología de producción más limpia para minimizar el impacto ambiental y aportar beneficios
				a la comunidad.</p> <!--  Mision  -->
				<footer>&nbsp;</footer>
			</blockquote>
	  </div>
	  <div class="content-header">
			<h2 class="text-primary">Visión</h2>
			<blockquote class="blockquote-primary text-left">
				<p style="text-align:justify">Ser un centro de excelecia lider a nivel nacional con reconocimiento internacional en la
				formación de recursos humanos, la investigación científica, el desarrollo tecnológico y la provisión de asistencia
				técnica de alta calidad y con valor agregado a la industria, en temas relacionados con la producción más limpia y
				el desarrollo sustentable.</p> <!--  Vision  -->
				<footer>&nbsp;</footer>
			</blockquote>
	  </div>

	  @endif

    </div>


	@foreach($secciones as $sec)

	<div class="content-header">
      <h2 class="text-primary">{{$sec->NombreSeccion}}</h2> <!--Titulo de la seccion -->
			@if($sec->Descripcion!=null)
				<blockquote class="blockquote-info text-left">{{$sec->Descripcion}}</blockquote>
			@endif
			@if($sec->TipoDeContenido_Id == 2)
					<!-- Panel with: Basic Footable -->
					<!-- Store Settings -->
					<div class="panel panel-primary panel-border top mb35">

						<div class="panel-body bg-light dark">

							<div class="admin-form">
								<table class="table table-striped">
									<tr>

										<th width="2000">Descripción</th>
										<th>&nbsp;</th>
									</tr>
									@foreach($contenido as $con)
										@if($con->Secciones_Id == $sec->IdSeccion)
											<tr>
												<td>{{$con->NombreODescripcion}}</td>
												@if($sec->NombreSeccion == 'Objetivos de calidad' || $sec->NombreSeccion == 'Objetivos ambientales')
													<td><a href = "{{action('SIGController@descargarDocumento',array('IdContenido'=>$con->IdContenido))}}" class="btn btn-system" target="_blank">Indicador</a></td>
												@elseif($con->ExtensionDoc == 'pdf')
													<td><a href = "{{action('SIGController@descargarDocumento',array('IdContenido'=>$con->IdContenido))}}" class="btn btn-system" target="_blank">PDF</a></td>
												@else
													<td><a href = "{{action('SIGController@descargarDocumento',array('IdContenido'=>$con->IdContenido))}}" class="btn btn-system" target="_blank">Editable</a></td>
												@endif
											</tr>
										@endif
									@endforeach
								</table>
							</div>
						</div>
					</div>
				@elseif($sec->TipoDeContenido_Id == 1)
				<div class="panel panel-primary panel-border top mb35">
					<div class="panel-body bg-light dark">
						<div class="admin-form">
							<table class="table table-striped">
								<tr>

									<th width="1000">Descripción</th>
									<!--<th width="1000">&nbsp;</th>-->

								</tr>
								@foreach($contenido as $con)
									@if($con->Secciones_Id == $sec->IdSeccion)
										<tr>

											<td>{{$con->NombreODescripcion}}</td>
											<!--@if($con->AccionesOMetas!=null)
												<td>{{$con->AccionesOMetas}}</td>
											@else
												<td>N&frasl;A</td>
											@endif-->
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
