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
					<a href="#">Nueva sección</a>
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
              <b> Secciones:</b> Personaliza el orden de las secciones para todas las áreas del CMPL
            </li>
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Contenido:</b> Define el tipo de contenido por cada sección
            </li>
            <li>
              <i class="fa fa-exclamation-circle text-warning fa-lg pr10"></i>
              <b> Organigramas:</b> Actualiza facilmente las imágenes de los organigramas de cada área o en general
            </li>
          </ul>

          <div id="nav-spy">
            <ul class="nav tray-nav" data-smoothscroll="-80" data-spy="affix" data-offset-top="200">
              @foreach($areas as $area)
              	@if($area->Organigrama_Id != NULL)
	              @if($area->IdArea == $areaActual)
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
                    <label for="names" class="field-label col-md-3 text-center">Tipo de contenido:</label>
                    <div class="col-md-9">
                      <label class="field select">
                        <select id="set-contenido" name="set-contenido">
                        @foreach($TipoDeContenido as $Contenido)
                          <option value="{{$Contenido->IdTipoDeContenido}}" selected="selected">{{$Contenido->NombreContenido}}</option>
                        @endforeach
                        </select>
                        <i class="arrow double"></i>
                      </label>
                    </div>
                  </div>
                  
                  <div class="section row mb10">
                    <label for="names" class="field-label col-md-3 text-center">Elije un nombre:</label>
                    <div class="col-md-9">
                      <label class="field select">
                        <select id="set-nombre" name="set-nombre">
                        @foreach($NombresSecciones as $Seccion)
                        	@if($Seccion->IdSeccion == 1)
                          		<option value="{{$Seccion->IdSeccion}}" selected="selected">{{$Seccion->NombreSeccion}}</option>
                          	@else
                          		<option value="{{$Seccion->IdSeccion}}">{{$Seccion->NombreSeccion}}</option>
                          	@endif
                        @endforeach
                        </select>
                        <i class="arrow double"></i>
                      </label>
                    </div>
                  </div>
                  
                  <div class="section row mb10">
                    <label for="new-nombre" class="field-label col-md-3 text-center">O crea un nuevo nombre:</label>
                    <div class="col-md-9">
                      <label for="new-nombre" class="field prepend-icon">
                        <input type="text" name="new-nombre" id="new-nombre" class="gui-input" placeholder="Usa este campo sólo si el nombre deseado no aparece en la lista de arriba">
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
                        <textarea class="gui-textarea" id="set-descripcion" name="set-descripcion" placeholder="Aparecerá como párrafo introductorio a la tabla de contenido" required="required"></textarea>
                        <label for="set-descripcion" class="field-icon">
                          <i class="fa fa-edit"></i>
                        </label>
                      </label>
                    </div>
                  </div>
				
				<div class="col-md-12 text-right">
					<button type="submit" class="button btn-success"> Crear sección </button>
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