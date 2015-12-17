@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="">
					<a href="{{action('OficiosController@oficialia_recibidos')}}">Oficios entrantes</a>
				</li>
				<li class="">
					<span>&frasl;</span>
				</li>
				<li class="active">
					<a href="#">{{$oficio->IdOficioDependencia}}</a>
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
          <a href="{{action('OficialiaController@oficialia_index')}}" class="btn btn-danger light btn-block fw600">Ir a Bandeja de entrada</a>

          <!-- Message Menu -->
          <div class="list-group list-group-links mt20">
            <div class="list-group-header"> Estado actual del oficio </div>
            <!-- Oficios entrantes públicos -->
            @if($oficio->Caracter_Id == 3)
              	@if($oficio->IdEstatus == 101)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-warning">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:20%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 102)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-alert">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:40%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 103)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-primary">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:60%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 104)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-system">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:80%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 105)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
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
              	@if($oficio->IdEstatus == 201)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-warning">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:20%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 202)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-alert">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:40%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 203)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-primary">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:60%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 204)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-system">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:80%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 205)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
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
              	@if($oficio->IdEstatus == 301)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-warning">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:20%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 302)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-primary">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:40%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 303)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
		              <span class="badge badge-system">{{$oficio->NombreEstatus}}</span>
		            </a>
		            <div class="progress progress-bar-sm mn">
	                  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:60%">
	                  </div>
	                </div>
		        @endif
		        @if($oficio->IdEstatus == 304)
		            <a href="#" class="list-group-item">
		              <i class="fa fa-gear"></i>&nbsp;Folio: {{$oficio->IdOficioEntrante}}
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
            <div class="list-group-header"> Mapa de turnado </div>
            @foreach($secTurnar as $responsable)
            	@if($lastTurnado == $responsable->IdUTC)
            		<a href="#" class="list-group-item">
		              <i class="fa fa-user"></i>
		              Responsable actual
		              <span class="label badge-success">{{$responsable->ApPaterno}} {{$responsable->ApMaterno}} {{$responsable->Nombre}}</span>
		            </a>
            	@else
		            <a href="#" class="list-group-item">
		              <i class="fa fa-level-down"></i>
		              Turnado
		              <span class="label badge-alert-dark">{{$responsable->ApPaterno}} {{$responsable->ApMaterno}} {{$responsable->Nombre}}</span>
		            </a>
		        @endif
	        @endforeach
          </div>

          <!-- Tags Menu -->
          <div class="list-group list-group-links">
            <div class="list-group-header"> CCP </div>
            @foreach($ccps as $ccp)
	            <a href="#" class="list-group-item">
	              {{$ccp->ApPaterno}} {{$ccp->ApMaterno}} {{$ccp->Nombre}}
	              @if($ccp->EstatusCCP_Id == 1)
	              	<span class="fa fa-circle text-warning"></span>
	              @endif
	              @if($ccp->EstatusCCP_Id == 2)
	              	<span class="fa fa-circle text-primary"></span>
	              @endif
	              @if($ccp->EstatusCCP_Id == 3)
	              	<span class="fa fa-circle text-success"></span>
	              @endif
	            </a>
	        @endforeach
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
                        <button type="button" class="btn btn-default light">
                          <i class="fa fa-pencil"></i> Generar oficio de respuesta
                        </button>
                      </div>
                    </div>
                  </div>
			
            <!-- message view -->
            <div class="message-view">

              <!-- message meta info -->
              <div class="message-meta">
                <span class="pull-right text-muted">Registrado el {{$oficio->FechaEntrega}}</span>

                <h3 class="subject">{{$oficio->Asunto}}</h3>

                <hr class="mt20 mb15">
              </div>

              <!-- message header -->
              <div class="message-header">
                <img src="{{asset('images/placeholder.png')}}" class="img-responsive mw40 pull-left mr20">
                <div class="pull-right mt5 clearfix">
                  <a class="btn btn-success">Descargar PDF</a>
                </div>
                <h4 class="mt15 mb5">De: {{$oficio->ApPaternoEntidad}} {{$oficio->ApMaternoEntidad}} {{$oficio->NombreEntidad}}</h4>
                @if($oficio->NombreCargoEntidad = "Director" || $oficio->NombreCargoEntidad == 'Directora')
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
                    	<h4 class="mt15 mb5">Para: {{$oficio->ApPaterno}} {{$oficio->ApMaterno}} {{$oficio->Nombre}}, {{$oficio->NombreCargo}} del CMPL</h4>
					@else
                    	<h4 class="mt15 mb5">Para: {{$oficio->ApPaterno}} {{$oficio->ApMaterno}} {{$oficio->Nombre}}, {{$oficio->NombreCargo}} de {{$oficio->NombreArea}}</h4>
                    @endif
                  </div>
                  <div class="panel-body panel-scroller scroller-sm scroller-success scroller-pn pn">
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
                            <span class="fa fa-desktop text-warning"></span>
                          </td>
                          <td>Fecha de emisión</td>
                          <td>{{$oficio->FechaEmision}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-microphone text-primary"></span>
                          </td>
                          <td>Fecha de recepción</td>
                          <td>{{$oficio->FechaEntrega}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-newspaper-o text-info"></span>
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
                            <span class="fa fa-bank text-alert"></span>
                          </td>
                          <td>Prioridad</td>
                          <td>{{$oficio->NombrePrioridad}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-bank text-alert"></span>
                          </td>
                          <td>Tipo de información del oficio</td>
                          <td>{{$oficio->NombreCaracter}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-bank text-alert"></span>
                          </td>
                          <td>Datos confidenciales</td>
                          <td>{{$oficio->Dato}}</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="fa fa-bank text-alert"></span>
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