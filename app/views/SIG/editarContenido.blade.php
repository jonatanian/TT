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
				<li>
					<a href="#">Secciones</a>
				</li>
				<li>&frasl;</li>
				<li class="active">
					<a href="#">{{$Seccion->NombreSeccion}}</a>
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
          @if($TipoDeContenido == 2)
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Nombre del documento:</b> Es el nombre del documento que se mostrará en el SIG.
            </li>
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Seleccionar archivo:</b> Selecciona el archivo PDF, Word o Excel de tu equipo de cómputo que deseas publicar en el SIG.
            </li>
          @else
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Nombre:</b> Es el nombre del item que quieres publicar como, por ejemplo, un objetivo.
            </li>
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Descripción:</b> Es el contenido que va a abordar tu item. Puede ser un desgloce del item, o bien, una pequeña descripción del mismo. Si no lo requieres, puedes dejarlo en blanco.
            </li>
          @endif
          </ul>
        </aside>
        <!-- end: .tray-left -->

        <!-- begin: .tray-center -->
        <div class="tray tray-center">
		@if($TipoDeContenido == 2)
          <!-- Panel with: Basic Footable -->
          <div class="panel" id="{{$areaActual}}">
          	{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true','files'=>true,'enctype'=>'multipart/form-data'))}}
            <!-- Store Settings -->
            <div class="panel panel-success panel-border top mb35">
              <div class="panel-heading">
                <span class="panel-title">Agregar nuevo Item</span>
                {{Form::hidden('AreaActual',$areaActual, array('id'=>'AreaActual'))}}
                {{Form::hidden('IdSeccion',$Seccion->IdSeccion, array('id'=>'IdSeccion'))}}
                {{Form::hidden('IdTipoDeContenido',$TipoDeContenido, array('id'=>'IdTipoDeContenido'))}}
                {{Form::hidden('IdATS',$IdATS, array('id'=>'IdATS'))}}
              </div>
              <div class="panel-body bg-light dark">
                <div class="admin-form">

                  <div class="section row mb10">
                    <label for="new-nombre" class="field-label col-md-3 text-center">Nombre del documento:</label>
                    <div class="col-md-9">
                      <label for="new-nombre" class="field prepend-icon">
                        <input type="text" name="new-nombre" id="new-nombre" class="gui-input" required ="required" placeholder="Escribe un nombre para el documento">
                        <label for="new-nombre" class="field-icon">
                          <i class="fa fa-bars"></i>
                        </label>
                      </label>
                    </div>
                  </div>

                  <div class="row">
	                  <div class="col-md-12 hidden-xs">
	                    <div class="section">
	                      <label class="field prepend-icon file">
	                        <span class="button bg-system">Seleccionar archivo</span>
	                        <input type="file" class="gui-file" name="set-archivo" id="set-archivo" required="required" onChange="document.getElementById('get-archivo').value = this.value;">
	                        <input type="text" class="gui-input" id="get-archivo" placeholder="Elije un archivo de tu equipo" readonly>
	                        <label class="field-icon">
	                          <i class="fa fa-upload"></i>
	                        </label>
	                      </label>
	                    </div>
	                  </div>
	              </div>				
				
				<div class="col-md-12 text-right">
					<button type="submit" class="button btn-success"> Publicar Item </button>
				</div>

                </div>
              </div>
            </div>
            {{Form::close()}}
          </div>
        @else
          <!-- Panel with: Basic Footable -->
          <div class="panel" id="{{$areaActual}}">
          	{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
            <!-- Store Settings -->
            <div class="panel panel-success panel-border top mb35">
              <div class="panel-heading">
                <span class="panel-title">Agregar nuevo Item</span>
                {{Form::hidden('AreaActual',$areaActual, array('id'=>'AreaActual'))}}
                {{Form::hidden('IdSeccion',$Seccion->IdSeccion, array('id'=>'IdSeccion'))}}
                {{Form::hidden('IdTipoDeContenido',$TipoDeContenido, array('id'=>'IdTipoDeContenido'))}}
                {{Form::hidden('IdATS',$IdATS, array('id'=>'IdATS'))}}
              </div>
              <div class="panel-body bg-light dark">
                <div class="admin-form">
                                  
                  <div class="section row mb10">
                    <label for="new-nombre" class="field-label col-md-3 text-center">Nombre:</label>
                    <div class="col-md-9">
                      <label for="new-nombre" class="field prepend-icon">
                        <input type="text" name="new-nombre" id="new-nombre" class="gui-input" required="required" placeholder="Escribe el texto deseado">
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
                        <textarea class="gui-textarea" id="set-descripcion" name="set-descripcion" placeholder="Escribe una pequeña reseña (opcional)"></textarea>
                        <label for="set-descripcion" class="field-icon">
                          <i class="fa fa-edit"></i>
                        </label>
                      </label>
                    </div>
                  </div>				
				
				<div class="col-md-12 text-right">
					<button type="submit" class="button btn-success"> Publicar Item </button>
				</div>

                </div>
              </div>
            </div>
            {{Form::close()}}
          </div>
		@endif
        @if($TipoDeContenido == 2)  
          	<!-- Panel with: Basic Footable -->
           	<!-- Store Settings -->
            <div class="panel panel-light panel-border top mb35">
              <div class="panel-heading">
              	<p class="panel-title text-center">Tabla de contenido</p>
              </div>
              <div class="panel-body bg-light dark">
                <div class="admin-form">
					<table class="table table-striped">
						<tr>
							<th>No.</th>
							<th width="2000">Nombre</th>
							<th>Acciones</th>
						</tr>
						@foreach($Items as $Item)
						<tr>
							<td>x</td>
							<td>{{$Item->NombreODescripcion}}</td>
							<td><a href = "{{action('SIGController@descargarDocumento',array('IdContenido'=>$Item->IdContenido))}}" class="btn btn-system" target="_blank">Descargar</a></td>
						</tr>
						@endforeach
					</table>
                </div>
              </div>
            </div>
        @else
	        <!-- Panel with: Basic Footable -->
	       	<!-- Store Settings -->
	        <div class="panel panel-light panel-border top mb35">
	          <div class="panel-heading">
	          	<p class="panel-title text-center">Tabla de contenido</p>
	          </div>
	          <div class="panel-body bg-light dark">
	            <div class="admin-form">
					<table class="table table-striped">
						<tr>
							<th>No.</th>
							<th width="1000">Nombre</th>
							<th width="1000">Descripcion</th>
							<th>Acciones</th>
						</tr>
						@foreach($Items as $Item)
						<tr>
							<td>x</td>
							<td>{{$Item->NombreODescripcion}}</td>
							@if($Item->AccionesOMetas == NULL)
							<td>N&frasl;A</td>
							@else
							<td>{{$Item->AccionesOMetas}}</td>
							@endif
							<td class="text-center">N&frasl;A</td>
						</tr>
						@endforeach
					</table>
	            </div>
	          </div>
	        </div>
	    @endif
          </div>
        <!-- end: .tray-center -->

      </section>
@endsection