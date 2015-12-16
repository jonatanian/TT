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
		
		public function nuevaDependenciaSaliente()
		{
			return View::make('oficios.nuevadependencia_saliente');
		}
		
	//Post
	public function registrarDependenciaSaliente()
		{
			$dependencia = new Dependencia();
			$datos = Input::all();
			if($IdDependencia = $dependencia->nuevaDependencia($datos)){
				Session::flash('msg','Nueva dependencia registrada correctamente.');
				return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva dependencia. Intente de nuevo.');
				return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
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
	public function nuevaAreaSaliente()
		{
			$dependencia = Request::get('DependenciaE');
			return View::make('oficios.nuevaarea_saliente',array('dependencia' => $dependencia));
		}
	//Post
	public function registrarAreaSaliente()
		{
			$IdDependencia = Input::get('DependenciaS');
			$area = new DependenciaArea();
			$datos = Input::all();
			if($IdArea = $area->nuevaArea($datos)){
				Session::flash('msg','Nueva área registrada correctamente.');
				return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva área. Intente de nuevo.');
				return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
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
		
		//Get
	public function nuevoEmisorSaliente()
		{
			$dependencia = Request::get('DependenciaE');
			$area = Request::get('AreaE');
			$cargos = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			return View::make('oficios.nuevoemisor_saliente',array('dependencia'=>$dependencia,'area'=>$area,'cargos'=>$cargos));
		}
	//Post	
	public function registrarEmisorSaliente()
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
					return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>$IdEntidadExterna,'CargoEntidadE'=>$IdCargo));
				}
				else{
					Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
					return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
				}
			}
			else{
				if($IdEntidadExterna = $entidad -> nuevaEntidad($datos,$Cargo)){
					$IdCargo = $Cargo;
					Session::flash('msg','Registro de Entidad realizado correctamente.');
					return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>$IdEntidadExterna,'CargoEntidadE'=>$IdCargo));
	        	}else{
	        		Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
					return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
	        	}
	        }
		}
		
	//Get
	public function nuevoCargo()
		{
			$dependencia = Request::get('DependenciaE');
			$area = Request::get('AreaE');
			return View::make('oficios.nuevocargo',array('dependencia'=>$dependencia, 'area'=>$area));
		}
	public function nuevoCargoSaliente()
		{
			$dependencia = Request::get('DependenciaE');
			$area = Request::get('AreaE');
			return View::make('oficios.nuevocargo_saliente',array('dependencia'=>$dependencia, 'area'=>$area));
		}
	//Post
	public function registrarCargo()
		{
			$IdDependencia = Input::get('DependenciaS');
			$IdArea = Input::get('AreaS');
			$datos = Input::all();
			$cargo = new CargoEntidad();
			if($IdCargo = $cargo->nuevoCargoEntidad($datos)){
				Session::flash('msg','Nuevo cargo registrado correctamente.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>NULL,'CargoEntidadE'=>$IdCargo));
			}else{
				Session::flash('msgf','Error al intentar registrar el nuevo cargo. Intente de nuevo.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}
		}
	public function registrarCargoSaliente()
		{
			$IdDependencia = Input::get('DependenciaS');
			$IdArea = Input::get('AreaS');
			$datos = Input::all();
			$cargo = new CargoEntidad();
			if($IdCargo = $cargo->nuevoCargoEntidad($datos)){
				Session::flash('msg','Nuevo cargo registrado correctamente.');
				return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>NULL,'CargoEntidadE'=>$IdCargo));
			}else{
				Session::flash('msgf','Error al intentar registrar el nuevo cargo. Intente de nuevo.');
				return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}
		}
		
	//////////////////////DSBD///////////////////////////////
	public function dsbd_nuevaDependenciaSaliente()
		{
			return View::make('oficios.dsbd_nuevadependencia_saliente');
		}
		
	//Post
	public function dsbd_registrarDependenciaSaliente()
		{
			$dependencia = new Dependencia();
			$datos = Input::all();
			if($IdDependencia = $dependencia->nuevaDependencia($datos)){
				Session::flash('msg','Nueva dependencia registrada correctamente.');
				return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva dependencia. Intente de nuevo.');
				return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}
		}
	
	public function dsbd_nuevoCargoSaliente()
		{
			$dependencia = Request::get('DependenciaE');
			$area = Request::get('AreaE');
			return View::make('oficios.dsbd_nuevocargo_saliente',array('dependencia'=>$dependencia, 'area'=>$area));
		}
	public function dsbd_registrarCargoSaliente()
		{
			$IdDependencia = Input::get('DependenciaS');
			$IdArea = Input::get('AreaS');
			$datos = Input::all();
			$cargo = new CargoEntidad();
			if($IdCargo = $cargo->nuevoCargoEntidad($datos)){
				Session::flash('msg','Nuevo cargo registrado correctamente.');
				return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>NULL,'CargoEntidadE'=>$IdCargo));
			}else{
				Session::flash('msgf','Error al intentar registrar el nuevo cargo. Intente de nuevo.');
				return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}
		}
	public function dsbd_nuevoEmisorSaliente()
		{
			$dependencia = Request::get('DependenciaE');
			$area = Request::get('AreaE');
			$cargos = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			return View::make('oficios.dsbd_nuevoemisor_saliente',array('dependencia'=>$dependencia,'area'=>$area,'cargos'=>$cargos));
		}
	//Post	
	public function dsbd_registrarEmisorSaliente()
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
					return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>$IdEntidadExterna,'CargoEntidadE'=>$IdCargo));
				}
				else{
					Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
					return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
				}
			}
			else{
				if($IdEntidadExterna = $entidad -> nuevaEntidad($datos,$Cargo)){
					$IdCargo = $Cargo;
					Session::flash('msg','Registro de Entidad realizado correctamente.');
					return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>$IdEntidadExterna,'CargoEntidadE'=>$IdCargo));
	        	}else{
	        		Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
					return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
	        	}
	        }
		}
	
	public function dsbd_nuevaAreaSaliente()
		{
			$dependencia = Request::get('DependenciaE');
			return View::make('oficios.dsbd_nuevaarea_saliente',array('dependencia' => $dependencia));
		}
	//Post
	public function dsbd_registrarAreaSaliente()
		{
			$IdDependencia = Input::get('DependenciaS');
			$area = new DependenciaArea();
			$datos = Input::all();
			if($IdArea = $area->nuevaArea($datos)){
				Session::flash('msg','Nueva área registrada correctamente.');
				return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>$IdDependencia,'AreaE'=>$IdArea,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva área. Intente de nuevo.');
				return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio',array('DependenciaE'=>NULL,'AreaE'=>NULL,'EntidadE'=>NULL,'CargoEntidadE'=>NULL));
			}
		}
		///////////////iescmpl//////////////////////////
}
?>