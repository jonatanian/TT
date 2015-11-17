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
            <div class="panel-menu admin-form theme-primary">
              <div class="row">
				
                <div class="col-md-4">
                  <label class="field select">
                    <select id="filter-purchases" name="filter-purchases">
                      <option value="0">Filtrar por...</option>
                      <option value="1">Orden alfabético</option>
                      <option value="1">Dirección</option>
                      <option value="2">Subdirección Técnica</option>
                      <option value="3">Subdirección de Posgrado</option>
                      <option value="4">Subdirección de Vinculación</option>
					  <option value="5">Departamento de Servicios Administrativos y Técnicos</option>
					  <option value="6">Departamento de Sistemas y Banco de Datos</option>
                    </select>
                    <i class="arrow double"></i>
                  </label>
                </div>
              </div>
            </div>
			
            <div class="panel-body pn">
              <div class="table-responsive">
                <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                  <thead>
                    <tr class="bg-light">
                      <th class="">&nbsp;</th>
                      <th class="">Nombre</th>
                      <th class="">Email</th>
                      <th class="">Extensión</th>
                      <th class="">Estátus</th>
                      
                      <th class="text-right">Cargo</th>

                    </tr>
                  </thead>
                  <tbody>
				  @foreach($usuarios as $usuario)
                    <tr>
                      <td class="w50">
						
                        <img class="img-responsive mw30 ib mr10" title="user" src="{{asset('images/placeholder.png')}}">
                      </td>
                      <td class="">{{$usuario->getNombreCompletoPMN()}}</td>
                      <td class="">{{$usuario->Email}}</td>
                      <td class="">{{$usuario->Extension}}</td>
					  <td class="text-left">
                        <div class="btn-group text-right">
						@if($usuario->Activo == 1)
                          <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Activo
                            <span class="caret ml5"></span>
                          </button>
						@else
						  <button type="button" class="btn btn-danger br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Inactivo
                            <span class="caret ml5"></span>
                          </button>
						@endif
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
                      <td class="text-right">{{$usuario->getCargo()}}</td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
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