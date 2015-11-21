@extends('layouts.oficialia')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="{{action('OficiosController@oficialia_recibidos')}}">Oficios entrantes</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL))}}" class="btn btn-default btn-sm fw600 ml10">
			<span class="fa fa-plus pr5"></span> Nuevo oficio entrante</a>
		</div>
	</header>
	<!-- End: Topbar -->
@stop
@section('content')
	<div class="panel">  
	  
	  <div class="panel-menu p12 admin-form theme-primary">
              <div class="row">
                <div class="col-md-5">
                  <label class="field select">
                    <select id="filter-category" name="filter-category">
                      <option value="0">Filtrar por...</option>
                      <option value="1">Consecutivo</option>
                      <option value="2">Fecha de recepción</option>
                      <option value="3">Dependencia</option>
                    </select>
                    <i class="arrow"></i>
                  </label>
                </div>
                
                <div class="col-md-2">
                  <label class="field select">
                    <select id="bulk-action" name="bulk-action">
                      <option value="0">Buscar</option>
                    </select>
                    <i class="arrow double"></i>
                  </label>
                </div>
                
                <div class="col-md-5">
                  <label class="field select">
                    <select id="filter-status" name="filter-status">
                      <option value="0">Filtrar por estado</option>
                      @foreach($estatus as $status)
                      	<option value="{{$status->IdEstatus}}">{{$status->NombreEstatus}}</option>
                      @endforeach
                    </select>
                    <i class="arrow"></i>
                  </label>
                </div>
                
              </div>
            </div>
            <div class="panel-body pn">
              <div class="table-responsive">
                <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                  <thead>
                    <tr class="bg-light">
                      <th class="text-center"><i class="fa fa-asterisk"></i></th>
                      <th class="">No. de oficio</th>
                      <th class="">Dependencia</th>
                      <th class="">Fecha de entrega</th>
                      <th class="">Asunto</th>
                      <th class="text-center">Acciones para el oficio</th>
                    </tr>
                  </thead>
                  <tbody>
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
                      <td>{{$oficio->IdOficioEntrante}}</td>
					  <td>{{$oficio->IdOficioDependencia}}</td>
					  <td>{{$oficio->AcronimoDependencia}}</td>
					  <td>{{$oficio->Asunto}}</td>
					  <td>{{$oficio->FechaEntrega}}</td>
                      <td class="text-center">
                        <div class="btn-group text-center">
                          <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i>
                            <span class="caret ml50"></span>
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
						    <li>
						      <a href="#">Ver detalles</a>
						    </li>					    
						    <li class="divider"></li>
						    <li>
						      <a href="#">Cancelar oficio</a>
						    </li>
						  </ul>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
	  
	  
	  
	</div>
@stop