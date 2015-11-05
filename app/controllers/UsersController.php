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
		$usuario->crearUsuario($datos);
		Session::flash('msgf','El usuario de registró con éxito.');
		return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios));
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
		Session::flash('msgf','Usuario actualizado con éxito.');
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
			Session::flash('msgf','Cambio de contraseña exitoso.');
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
			Session::flash('msgf','Se cambió el estátus del usuario con éxito.');
			return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios));
		}
	}
	
	public function dsbd_actualizarEstatus()
	{
		$datos = Input::all();
		$usuario = new User();
		$usuario->actualizarEstatus($datos);
		$usuarios = User::get();
		Session::flash('msgf','Se cambió el estátus del usuario con éxito.');
		return View::make('usuarios.dsbd_usuarios', array('usuarios'=>$usuarios));
	}
	
}
?>