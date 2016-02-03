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
					<a href="#">Nombre de la sección</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- End: Topbar -->
@endsection

@section('content')
	<section id="content" class="table-layout animated fadeIn">
				
        <!-- begin: .tray-left -->
        <aside class="tray tray-left tray320">

          <h4> Contenido SIG -
            <small>Gestión de información</small>
          </h4>
          <ul class="icon-list">
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Tipo de contenido:</b> Define el tipo de contenido por cada sección. Elije <b>Detalles</b> para tablas de objetivos o de carácter informativo; elije <b>Botón de descarga</b> para tablas con vínculos a archivos PDF, Word o Excel.
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
              <b> Descripción:</b> Es un párrafo que describe brevemente el contenido de la nueva sección a crear.
            </li>
          </ul>
        </aside>
        <!-- end: .tray-left -->

        <!-- begin: .tray-center -->
        <div class="tray tray-center">
		@if($TipoDeContenido == 2)
          <!-- Panel with: Basic Footable -->
          <div class="panel" id="{{$areaActual}}">
          	{{Form::open(array('class'=>'form-horizontal row-border','id'=>"validate-form",'data-parsley-validate'=>'true'))}}
            <!-- Store Settings -->
            <div class="panel panel-success panel-border top mb35">
              <div class="panel-heading">
                <span class="panel-title">Agregar nuevo Item</span>
                {{Form::hidden('IdTipoDeContenido',$TipoDeContenido, array('id'=>'IdTipoDeContenido'))}}
                {{Form::hidden('IdATS',$IdATS, array('id'=>'IdATS'))}}
              </div>
              <div class="panel-body bg-light dark">
                <div class="admin-form">

                  <div class="section row mb10">
                    <label for="new-objetivo" class="field-label col-md-3 text-center">Nombre del documento:</label>
                    <div class="col-md-9">
                      <label for="new-objetivo" class="field prepend-icon">
                        <input type="text" name="new-objetivo" id="new-objetivo" class="gui-input" placeholder="Escribe un nombre para el documento">
                        <label for="new-objetivo" class="field-icon">
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
	                        <input type="file" class="gui-file" name="Documento" id="Documento" onChange="document.getElementById('UpDocumento').value = this.value;">
	                        <input type="text" class="gui-input" id="UpDocumento" placeholder="Elije un archivo de tu equipo">
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
                {{Form::hidden('IdTipoDeContenido',$TipoDeContenido, array('id'=>'IdTipoDeContenido'))}}
                {{Form::hidden('IdATS',$IdATS, array('id'=>'IdATS'))}}
              </div>
              <div class="panel-body bg-light dark">
                <div class="admin-form">
                                  
                  <div class="section row mb10">
                    <label for="new-objetivo" class="field-label col-md-3 text-center">Objetivo:</label>
                    <div class="col-md-9">
                      <label for="new-objetivo" class="field prepend-icon">
                        <input type="text" name="new-objetivo" id="new-objetivo" class="gui-input" placeholder="Usa este campo sólo si el nombre deseado no aparece en la lista de arriba">
                        <label for="new-objetivo" class="field-icon">
                          <i class="fa fa-bars"></i>
                        </label>
                      </label>
                    </div>
                  </div>

                  <div class="section row mb10">
                    <label for="set-descripcion" class="field-label col-md-3 text-center">Metas:</label>
                    <div class="col-md-9">
                      <label class="field prepend-icon">
                        <textarea class="gui-textarea" id="set-descripcion" name="set-descripcion" placeholder="Escribe las metas del objetivo (opcional)"></textarea>
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
							<th width="2000">Procedimiento</th>
							<th>Acciones</th>
						</tr>
						<tr>
							<td>1</td>
							<td>PROCEDIMIENTO DE AUDITORÍA INTERNA</td>
							<td><a href = '../procedimientos/DSBD/EDITABLES/PROCEDIMIENTOS/P-DSBD-AUDITORIA INTERNA.pdf' class='btn btn-system' target="_blank">Descargar</a></td>
						</tr>
						<tr>
							<td>2</td>
							<td>PROCEDIMIENTO DE CONTROL DE DOCUMENTOS</td>
							<td><a href = '../procedimientos/DSBD/EDITABLES/PROCEDIMIENTOS/Procedimientos de control de documentos.pdf' class='btn btn-system' target="_blank">Descargar</a></td>
						</tr>
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
							<th width="1000">Procedimiento</th>
							<th width="1000">Metas</th>
							<th>Acciones</th>
						</tr>
						<tr>
							<td>1</td>
							<td>PROCEDIMIENTO DE AUDITORÍA INTERNA</td>
							<td>Metas de item</td>
							<td><a href = '../procedimientos/DSBD/EDITABLES/PROCEDIMIENTOS/P-DSBD-AUDITORIA INTERNA.pdf' class='btn btn-system' target="_blank">Descargar</a></td>
						</tr>
					</table>
	            </div>
	          </div>
	        </div>
	    @endif
          </div>
        <!-- end: .tray-center -->

      </section>
@endsection