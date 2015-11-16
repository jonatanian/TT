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
	//Get
	public function nuevaArea()
		{
			$dependencia = Request::get('DependenciaE');
			return View::make('oficios.nuevaarea',array('dependencia' => $dependencia));
		}
	//Post
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
	//Get
	public function nuevoEmisor()
		{
			$dependencia = Request::get('DependenciaE');
			$area = Request::get('AreaE');
			$cargos = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			return View::make('oficios.nuevoemisor',array('dependencia'=>$dependencia,'area'=>$area,'cargos'=>$cargos));
		}
	//Post	
	public function registrarEmisor()
		{
			$IdDependencia = Input::get('DependenciaS');
			$IdArea = Input::get('AreaS');
			$entidad = new EntidadExterna();
			$datos = Input::all();
			$Cargo = Input::get('CargoEntidadR');
			$cargoEntidad = Input::get('CargoEntidad');
			if($cargoEntidad != NULL)
			{
				$cargo = new CargoEntidad();
				if($IdCargo = $cargo -> nuevoCargoEntidad($datos)){
					$IdEntidadExterna = $entidad -> nuevaEntidad($datos,$IdCargo);
					Session::flash('msg','Registro de Entidad realizado correctamente.');
					return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>$IdEntidadExterna,'CargoEntidadE'=>$IdCargo));
				}
				else{
					Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
					return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
				}
			}
			else{
				if($IdEntidadExterna = $entidad -> nuevaEntidad($datos,$Cargo)){
					$IdCargo = $Cargo;
					Session::flash('msg','Registro de Entidad realizado correctamente.');
					return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>$IdEntidadExterna,'CargoEntidadE'=>$IdCargo));
	        	}else{
	        		Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
					return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
	        	}
	        }
		}
}
?>