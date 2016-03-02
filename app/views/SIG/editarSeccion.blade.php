@extends('layouts.SIG_RD')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li>
					<a href="{{action('SIGController@SIG_RD')}}">Configuración del SIG</a>
				</li>
				<li>&frasl;</li>
				<li>
					<a href="#">{{$areaActualNombre->NombreArea}}</a>
				</li>
				<li>&frasl;</li>
				<li class="active">
					<a href="#">Editar sección</a>
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
              <b> Tipo de contenido:</b> Define el tipo de contenido por cada sección. Elije <b>Texto</b> para secciones de carácter informativo como objetivos o metas; elije <b>Botón de descarga</b> para tablas con vínculos a archivos PDF, Word o Excel.
            </li>
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Nombre de la seccion:</b> Selecciona un nombre registrado previamente para asignarle a la nueva sección.
            </li>
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Nuevo nombre de la sección:</b> Escribe un nuevo nombre de sección en caso de que no exista el nombre deseado en <b>Nombre de la sección</b>.
            </li>
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Descripción:</b> Es un párrafo que describe brevemente el contenido de la nueva sección a crear. Puede ser opcional.
            </li>
          </ul>
        </aside>
        <!-- end: .tray-left -->

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

          <!-- Panel with: Basic Footable -->
          <div class="panel" id="{{$areaActual}}">
          	{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
            <!-- Store Settings -->
            <div class="panel panel-success panel-border top mb35">
              <div class="panel-heading">
                <span class="panel-title">Nueva sección para {{$areaActualNombre->NombreArea}}</span>
                {{Form::hidden('IdArea',$areaActualNombre->IdArea, array('id'=>'IdArea'))}}
              </div>
              <div class="panel-body bg-light dark">
                <div class="admin-form">


                  <div class="section row mb10">
                    <label for="new-nombre" class="field-label col-md-3 text-center">Nombre de la sección:</label>
                    <div class="col-md-9">
                      <label for="new-nombre" class="field prepend-icon">
                        <input type="text" name="new-nombre" id="new-nombre" class="gui-input" value="{{$NombreSeccion->NombreSeccion}}">
                        <label for="new-nombre" class="field-icon">
                          <i class="fa fa-bars"></i>
                        </label>
                      </label>
                    </div>
                  </div>

                  <div class="section row mb10">
                    <label for="set-descripcion" class="field-label col-md-3 text-center">Descripción:</label>
                    <div class="col-md-9">
                      <label class="field prepend-icon">
                        <textarea class="gui-textarea" id="set-descripcion" name="set-descripcion" placeholder="Aparecerá como párrafo introductorio a la tabla de contenido (opcional)">{{$Descripcion->Descripcion}}</textarea>
                        <label for="set-descripcion" class="field-icon">
                          <i class="fa fa-edit"></i>
                        </label>
                      </label>
                    </div>
                  </div>

				<div class="col-md-12 text-right">
					<button type="submit" class="button btn-success"> Editar sección </button>
				</div>

                </div>
              </div>
            </div>
            {{Form::close()}}
          </div>

          </div>
        <!-- end: .tray-center -->

      </section>
@endsection
