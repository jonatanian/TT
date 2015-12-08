@extends('layouts.direccion')

@section('Topbar')
<header id="topbar" class="alt">
	<div class="topbar-left">
	  <ol class="breadcrumb">
	    <li class="crumb-active">
	      <a href="{{action('DireccionController@direccion_index')}}">Correspondencia</a>
	    </li>
	  </ol>
	</div>
</header>
@endsection

@section('content')
<!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">

        

        <!-- begin: .tray-center -->
        <div class="tray tray-center pn bg-light">

	        <div class="panel">

	          <!-- message menu header -->
	          <div class="panel-menu br-n hidden">
	            <div class="row table-layout">
	              <!-- toolbar left btn group -->
	              <div class="hidden-xs hidden-sm col-md-3 va-m pln">
	                <div class="btn-group">
	                  <button type="button" class="btn btn-default light">
	                    <i class="fa fa-refresh"></i>
	                  </button>
	                  <button type="button" class="btn btn-default light">
	                    <i class="fa fa-pencil"></i>
	                  </button>
	                </div>
	              </div>
	            </div>
	          </div>

            <!-- message toolbar header -->
            <div class="panel-menu br-n">
              <div class="row">
                <div class="hidden-xs hidden-sm col-md-3">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default light">
                      <i class="fa fa-refresh"></i>
                    </button>
                  </div>
                </div>
                <div class="col-xs-12 col-md-9 text-right">
                  <button type="button" class="btn btn-danger light visible-xs-inline-block mr10">Compose</button>
                  <span class="hidden-xs va-m text-muted mr15"> Mostrando
                    <strong>1</strong> de
                    <strong>1</strong>
                  </span> 
                  <div class="btn-group">
                    <button type="button" class="btn btn-default light">
                      <i class="fa fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default light">
                      <i class="fa fa-chevron-right"></i>
                    </button>

                  </div>
                </div>
              </div>
            </div>

	          <!-- message listings table -->
	          <table id="message-table" class="table tc-checkbox-1 admin-form theme-warning br-t">
	            <thead>
	              <tr class="">
	                <th class="hidden-xs">Tipo</th>
	                <th>Turnado el</th>
	                <th class="hidden-xs">Emisor</th>
	                <th>Asunto</th>
	                <th class="hidden-xs">Estado</th>
	                <th class="text-center">Acciones</th>
	              </tr>
	            </thead>
	            <tbody>
	            @foreach($correspondencia as $c)
	              <tr class="message-unread">
	                <td class="hidden-xs">{{$c->NombreTipo}}</td>
	                <td class=""><span class="badge badge-warning mr10 fs11"> {{$c->FechaTurnadoA}} </span></td>
	                <td class="hidden-xs">{{$c->AcronimoDependencia}}</td>
	                <td class="">{{$c->Asunto}}</td>
	                <td class="hidden-xs">{{$c->NombreEstatus}}</td>
	                <td class="text-center fw600">
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
        <!-- end: .tray-center -->

      </section>
      <!-- End: Content -->
@endsection