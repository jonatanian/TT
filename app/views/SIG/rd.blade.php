@extends('layouts.SIG_RD')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="{{action('SIGController@SIG_RD')}}">Configuración del SIG</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@endsection

@section('content')
		@if(Session::has('msg'))
      		<div class="alert alert-success alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-check pr10"></i>
			  {{Session::get('msg')}}
			</div>
      	@endif
      	@if(Session::has('msgInfo'))
      		<div class="alert alert-info alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-info pr10"></i>
			  {{Session::get('msgInfo')}}
			</div>
      	@endif
      	@if(Session::has('msgWarning'))
      		<div class="alert alert-warning alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-warning pr10"></i>
			  {{Session::get('msgWarning')}}
			</div>
		@endif
        @if(Session::has('msgf'))
          	<div class="alert alert-danger alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-remove pr10"></i>
			  {{Session::get('msgf')}}
			</div>
        @endif
        @if(Session::has('msgSystem'))
	        <div class="alert alert-system alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-cubes pr10"></i>
			  {{Session::get('msgSystem')}}
			</div>
		@endif
		@if(Session::has('msgAlert'))
	        <div class="alert alert-alert alert-dismissable">
			  <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
			  <i class="fa fa-check pr10"></i>
			  {{Session::get('msgAlert')}}
			</div>
		@endif
	<section id="content" class="table-layout animated fadeIn">
        <!-- begin: .tray-left -->
        <aside class="tray tray-left tray320">

          <h4> Contenido SIG -
            <small>Gestión de información</small>
          </h4>
          <ul class="icon-list">
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Secciones:</b> Para crear una nueva sección, elije un área del CMPL y da clic en <b>+ Nueva sección</b>
            </li>
            <!--
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Organigramas:</b> Actualiza facilmente las imágenes de los organigramas de cada área o en general
            </li>-->
          </ul>

          <div id="nav-spy">
            <ul class="nav tray-nav" data-smoothscroll="-80" data-spy="affix" data-offset-top="200">
              @foreach($areas as $area)
              	@if($area->Organigrama_Id != NULL)
	              @if($area->IdArea == 1)
	              <li class="active">
	              @else
	              <li>
	              @endif
	                <a href="#{{$area->IdArea}}">
	                  <span class="fa fa-table fa-lg fa-fw mr5"></span>
	                  {{$area->NombreArea}}</a>
	              </li>
	            @endif
              @endforeach
            </ul>
          </div>

        </aside>
        <!-- end: .tray-left -->

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

          <!-- Panel with: Basic Footable -->
        @foreach($areas as $area)
        @if($area->Organigrama_Id != NULL)
          <div class="panel" id="{{$area->IdArea}}">
            <div class="panel-heading">
              <span class="panel-title">
                <span class="fa fa-table"></span>{{$area->NombreArea}}
              </span>
            </div>
            <div class="panel-body pn">
              <table class="table footable">
                  <thead>
                    <tr>
                      <th>Precedencia</th>
                      <th>Nombre de la sección</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($secciones as $seccion)
                  @if(($seccion->Area_Id == $area->IdArea) && ($seccion->SecDeArea == $area->IdArea))
                    <tr>
                      <td>{{$seccion->Precedencia}}</td>
                      <td>{{$seccion->NombreSeccion}}</td>
                      @if($seccion->Descripcion == NULL)
                      <td>N&frasl;A</td>
                      @else
                      <td>{{$seccion->Descripcion}}</td>
                      @endif
                      <td>
                      	<div class="col-md-12 text-left"><!--
							<a href="#" class="btn btn-dark btn-sm"> Modificar </a>-->
							<a href="{{action('SIGController@editarTabla',array('IdSeccion'=>$seccion->IdSeccion,'IdATS'=>$seccion->IdATS,'TipoContenido'=>$seccion->TipoDeContenido_Id,'area'=>$area->IdArea))}}" class="btn btn-dark btn-sm"> Alimentar </a>
							<a href="{{action('SIGController@editarSeccion',array('IdSeccion'=>$seccion->IdSeccion,'IdArea'=>$area->IdArea))}}" class="btn btn-dark btn-sm"> Editar </a>
							<a href="{{action('SIGController@eliminarSeccion',array('IdSeccion'=>$seccion->IdSeccion,'IdATS'=>$seccion->IdATS,'IdArea'=>$area->IdArea))}}" class="btn btn-danger btn-sm"> Quitar </a>
						</div>
                      </td>
                    </tr>
                  @endif
                  @endforeach
                    <tr>
                      <td colspan="4">
                      	<div class="col-md-12 text-center">
							<a href="{{action('SIGController@nuevaSeccion',array('area'=>$area->IdArea))}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Nueva sección </a>
						</div>
                      </td>
                      <td></td>
                      <td>
                      </td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
        @endif
		@endforeach
          </div>
        <!-- end: .tray-center -->

      </section>
@endsection
