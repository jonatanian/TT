@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="">
					<a href="{{action('OficiosController@dsbd_salientes')}}">Oficios Salientes</a>
				</li>
				<li class="">
					<span>&frasl;</span>
				</li>
				<li class="active">
					<a href="#">{{$oficio->IdOficioSaliente}}</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@stop

@section('ContentClass')
	<section id="content" class="table-layout animated fadeIn">
@stop

@section('content')
        <!-- begin: .tray-left -->
        <aside class="tray tray-left tray270" data-tray-height="match">

          <!-- Return to Inbox Button -->
          <a href="{{action('AdminController@dsbd_index')}}" class="btn btn-danger light btn-block fw600">Ir a Bandeja de entrada</a>

          <!-- Message Menu -->
          <div class="list-group list-group-links mt20">
            <div class="list-group-header"> Estado actual del oficio </div>
            
            <!-- Oficios entrantes públicos -->
            @if($oficio->Caracter_Id == 3)
		        @if($oficio->IdEstatus == 401)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-alert">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:40%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 402)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-primary">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:60%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 403)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-system">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:80%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 404)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-success">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-success progress-bar-striped active" style="width:100%">
	                  </div>
	                </div>
		        @endif
				@if($oficio->IdEstatus == 405)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-success">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-success progress-bar-striped active" style="width:100%">
	                  </div>
	                </div>
		        @endif
				@if($oficio->IdEstatus == 406)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-success">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-success progress-bar-striped active" style="width:100%">
	                  </div>
	                </div>
		        @endif
            @endif
            
            <!-- Oficios entrantes confidenciales -->
            @if($oficio->Caracter_Id == 2)
              	@if($oficio->IdEstatus == 401)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-warning">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:20%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 402)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-alert">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:40%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 403)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-primary">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:60%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 404)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-system">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:80%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 405)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-success">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-success progress-bar-striped active" style="width:100%">
	                  </div>
	                </div>
		        @endif
				@if($oficio->IdEstatus == 406)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-success">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-success progress-bar-striped active" style="width:100%">
	                  </div>
	                </div>
		        @endif
            @endif
            <!-- Oficios entrantes reservados -->
            @if($oficio->Caracter_Id == 1)
              	@if($oficio->IdEstatus == 401)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-warning">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:20%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 402)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-primary">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:40%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 403)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-system">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:60%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 404)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-success">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-success progress-bar-striped active" style="width:80%">
	                  </div>
	                </div>
		        @endif
				@if($oficio->IdEstatus == 405)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdConsecutivo}}
		              <span class="badge badge-success">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-success progress-bar-striped active" style="width:80%">
	                  </div>
	                </div>
		        @endif
            @endif
          </div>
          
          <div class="list-group list-group-links mt20">
            <div class="list-group-header"> Responsable actual </div>
            	@if($oficio->NombreEstatus == "En revisión" || $oficio->NombreEstatus == "Visto")
            		<a href="#" class="list-group-item">
		              <i class="fa fa-user"></i>
		              Responsable de revisión
		              <span class="label badge-success">{{$oficio->getNombreRevisor($oficio->Observacion_Usuario_Id)}}</span>
		            </a>
            	@elseif($oficio->NombreEstatus == "Observaciones")
		            <a href="#" class="list-group-item">
		              <i class="fa fa-level-down"></i>
		              Creador
		              <span class="label badge-alert-dark">{{Auth::User()->getNombreCompleto()}}</span>
		            </a>
				@else
		            <a href="#" class="list-group-item">
		              <i class="fa fa-level-down"></i>
		              Creador
		              <span class="label badge-alert-dark">Oficialía de Partes</span>
		            </a>
		        @endif
          </div>


        </aside>
        <!-- end: .tray-left -->

        <!-- begin: .tray-center -->
        <div class="tray tray-center pn">

          <div class="panel">

            <!-- message toolbar header -->
            <div class="panel-menu br-n br-b">
                  <div class="row">
                    <div class="hidden-xs hidden-sm col-md-3">
                      <div class="btn-group">
                        
                      </div>
                    </div>
                  </div>
			
            <!-- message view -->
            <div class="message-view">

              <!-- message meta info -->
              <div class="message-meta">
                <span class="pull-right text-muted">Registrado el {{$oficio->FechaEmision}}</span>

                <h3 class="subject">Asunto: {{$oficio->Asunto}}</h3>

                <hr class="mt20 mb15">
              </div>

              <!-- message header -->
              <div class="message-header">
                <img src="{{asset('images/placeholder.png')}}" class="img-responsive mw40 pull-left mr20">
                <div class="pull-right mt5 clearfix">
                  <a href="{{action('OficiosSalientesController@verPDF',array('correspondencia'=>$oficio->IdCorrespondencia))}}" target="_blank" class="btn btn-success">Descargar PDF</a>
                </div>
                <h4 class="mt15 mb5">Para: {{$oficio->ApPaternoEntidad}} {{$oficio->ApMaternoEntidad}} {{$oficio->NombreEntidad}}</h4>
                @if($oficio->NombreCargoEntidad == "Director" || $oficio->NombreCargoEntidad == 'Directora')
                	<small class="text-muted clearfix">{{$oficio->NombreCargoEntidad}} - {{$oficio->NombreDependencia}}</small>
                @else
                	<small class="text-muted clearfix">{{$oficio->NombreCargoEntidad}} del área de {{$oficio->NombreDependenciaArea}} - {{$oficio->NombreDependencia}}</small>
                @endif	
              </div>

              <hr class="mb15 mt15">

              <!-- message body -->
              <div class="message-body">
              <!-- Icon List -->
                <div class="panel">
                  <div class="panel-heading">
                  	@if($oficio->NombreCargo == 'Director' || $oficio->NombreCargo == 'Directora')
                    	<h4 class="mt15 mb5">De: {{$oficio->ApPaterno}} {{$oficio->ApMaterno}} {{$oficio->Nombre}}</h4>
					@else
                    	<h4 class="mt15 mb5">De: {{$oficio->ApPaterno}} {{$oficio->ApMaterno}} {{$oficio->Nombre}}</h4>
                    @endif
                  </div>
                  <div class="panel-body">
                    <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                      <thead>
                        <tr class="hidden">
                          <th class="mw30">#</th>
                          <th>Campo</th>
                          <th>Descripción</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <span class="fa fa-calendar text-warning"></span>
                          </td>
                          <td>Fecha de emisión</td>
                          <td>{{$oficio->FechaEmision}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-calendar-o text-primary"></span>
                          </td>
                          <td>Fecha de recepción de acuse</td>
                          <td>{{$oficio->FechaAcuse}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-pencil text-info"></span>
                          </td>
                          <td>&iquest;Requiere respuesta?</td>
                          @if($oficio->RequiereRespuesta == true)
                          	<td>Sí</td>
                          @else
                          	<td>No</td>
                          @endif
                        </tr>
                        @if($oficio->RequiereRespuesta == true)
                        <tr>
                          <td>
                            <span class="fa fa-bank text-alert"></span>
                          </td>
                          <td>Fecha límite de respuesta</td>
                          <td>{{$oficio->FechaLimiteR}}</td>
                        </tr>
                        @endif
                        @if($oficio->EnRespuestaA != NULL)
                        <tr>
                          <td>
                            <span class="fa fa-bank text-alert"></span>
                          </td>
                          <td>Este oficio es una respuesta a la correspondencia no. </td>
                          <td>{{$oficio->EnRespuestaA}}</td>
                        </tr>
                        @endif
                        <tr>
                          <td>
                            <span class="fa fa-tag text-dark light"></span>
                          </td>
                          <td>Prioridad</td>
                          <td>{{$oficio->NombrePrioridad}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-file-archive-o text-danger"></span>
                          </td>
                          <td>Tipo de información del oficio</td>
                          <td>{{$oficio->NombreCaracter}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-lock text-alert"></span>
                          </td>
                          <td>Datos confidenciales</td>
                          <td>{{$oficio->Dato}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-paperclip text-system"></span>
                          </td>
                          <td>Anexos</td>
                          <td>{{$oficio->Anexo}}</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- end: .tray-center-->
@endsection