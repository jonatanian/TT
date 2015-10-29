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
}
?>