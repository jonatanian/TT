<?php

class InstanciasExternasController extends BaseController {
	//Get		
	public function nuevaDependencia()
		{
			return View::make('oficios.nuevadependencia');
		}
		
	//Post
	public function registrarDependencia()
		{
			$dependencia = new Dependencia();
			$datos = Input::all();
			if($IdDependencia = $dependencia->nuevaDependencia($datos)){
				Session::flash('msg','Nueva dependencia registrada correctamente.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio');
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva dependencia. Intente de nuevo.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio');
			}
		}
}
?>