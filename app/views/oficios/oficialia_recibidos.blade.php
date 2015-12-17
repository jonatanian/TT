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
			<span class="fa fa-plus pr5"></span> Nuevo oficio entrante </a>
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
                      <option value="1">Dependencia</option>
                      <option value="2">Estátus</option>
                      <option value="3">Identificador oficial</option>
                    </select>
                    <i class="arrow"></i>
                  </label>
                </div>
                
                <div id="select-filter">
					<!------------------------Filtro dinámico------------------------->
				</div>
                
              </div>
            </div>
			
            <div class="panel-body pn">
              <div class="table-responsive">
                <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                  <thead>
                    <tr class="bg-light">
                      <th class="text-center">Folio</th>
                      <th class="">No. de oficio</th>
                      <th class="">Dependencia</th>
                      <th class="">Asunto</th>
                      <th class="">Fecha de recepción</th>
                      <th class="">Estatus</th>
                      <th class="">Responsable actual</th>
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
					  <td>{{$oficio->NombreEstatus}}</td>
					  <td>{{$oficio->ApPaterno}}&nbsp;{{$oficio->ApMaterno}}&nbsp;{{$oficio->Nombre}}</td>
                      <td class="text-center">
                        <div class="btn-group text-center">
                          <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i>
                            <span class="caret ml50"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li>
						      <a href="#">Enviar copia a</a>
						    </li>
						    <li>
						      <a href="{{action('OficiosEntrantesController@verPDF',array('correspondencia'=>$oficio->IdCorrespondencia))}}" target="_blank">Descargar PDF</a>
						    </li>
						    <li>
						      <a href="#">Ver detalles</a>
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
		<div hidden>
				<div class="col-md-5" id="dependencia-filter">
                  <label class="field select">
                    <select id="filter-category" name="filter-dependencia">
                      <option value="0">Seleccione la dependencia...</option>
						  @foreach($dependencias as $dependencia)
							<option value="{{$dependencia->IdDependencia}}">{{$dependencia->NombreDependencia}}</option>
						  @endforeach
                    </select>
                    <i class="arrow"></i>
                  </label>
                </div>
				<div class="col-md-1" id="dependencia-button">
                  <label class="field select">
                    <a href="#" class="btn btn-success field select">Filtrar</a>
                  </label>
                </div>
				
				<div class="col-md-5" id="estatus-filter">
					  <label class="field select" id="filter2">
						<select id="filter-status" name="filter-estatus">
						  <option value="0">Seleccione el estado...</option>
						  @foreach($estatus as $status)
							<option value="{{$status->IdEstatus}}">{{$status->NombreEstatus}}</option>
						  @endforeach
						</select>
						<i class="arrow"></i>
					  </label>
					</div>
				<div class="col-md-1" id="estatus-button">
                  <label class="field select">
                    <a href="#" class="btn btn-success field select">Filtrar</a>
                  </label>
                </div>
				
				<div class="col-md-5" id="identificador-filter">
					<label for="IdOficial" class="field prepend-icon">
						<select class="select2-single form-control gui-input">
	                        @foreach($oficios as $oficio)
	                        <option value="{{$oficio->IdOficioEntrante}}">{{$oficio->IdOficioDependencia}}</option>
	                        @endforeach
	                    </select>
						<label for="AreaE" class="field-icon">
							<i class="fa fa-institution"></i>
						</label>
					</label>
				</div>
				<div class="col-md-1" id="identificador-button">
                  <label class="field select">
                    <a href="#" class="btn btn-success field select">Filtrar</a>
                  </label>
                </div>
		</div>
	  
	  
	</div>
@stop
@section('scripts')
<script>
$( "#filter-category" ).click(function() {
  var option = $('#filter-category').val()
  if(option == 1)
  {
	  $( "#estatus-filter" ).hide();
	  $( "#identificador-filter" ).hide();
	  $( "#dependencia-filter").show();
	  $( "#estatus-button" ).hide();
	  $( "#identificador-button" ).hide();
	  $( "#dependencia-button").show();
	  $("#select-filter").append($('#dependencia-filter'));
	  $( "#select-filter").append($("#dependencia-button"));
  }
  else if(option == 2)
  {
	  $( "#dependencia-filter" ).hide();
	  $( "#identificador-filter" ).hide();
	  $( "#estatus-filter").show();
	  $( "#dependencia-button" ).hide();
	  $( "#identificador-button" ).hide();
	  $( "#estatus-button").show();
	  $("#select-filter").append($('#estatus-filter'));
	  $( "#select-filter").append($("#estatus-button"));
  }
  else if(option == 3)
  {
	  $( "#dependencia-filter" ).hide();
	  $( "#estatus-filter" ).hide();
	  $( "#identificador-filter").show();
	  $( "#dependencia-button" ).hide();
	  $( "#estatus-button" ).hide();
	  $( "#identificador-button").show();
	  $("#select-filter").append($('#identificador-filter'));
	  $( "#select-filter").append($("#identificador-button"));
  }
});

// Init Select2 - Basic Single
    $(".select2-single").select2({
    	width: 400,
    });
</script>
@stop