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
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva dependencia. Intente de nuevo.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}
		}
	
	public function nuevaArea()
		{
			$dependencia = Request::get('DependenciaE');
			return View::make('oficios.nuevaarea',array('dependencia' => $dependencia));
		}
		
	public function registrarArea()
		{
			$IdDependencia = Input::get('DependenciaS');
			$area = new DependenciaArea();
			$datos = Input::all();
			if($IdArea = $area->nuevaArea($datos)){
				Session::flash('msg','Nueva área registrada correctamente.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva área. Intente de nuevo.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}
		}
}
?>