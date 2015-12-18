@extends('layouts.oficialia')

@section('Topbar')
<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="{{action('MemosController@oficialia_recibidos')}}">Memorándums recibidos</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('MemosController@oficialia_nuevo_recibido',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL))}}" class="btn btn-default btn-sm fw600 ml10">
			<span class="fa fa-plus pr5"></span> Nuevo Memorándum </a>
		</div>
	</header>
	<!-- End: Topbar -->
@stop

@section('ContentClass')
	<section id="content" class="animated fadeIn">
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

	  <!-- Panel Body with Table (no padding) -->
	  <div class="panel-body pn">
	      <table class="table table-striped">
			<tr class="success">
				<td>Folio</td>
				<td>No. de memo</td>
				<td>Dirigido a</td>
				<td>Emisor</td>
				<td>Tipo</td>
				<td>Estatus</td>
			<tr>
			<!--<tr>
				<td>1</td>
				<td>CMPL/MEMO/2015/47</td>
				<td>Nidia Orea Escalona</td>
				<td>Rogelio Sotelo Boyás</td>
				<td>Intranet CMPL</td>
				<td><a href="#" class="btn btn-success">Cancelar proceso</a></td>
			<tr>-->
		  </table>
	  </div>
	</div>
@stop