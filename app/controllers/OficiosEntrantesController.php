<?php

class OficiosEntrantesController extends BaseController {
			
	public function oficialia_nuevoOficio()
		{
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			$dep_areas = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$entidades_externas = EntidadExterna::select('*')->orderBy('ApPaternoEntidad')->get();
			$cargos_entidades = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			$usuarios = Usuario::select('*')->orderBy('ApPaterno')->get();
			return View::make('oficios.oficialia_recibidos_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios));
		}
		
	public function oficialia_nuevoOficio_registrar()
		{
			Session::flash('msg','Registro de oficio entrante realizado correctamente.');
			return Redirect::action('OficiosController@oficialia_recibidos');
		}
}
?>