<?php

class UsersController extends BaseController {

	public function homepage_index()
		{
			Auth::user();
			//if()
			return View::make('dsbd.dsbd_index');
		}
	
	public function dsbd_usuarios()
	{
		$usuarios = User::get();
		return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios));
	}
	
	public function dsbd_nuevoUsuario()
	{
		$roles = Rol::lists('NombreRol', 'IdRol');
		$cargos = Cargo::lists('NombreCargo', 'IdCargo');
		$areas = Area::lists('NombreArea', 'IdArea');
		return View::make('usuarios.dsbd_nuevo_usuario', array('roles'=>$roles, 'cargos'=>$cargos, 'areas'=>$areas));
	}
	
	public function dsbd_registrarUsuario()
	{
		$usuarios = User::get();
		$usuario = new User();
		$datos = Input::all();
		if($usuario->compararContrasena($datos))
		{
			$usuario->crearUsuario($datos);
			Session::flash('msg','El usuario de registró con éxito.');
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios));
		}
		else
			Session::flash('msgf','Error. No coinciden las contraseñas.');
			$roles = Rol::lists('NombreRol', 'IdRol');
			$cargos = Cargo::lists('NombreCargo', 'IdCargo');
			$areas = Area::lists('NombreArea', 'IdArea');
			Session::flash('msgf','Error. No coinciden las contraseñas.');
			return View::make('usuarios.dsbd_nuevo_usuario', array('roles'=>$roles, 'cargos'=>$cargos, 'areas'=>$areas));
	}
	public function	dsbd_editarUsuario()
	{
		$IdUsuario = Request::get('IdUsuario');
		$usuario = User::find($IdUsuario);
		$roles = Rol::lists('NombreRol', 'IdRol');
		$cargos = Cargo::lists('NombreCargo', 'IdCargo');
		$areas = Area::lists('NombreArea', 'IdArea');
		return View::make('usuarios.dsbd_editar_usuario', array('usuario'=>$usuario, 'roles'=>$roles, 'cargos'=>$cargos, 'areas'=>$areas));
	}

	public function	dsbd_actualizarUsuario()
	{
		$datos = Input::all();
		$usuario = new User();
		$usuario->actualizarUsuario($datos);
		$usuarios = User::get();
		Session::flash('msg','Usuario actualizado con éxito.');
		return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios));
	}
	public function	dsbd_recuperarContrasenaUsuario()
	{
		$IdUsuario = Request::get('IdUsuario');
		$usuario = User::find($IdUsuario);
		return View::make('usuarios.dsbd_recuperar_contrasena_usuario', array('usuario'=>$usuario));
	}
	
	public function dsbd_actualizarContrasenaUsuario()
	{
		$datos = Input::all();
		$usuario = new User();
		if($usuario->compararContrasena($datos))
		{
			$usuario->actualizarContrasenaUsuario($datos);
			$usuarios = User::get();
			Session::flash('msg','Cambio de contraseña exitoso.');
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios));
		}
		else
			$IdUsuario = Request::get('IdUsuario');
			$usuario = User::find($IdUsuario);
			Session::flash('msgf','Error. No coinciden las contraseñas.');
			return View::make('usuarios.dsbd_recuperar_contrasena_usuario', array('usuario'=>$usuario));
	}
	public function dsbd_cambiarEstatus()
	{
		if(Request::get('Activo'))
		{
			$IdUsuario = Request::get('IdUsuario');
			$usuario = User::find($IdUsuario);
			return View::make('usuarios.dsbd_cambiar_estatus', array('usuario'=>$usuario));
		}
		else
		{
			$datos = array('IdUsuario'=>Request::get('IdUsuario'),'Activo'=>'1', 'FechaFin'=>NULL);
			$usuario = new User();
			$usuario->actualizarEstatus($datos);
			$usuarios = User::get();
			Session::flash('msg','Se cambió el estátus del usuario con éxito.');
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios));
		}
	}
	
	public function dsbd_actualizarEstatus()
	{
		$datos = Input::all();
		$usuario = new User();
		$usuario->actualizarEstatus($datos);
		$usuarios = User::get();
		$areas = Area::get();
		Session::flash('msg','Se cambió el estátus del usuario con éxito.');
		return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios));
	}
	
	public function personal_cambiarContrasena()
	{
		$IdUsuario = Request::get('IdUsuario');
		$usuario = User::find($IdUsuario);
		return View::make('usuarios.personal_cambiar_contrasena_usuario', array('usuario'=>$usuario));
	}
	
	public function personal_actualizarContrasenaUsuario()
	{
		$datos = Input::all();
		$IdUsuario = Request::get('IdUsuario');
		$PasswordA = Request::get('PasswordA');
		$usuario = User::find($IdUsuario);
		if(Hash::check($PasswordA, $usuario->Password))
		{
			if($usuario->compararContrasena($datos))
			{
				$usuario->actualizarContrasenaUsuario($datos);
				Session::flash('msg','Cambio de contraseña exitoso.');
				if($usuario->Rol_Id == 1)
					return View::make('dsbd.dsbd_index');
				elseif($usuario->Rol_Id == 2)
					return View::make('oficialia.oficialia_index');
				elseif($usuario->Rol_Id == 3)
					return View::make('direccion.direccion_index');
				elseif($usuario->Rol_Id == 4)
					return View::make('subdireccion.subdireccion_index');
				elseif($usuario->Rol_Id == 5)
					return View::make('jefatura.jefatura_index');
				else
					return View::make('cmpl.cmpl_index');
			}
			else
			{
				Session::flash('msgf','Error. No coinciden las contraseñas.');
				return View::make('usuarios.personal_cambiar_contrasena_usuario', array('usuario'=>$usuario));
			}
		}
		else
			Session::flash('msgf','Error. Tu contraseña anterior no es válida');
			return View::make('usuarios.personal_cambiar_contrasena_usuario', array('usuario'=>$usuario));
	}
	
	public function dsbd_consultarUsuarios()
	{
		$consulta = Request::get('Consulta');
		$datos = Input::all();
		$usuarios = new User();
		if($consulta == 0)
		{
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios->ordenarAlafabeticamente(), 'Consulta'=>$consulta));
		}
		elseif($consulta == 1)
		{
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios->ordenarDireccion(), 'Consulta'=>$consulta));
		}
		elseif($consulta == 2)
		{
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios->ordenarSubdireccionTecnica(), 'Consulta'=>$consulta));
		}
		elseif($consulta == 3)
		{
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios->ordenarSubdireccionPosgrado(), 'Consulta'=>$consulta));
		}
		elseif($consulta == 4)
		{
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios->ordenarSubdireccionVinculacion(), 'Consulta'=>$consulta));
		}
		elseif($consulta == 5)
		{
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios->ordenarDepartamentoProcesos(), 'Consulta'=>$consulta));
		}
		elseif($consulta == 6)
		{
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios->ordenarDepartamentoEnergia(), 'Consulta'=>$consulta));
		}
		elseif($consulta == 7)
		{
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios->ordenarDepartamentoServicios(), 'Consulta'=>$consulta));
		}
		elseif($consulta == 8)
		{
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios->ordenarDepartamentoSistemas(), 'Consulta'=>$consulta));
		}
		else
		{
			return View::make('login.login');
		}
	}
	
}
?>