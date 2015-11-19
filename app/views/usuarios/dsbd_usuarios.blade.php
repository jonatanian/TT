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
			{{Form::open(array('action'=>'UsersController@dsbd_consultarUsuarios', 'class'=>'form-horizontal row-border','id'=>"form-wizard",'data-parsley-validate'=>'true'))}}
              <div class="row">
				
                <div class="col-md-4">
                  <label class="field select">
                    <select id="filter-purchases" name="Consulta">
					@if(isset($Consulta))
						@if($Consulta == 0)
							  <option>Filtrar por...</option>
							  <option value="0" selected="selected">Orden alfabético</option>
							  <option value="1">Dirección</option>
							  <option value="2">Subdirección Técnica</option>
							  <option value="3">Subdirección de Posgrado</option>
							  <option value="4">Subdirección de Vinculación</option>
							  <option value="5">Departamento de Ingeniería de Procesos</option>
							  <option value="6">Departamento de Ingeniería de Energía</option>
							  <option value="7">Departamento de Servicios Administrativos y Técnicos</option>
							  <option value="8">Departamento de Sistemas y Banco de Datos</option>
						@elseif($Consulta == 1)
							  <option>Filtrar por...</option>
							  <option value="0">Orden alfabético</option>
							  <option value="1" selected="selected">Dirección</option>
							  <option value="2">Subdirección Técnica</option>
							  <option value="3">Subdirección de Posgrado</option>
							  <option value="4">Subdirección de Vinculación</option>
							  <option value="5">Departamento de Ingeniería de Procesos</option>
							  <option value="6">Departamento de Ingeniería de Energía</option>
							  <option value="7">Departamento de Servicios Administrativos y Técnicos</option>
							  <option value="8">Departamento de Sistemas y Banco de Datos</option>
						@elseif($Consulta == 2)
							  <option>Filtrar por...</option>
							  <option value="0">Orden alfabético</option>
							  <option value="1">Dirección</option>
							  <option value="2" selected="selected">Subdirección Técnica</option>
							  <option value="3">Subdirección de Posgrado</option>
							  <option value="4">Subdirección de Vinculación</option>
							  <option value="5">Departamento de Ingeniería de Procesos</option>
							  <option value="6">Departamento de Ingeniería de Energía</option>
							  <option value="7">Departamento de Servicios Administrativos y Técnicos</option>
							  <option value="8">Departamento de Sistemas y Banco de Datos</option>
						@elseif($Consulta == 3)
							  <option>Filtrar por...</option>
							  <option value="0">Orden alfabético</option>
							  <option value="1">Dirección</option>
							  <option value="2">Subdirección Técnica</option>
							  <option value="3" selected="selected">Subdirección de Posgrado</option>
							  <option value="4">Subdirección de Vinculación</option>
							  <option value="5">Departamento de Ingeniería de Procesos</option>
							  <option value="6">Departamento de Ingeniería de Energía</option>
							  <option value="7">Departamento de Servicios Administrativos y Técnicos</option>
							  <option value="8">Departamento de Sistemas y Banco de Datos</option>
						@elseif($Consulta == 4)
							  <option>Filtrar por...</option>
							  <option value="0">Orden alfabético</option>
							  <option value="1">Dirección</option>
							  <option value="2">Subdirección Técnica</option>
							  <option value="3">Subdirección de Posgrado</option>
							  <option value="4" selected="selected">Subdirección de Vinculación</option>
							  <option value="5">Departamento de Ingeniería de Procesos</option>
							  <option value="6">Departamento de Ingeniería de Energía</option>
							  <option value="7">Departamento de Servicios Administrativos y Técnicos</option>
							  <option value="8">Departamento de Sistemas y Banco de Datos</option>
						@elseif($Consulta == 5)
							  <option>Filtrar por...</option>
							  <option value="0">Orden alfabético</option>
							  <option value="1">Dirección</option>
							  <option value="2">Subdirección Técnica</option>
							  <option value="3">Subdirección de Posgrado</option>
							  <option value="4">Subdirección de Vinculación</option>
							  <option value="5" selected="selected">Departamento de Ingeniería de Procesos</option>
							  <option value="6">Departamento de Ingeniería de Energía</option>
							  <option value="7">Departamento de Servicios Administrativos y Técnicos</option>
							  <option value="8">Departamento de Sistemas y Banco de Datos</option>
							  
						@elseif($Consulta == 6)
							  <option>Filtrar por...</option>
							  <option value="0">Orden alfabético</option>
							  <option value="1">Dirección</option>
							  <option value="2">Subdirección Técnica</option>
							  <option value="3">Subdirección de Posgrado</option>
							  <option value="4">Subdirección de Vinculación</option>
							  <option value="5">Departamento de Ingeniería de Procesos</option>
							  <option value="6" selected="selected">Departamento de Ingeniería de Energía</option>
							  <option value="7">Departamento de Servicios Administrativos y Técnicos</option>
							  <option value="8">Departamento de Sistemas y Banco de Datos</option>
						@elseif($Consulta == 7)
							  <option>Filtrar por...</option>
							  <option value="0">Orden alfabético</option>
							  <option value="1">Dirección</option>
							  <option value="2">Subdirección Técnica</option>
							  <option value="3">Subdirección de Posgrado</option>
							  <option value="4">Subdirección de Vinculación</option>
							  <option value="5">Departamento de Ingeniería de Procesos</option>
							  <option value="6">Departamento de Ingeniería de Energía</option>
							  <option value="7" selected="selected">Departamento de Servicios Administrativos y Técnicos</option>
							  <option value="8">Departamento de Sistemas y Banco de Datos</option>
						@elseif($Consulta == 8)
							  <option>Filtrar por...</option>
							  <option value="0">Orden alfabético</option>
							  <option value="1">Dirección</option>
							  <option value="2">Subdirección Técnica</option>
							  <option value="3">Subdirección de Posgrado</option>
							  <option value="4">Subdirección de Vinculación</option>
							  <option value="5">Departamento de Ingeniería de Procesos</option>
							  <option value="6">Departamento de Ingeniería de Energía</option>
							  <option value="7">Departamento de Servicios Administrativos y Técnicos</option>
							  <option value="8" selected="selected">Departamento de Sistemas y Banco de Datos</option>
						@endif
					@else
                      <option>Filtrar por...</option>
                      <option value="0">Orden alfabético</option>
                      <option value="1">Dirección</option>
                      <option value="2">Subdirección Técnica</option>
                      <option value="3">Subdirección de Posgrado</option>
                      <option value="4">Subdirección de Vinculación</option>
					  <option value="5">Departamento de Ingeniería de Procesos</option>
					  <option value="6">Departamento de Ingeniería de Energía</option>
					  <option value="7">Departamento de Servicios Administrativos y Técnicos</option>
					  <option value="8">Departamento de Sistemas y Banco de Datos</option>
					@endif
                    </select>
					
					
					<!--{{Form::text('auto', '', array('id' => 'auto'))}}
					
					{{Form::text('response', '', array('id' =>'response', 'disabled' => 'disabled'))}}-->
                    <i class="arrow double"></i>
                  </label>
                </div>
				{{Form::submit('Buscar', array('class'=>'button btn-primary pull-left'))}}
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
			  {{Form::close()}}
            </div>
			
          </div>
		
          
@stop

@section('scripts')
<script type="text/javascript">
  $(function() {

	$("#auto").autocomplete({
                    source: "getdata",
                    minLength: 1,
                    select: function( event, ui ) {
                        $('#response').val(ui.item.id);
                    }
                });
    
  });  
</script>
@stop