@extends('layouts.dsbd')

@section('Topbar')
	<!-- Start: Topbar -->
	<header id="topbar" class="ph10">
		<div class="topbar-left">
			<ul class="nav nav-list nav-list-topbar pull-left">
				<li class="active">
					<a href="#">Usuarios registrados</a>
				</li>
			</ul>
		</div>
		<div class="topbar-right hidden-xs hidden-sm">
			<a href="{{action('UsersController@dsbd_nuevoUsuario')}}" class="btn btn-default btn-sm fw600 ml10">
			<span class="fa fa-plus pr5"></span> Nuevo usuario</a>
		</div>
	</header>
	<!-- End: Topbar -->
@stop
@section('content')

		<div class="panel">
	  <!-- Panel Body with Table (no padding) -->
	  <div class="panel-body pn">
	      <table class="table table-striped">
			<tr class="dark">
				<td>&nbsp;</td>
				<td>Nombre</td>
				<td>Correo</td>
				<td>Extensión</td>
				<td>Acciones para el usuario</td>
			<tr>
			@foreach($usuarios as $usuario)
			@if($usuario->Activo == 1)
			<tr class="success">
			@else
			<tr class="danger">
			@endif
				<td>{{$usuario->IdUsuario}}</td>
				<td>{{$usuario->getNombreCompleto()}}</td>
				<td>{{$usuario->Email}}</td>
				<td>{{$usuario->Extension}}</td>
				<td>
					<div class="btn-group">
					  <button class="btn btn-sucesss dropdown-toggle" aria-expanded="false" type="button" data-toggle="dropdown">
					    <span class="caret"></span>&nbsp;&nbsp;<i class="fa fa-gears"></i>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li>
					      <a href="{{action('UsersController@dsbd_editarUsuario', array('IdUsuario'=>$usuario->IdUsuario))}}">Editar</a>
					    </li>
					    <li>
					      <a href="{{action('UsersController@dsbd_recuperarContrasenaUsuario', array('IdUsuario'=>$usuario->IdUsuario))}}">Recuperar contraseña</a>
					    </li>
					    <li>
					      <a href="#">Ver detalles</a>
					    </li>					    
					    <li class="divider"></li>
					    <li>
					      <a href="{{action('UsersController@dsbd_cambiarEstatus', array('IdUsuario'=>$usuario->IdUsuario, 'Activo'=>$usuario->Activo))}}">Cambiar estatus</a>
					    </li>
					  </ul>
					</div>
				</td>
			</tr>
			@endforeach
		  </table>
	  </div>
	</div>
          
@stop

@section('scripts')
<script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Form Wizard 
    var form = $("#form-wizard");
    form.children(".wizard").steps({
      headerTag: ".wizard-section-title",
      bodyTag: ".wizard-section",
      onStepChanging: function(event, currentIndex, newIndex) {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
      },
      onFinishing: function(event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
      },
      onFinished: function(event, currentIndex) {
        alert("Submitted!");
      }
    });

    
  });
</script>
@stop