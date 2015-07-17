<?php

class OficiosController extends BaseController {
		
	public function oficialia_Dependencia()
		{
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			return View::make('oficios.oficialia_dependencia',array('dependencias' => $dependencias));
		}
	
	public function oficialia_nuevaDependencia()
		{
			return View::make('oficios.oficialia_nuevadependencia');
		}
		
	
	public function oficialia_regDependencia()
		{
			$dependencia = new Dependencia();
			$datos = Input::all();
			if($IdDependencia = $dependencia->nuevaDependencia($datos)){
				Session::flash('msg','Nueva dependencia registrada correctamente.');
				return Redirect::action('OficiosController@oficialia_Dependencia');
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva dependencia. Intente de nuevo.');
				return Redirect::action('OficiosController@oficialia_Dependencia');
			}
		}
	
	public function oficialia_Dependencia_Area()
		{
			$dependencia = Request::get('iDependencia');
			return Redirect::action('OficiosController@oficialia_Dependencia_Area_2',array('dependencia' => $dependencia));
		}
		
	public function oficialia_Dependencia_Area_2()
		{
			$dependencia = Request::get('dependencia');
			$dep = Dependencia::where('NombreDependencia',$dependencia)->first();
			$areas = DependenciaArea::join('Dependencia_Tiene_Area','IdDependenciaArea','=','Dependencia_Tiene_Area.DepArea_Id')
									->where('Dependencia_Tiene_Area.Dependencia_Id',$dep->IdDependencia)
									->orderBy('Dependencia_Area.NombreDependenciaArea')
									->get();
			return View::make('oficios.oficialia_area',array('dependencia' => $dep,'areas' => $areas));
		}
		
	public function oficialia_nuevaArea($IdDep)
		{
			$areasT = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$dependencia = Dependencia::where('IdDependencia',$IdDep)->first();
			return View::make('oficios.oficialia_nuevaarea',array('dependencia' => $dependencia,'areas' => $areasT));
		}
	
	public function oficialia_regArea($IdDep)
		{
			$nombreDep = Dependencia::select('*')->where('IdDependencia',$IdDep)->first();
			$area = new DependenciaArea();
			$dependenciaTA = new DependenciaTieneArea();
			$datos = Input::all();
			if($IdDependenciaArea = $area->nuevaArea($datos)){
				$IdDepTieneArea = $dependenciaTA -> nuevaDependenciaTieneArea($IdDependenciaArea,$IdDep);
				Session::flash('msg','Nueva área registrada correctamente.');
				return Redirect::action('OficiosController@oficialia_Dependencia_Area_2',array('dependencia'=>$nombreDep->NombreDependencia,'dependencia_id'=>$IdDep,'dep_area_id'=>$IdDependenciaArea));
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva área. Intente de nuevo.');
				return Redirect::action('OficiosController@oficialia_Dependencia_Area_2',array('dependencia'=>$nombreDep->NombreDependencia,'dependencia_id'=>$IdDep,'dep_area_id'=>$IdDependenciaArea));
			}
		}
		
	public function oficialia_Dependencia_Entidad()
	{
		$dependencia = Input::get('Dependencia');
		//$dependencia = Request::get('Dependencia');
		$dependencia_id = Dependencia::where('NombreDependencia',$dependencia)->first();
		$depId = $dependencia_id->IdDependencia;//Request::get('dependencia_id');
		$depAreaId = Input::get('DepArea');
		return Redirect::action('OficiosController@oficialia_Dependencia_Entidad_2',array('dependencia' => $depId,'area'=>$depAreaId));
	}
	
	public function oficialia_Dependencia_Entidad_2()
	{
		$depId = Request::get('dependencia');
		$depAreaId = Request::get('area');
		$dependencia = Dependencia::where('IdDependencia',$depId)->first();
		$area = DependenciaArea::where('IdDependenciaArea',$depAreaId)->first();
		$entidades = EntidadExterna::join('dependencia_area','Dependencia_Area_Id','=','dependencia_area.IdDependenciaArea')
								   ->join('dependencia_tiene_area','dependencia_area.IdDependenciaArea','=','dependencia_tiene_area.DepArea_Id')
								   ->where('dependencia_tiene_area.Dependencia_Id',$depId)
								   ->where('dependencia_tiene_area.DepArea_Id',$depAreaId)
								   ->orderBy('Entidad_Externa.NombreEntidad')
								   ->get();
		return View::make('oficios.oficialia_entidad',array('dependencia'=>$dependencia,'area'=>$area,'entidades'=>$entidades));
	}
	
	public function personal_nuevaentidad()
	{
		$IdArea = Request::get('IdArea');
		$IdDependencia = Request::get('IdDependencia');
		$cargos = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
		$area = DependenciaArea::where('IdDependenciaArea', $IdArea)->first();
		return View::make('oficios.personal_nuevaentidad', array('area'=>$area,'cargos'=>$cargos,'IdDependencia'=>$IdDependencia));
	}
	
	public function oficialia_regEntidad()
	{
		$IdDependencia = Input::get('DependenciaId');
		$dependencia = Dependencia::where('IdDependencia',$IdDependencia)->first();
		$IdArea = Input::get('DepAreaId');
		$area = DependenciaArea::where('IdDependenciaArea',$IdArea)->first();
		$entidad = new EntidadExterna();
		$datos = Input::all();
		$cargoEntidad = Input::get('CargoEntidad');
		if($cargoEntidad != '')
		{
			$cargo = new CargoEntidad();
			if($IdCargo = $cargo -> nuevoCargoEntidad($datos)){
				$IdEntidadExterna = $entidad -> nuevaEntidad($datos,$IdCargo);
				Session::flash('msg','Registro de Entidad realizado correctamente.');
				return Redirect::action('OficiosController@oficialia_Dependencia_Entidad_2',array('dependencia'=>$dependencia->IdDependencia,'area'=>$IdArea));
			}
			else{
				Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
				return Redirect::action('OficiosController@oficialia_Dependencia_Entidad_2',array('dependencia'=>$dependencia->IdDependencia,'area'=>$IdArea));
			}
		}
		else{
			if($IdEntidadExterna = $entidad -> nuevaEntidad($datos,$cargoEntidad)){
				Session::flash('msg','Registro de Entidad realizado correctamente.');
				return Redirect::action('OficiosController@oficialia_Dependencia_Entidad_2',array('dependencia'=>$dependencia->IdDependencia,'area'=>$IdArea));
        	}else{
        		Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
				return Redirect::action('OficiosController@oficialia_Dependencia_Entidad_2',array('dependencia'=>$dependencia->IdDependencia,'area'=>$IdArea));
        	}
        }

	}
	
	public function oficialia_seleccionar_tipo_oficio()
	{
		$IdDependencia = Input::get('DependenciaId');
		$IdArea = Input::get('AreaId');
		$IdEntidad = Input::get('DepEntidad');
		return Redirect::action('OficiosController@oficialia_seleccionar_tipo_oficio_2',array('DependenciaId'=>$IdDependencia,'AreaId'=>$IdArea,'EntidadId'=>$IdEntidad));
	}
	
	public function oficialia_seleccionar_tipo_oficio_2()
	{
		$IdDependencia = Request::get('DependenciaId');
		$Dependencia = Dependencia::where('IdDependencia',$IdDependencia)->first();
		$IdArea = Request::get('AreaId');
		$Area = DependenciaArea::where('IdDependenciaArea',$IdArea)->first();
		$IdEntidad = Request::get('EntidadId');
		$Entidad = EntidadExterna::where('IdEntidadExterna',$IdEntidad)->first();
		return View::make('oficios.oficialia_seleccionar_tipo_oficio',array('dependencia'=>$Dependencia,'area'=>$Area,'entidad'=>$Entidad));
	}
	
	public function oficialia_seleccion_tipo_oficio()
	{
		$TipoOficio = Input::get('TipoOficio');
		$IdDependencia = Input::get('DependenciaId');
		$IdArea = Input::get('AreaId');
		$IdEntidad = Input::get('EntidadId');
		if($TipoOficio == 1){
			return Redirect::action('OficiosController@oficialia_nuevo_entrante',array('DependenciaId'=>$IdDependencia,'AreaId'=>$IdArea,'EntidadId'=>$IdEntidad,'TipoOficio'=>$TipoOficio));
		}
		else{
			return Redirect::action('OficiosController@oficialia_nuevo_saliente',array('DependenciaId'=>$IdDependencia,'AreaId'=>$IdArea,'EntidadId'=>$IdEntidad,'TipoOficio'=>$TipoOficio));
		}
	}
	
	public function oficialia_nuevo_entrante()
	{
		$TipoOficio = Request::get('TipoOficio');
		$IdDependencia = Request::get('DependenciaId');
		$Dependencia = Dependencia::where('IdDependencia',$IdDependencia)->first();
		$IdArea = Request::get('AreaId');
		$Area = DependenciaArea::where('IdDependenciaArea',$IdArea)->first();
		$IdEntidad = Request::get('EntidadId');
		$Entidad = EntidadExterna::join('cargo_entidad','DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
								 ->where('IdEntidadExterna',$IdEntidad)->first();
		$usuarios = User::select('*')->orderBy('ApPaterno')->get();
		$prioridad = Prioridad::lists('NombrePrioridad','IdPrioridad');
		$caracteres = Caracter::lists('NombreCaracter','IdCaracter');
		return View::make('oficios.oficialia_nuevooficio_entrante',array('dependencia'=>$Dependencia,'area'=>$Area,'entidad'=>$Entidad,'usuarios' => $usuarios,'prioridad' => $prioridad,'caracteres'=>$caracteres,'TipoOficio'=>$TipoOficio));
	}
		
	public function oficialia_registrar_oficio_entrante()
		{
			$CorrespondenciaEntrante = new Correspondencia();	
			$Oficio = new OficioEntrante();
			$Datos = Input::all();
			$TipoOficio = Input::get('TipoOficio');
			$TieneAnexos = Input::get('TieneAnexos');
			if($IdOficio = $CorrespondenciaEntrante -> nuevaCorrespondenciaEntrante($Datos)){
				$IdOficioE = $Oficio -> nuevoOficioEntrante($Datos,$IdOficio);
				if($TieneAnexos = true){
					Session::flash('msg','Registro de oficio entrante realizado correctamente.');
	        		return Redirect::action('OficiosController@personal_registrar_nuevo_anexo',array('TipoOficio'=>$TipoOficio,'IdOficioEoS'=>$IdOficioE));
				}
				else{
					Session::flash('msg','Registro de oficio entrante realizado correctamente.');
					return Redirect::action('OficiosController@oficialia_recibidos');
				}
        	}else{
        		Session::flash('msgf','Error: No se pudo registrar el oficio entrante.');
        		return Redirect::action('OficiosController@oficialia_recibidos');
        	}
		}
		
	public function oficialia_recibidos()
		{
			$oficios= OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('dependencia','Dependencia_Id','=','Dependencia.IdDependencia')
									->get();
			return View::make('oficios.oficialia_recibidos',array('oficios'=>$oficios));
		}

	public function oficialia_recibidos_buscar()
		{
			$opcion = Input::get('opcion');
			switch ($opcion) {
				/*case 1:
						 $Prioridad = OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
						 ->join('prioridad','Prioridad_Id','=','PrioridadIdPrioridad')
						 ->orderBy('NombrePrioridad')
						 ->get();
						 return View::make('oficios.oficialia_recibidos',array('oficios'=>$Prioridad));
					break;*/
				case 2:
						 $Estatus = OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
						 ->join('estatus','Estatus_Id','=','Estatus.IdEstatus')
						 ->orderBy('NombreEstatus')
						 ->get();
						 return View::make('oficios.oficialia_recibidos',array('oficios'=>$Estatus));
					break;
                case 3:
                		$Dependencia = OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
							->join('dependencia','Dependencia_Id','=','Dependencia.IdDependencia')
							->orderBy('AcronimoDependencia')
							->get();
							return View::make('oficios.oficialia_recibidos',array('oficios'=>$Dependencia));
					break;
	                   
	        }

		}

///////////////////////////////FUNCIONES DE OFICIOS PARA OTROS USUARIOS ///////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	public function personal_registrar_nuevo_anexo()
	{
		$TipoOficio = Request::get('TipoOficio');
		$IdOficioEoS = Request::get('IdOficioEoS');
		if($TipoOficio == 1)
		{
			$OficioEntrante = OficioEntrante::join('correspondencia','Correspondencia_Id','=','correspondencia.IdCorrespondencia')
											->join('dependencia','Dependencia_Id','=','dependencia.IdDependencia')
											->where('IdOficioEntrante',$IdOficioEoS)->first();
			return View::make('oficios.personal_nuevoanexo',array('TipoOficio'=>$TipoOficio,'OficioEntrante'=>$OficioEntrante));
		}
		elseif($TipoOficio == 2)
		{
			
			$OficioSaliente = OficioSaliente::join('correspondencia','Correspondencia_Id','=','correspondencia.IdCorrespondencia')
											->join('dependencia','Dependencia_Id','=','dependencia.IdDependencia')
											->where('IdConsecutivo',$IdOficioEoS)->first();
			return View::make('oficios.personal_nuevoanexo',array('TipoOficio'=>$TipoOficio,'OficioSaliente'=>$OficioSaliente));
		}
		else
		{
			$OficioSaliente = OficioSaliente::select('*')->where('IdConsecutivo',$IdOficioEoS)->first();
			return View::make('oficios.personal_nuevoanexo',array('TipoOficio'=>$TipoOficio,'OficioEntrante'=>$OficioSaliente));
		}
	}
		
		////////////////////////////Oficios Salientes////////////////////////////////

	public function oficialia_enviados()
		{
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Dependencia_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_enviados', array('oficios' => $oficios));
		}
		
		
	public function oficialia_nuevo_saliente()
	{
		$IdDependencia = Request::get('DependenciaId');
		$TipoOficio = Request::get('TipoOficio');
		$Dependencia = Dependencia::where('IdDependencia',$IdDependencia)->first();
		$IdArea = Request::get('AreaId');
		$Area = DependenciaArea::where('IdDependenciaArea',$IdArea)->first();
		$IdEntidad = Request::get('EntidadId');
		$Entidad = EntidadExterna::join('cargo_entidad','DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
								 ->where('IdEntidadExterna',$IdEntidad)->first();
		$usuarios = User::select('*')->orderBy('ApPaterno')->get();
		$caracteres = Caracter::lists('NombreCaracter','IdCaracter');
		$prioridad = Prioridad::lists('NombrePrioridad','IdPrioridad');
		return View::make('oficios.oficialia_nuevooficio_saliente',array('dependencia'=>$Dependencia,'area'=>$Area,'entidad'=>$Entidad,'usuarios' => $usuarios,'prioridad' => $prioridad, 'caracteres'=>$caracteres, 'TipoOficio'=>$TipoOficio));
	}
	
	public function personal_nuevo_saliente()
	{
		$IdDependencia = Request::get('DependenciaId');
		$TipoOficio = Request::get('TipoOficio');
		$Dependencia = Dependencia::where('IdDependencia',$IdDependencia)->first();
		$IdArea = Request::get('AreaId');
		$Area = DependenciaArea::where('IdDependenciaArea',$IdArea)->first();
		$IdEntidad = Request::get('EntidadId');
		$Entidad = EntidadExterna::join('cargo_entidad','DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
								 ->where('IdEntidadExterna',$IdEntidad)->first();
		$usuarios = User::select('*')->orderBy('ApPaterno')->get();
		$caracteres = Caracter::lists('NombreCaracter','IdCaracter');
		$prioridad = Prioridad::lists('NombrePrioridad','IdPrioridad');
		return View::make('oficios.oficialia_nuevooficio_saliente',array('dependencia'=>$Dependencia,'area'=>$Area,'entidad'=>$Entidad,'usuarios' => $usuarios,'prioridad' => $prioridad, 'caracteres'=>$caracteres, 'TipoOficio'=>$TipoOficio));
	}
	
	public function personal_Dependencia()
		{
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			return View::make('oficios.personal_dependencia_saliente',array('dependencias' => $dependencias));
		}
		
	public function personal_regDependencia()
		{
			$dependencia = new Dependencia();
			$datos = Input::all();
			if($IdDependencia = $dependencia->nuevaDependencia($datos)){
				Session::flash('msg','Nueva dependencia registrada correctamente.');
				return Redirect::action('OficiosController@personal_Dependencia');
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva dependencia. Intente de nuevo.');
				return Redirect::action('OficiosController@personal_Dependencia');
			}
		}
	public function personal_Dependencia_Area()
		{
			$dependencia = Request::get('iDependencia');
			return Redirect::action('OficiosController@personal_Dependencia_Area_2',array('dependencia' => $dependencia));
		}
	public function personal_Dependencia_Area_2()
		{
			$dependencia = Request::get('dependencia');
			$dep = Dependencia::where('NombreDependencia',$dependencia)->first();
			$areas = DependenciaArea::join('Dependencia_Tiene_Area','IdDependenciaArea','=','Dependencia_Tiene_Area.DepArea_Id')
									->where('Dependencia_Tiene_Area.Dependencia_Id',$dep->IdDependencia)
									->orderBy('Dependencia_Area.NombreDependenciaArea')
									->get();
			return View::make('oficios.personal_area_saliente',array('dependencia' => $dep,'areas' => $areas));
		}
		
	public function personal_regArea($IdDep)
		{
			$nombreDep = Dependencia::select('*')->where('IdDependencia',$IdDep)->first();
			$area = new DependenciaArea();
			$dependenciaTA = new DependenciaTieneArea();
			$datos = Input::all();
			if($IdDependenciaArea = $area->nuevaArea($datos)){
				$IdDepTieneArea = $dependenciaTA -> nuevaDependenciaTieneArea($IdDependenciaArea,$IdDep);
				Session::flash('msg','Nueva área registrada correctamente.');
				return Redirect::action('OficiosController@personal_Dependencia_Area_2',array('dependencia'=>$nombreDep->NombreDependencia,'dependencia_id'=>$IdDep,'dep_area_id'=>$IdDependenciaArea));
			}else{
				Session::flash('msgf','Error al intentar registrar la nueva área. Intente de nuevo.');
				return Redirect::action('OficiosController@personal_Dependencia_Area_2',array('dependencia'=>$nombreDep->NombreDependencia,'dependencia_id'=>$IdDep,'dep_area_id'=>$IdDependenciaArea));
			}
		}
		
	public function personal_Dependencia_Entidad()
	{
		$dependencia = Input::get('Dependencia');
		//$dependencia = Request::get('Dependencia');
		$dependencia_id = Dependencia::where('NombreDependencia',$dependencia)->first();
		$depId = $dependencia_id->IdDependencia;//Request::get('dependencia_id');
		$depAreaId = Input::get('DepArea');
		return Redirect::action('OficiosController@personal_Dependencia_Entidad_2',array('dependencia' => $depId,'area'=>$depAreaId));
	}
	
	public function personal_Dependencia_Entidad_2()
	{
		$depId = Request::get('dependencia');
		$depAreaId = Request::get('area');
		$dependencia = Dependencia::where('IdDependencia',$depId)->first();
		$area = DependenciaArea::where('IdDependenciaArea',$depAreaId)->first();
		$entidades = EntidadExterna::join('dependencia_area','Dependencia_Area_Id','=','dependencia_area.IdDependenciaArea')
								   ->join('dependencia_tiene_area','dependencia_area.IdDependenciaArea','=','dependencia_tiene_area.DepArea_Id')
								   ->where('dependencia_tiene_area.Dependencia_Id',$depId)
								   ->where('dependencia_tiene_area.DepArea_Id',$depAreaId)
								   ->orderBy('Entidad_Externa.NombreEntidad')
								   ->get();
		return View::make('oficios.personal_entidad_saliente',array('dependencia'=>$dependencia,'area'=>$area,'entidades'=>$entidades));
		
	}
	
	public function personal_regEntidad()
	{
		$IdDependencia = Input::get('DependenciaId');
		$dependencia = Dependencia::where('IdDependencia',$IdDependencia)->first();
		$IdArea = Input::get('DepAreaId');
		$area = DependenciaArea::where('IdDependenciaArea',$IdArea)->first();
		$entidad = new EntidadExterna();
		$datos = Input::all();
		$cargoEntidad = Input::get('CargoEntidad');
		if($cargoEntidad != '')
		{
			$cargo = new CargoEntidad();
			if($IdCargo = $cargo -> nuevoCargoEntidad($datos)){
				$IdEntidadExterna = $entidad -> nuevaEntidad($datos,$IdCargo);
				Session::flash('msg','Registro de Entidad realizado correctamente.');
				return Redirect::action('OficiosController@personal_Dependencia_Entidad_2',array('dependencia'=>$dependencia->IdDependencia,'area'=>$IdArea));
			}
			else{
				Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
				return Redirect::action('OficiosController@personal_Dependencia_Entidad_2',array('dependencia'=>$dependencia->IdDependencia,'area'=>$IdArea));
			}
		}
		else{
			if($IdEntidadExterna = $entidad -> nuevaEntidad($datos,$cargoEntidad)){
				Session::flash('msg','Registro de Entidad realizado correctamente.');
				return Redirect::action('OficiosController@personal_Dependencia_Entidad_2',array('dependencia'=>$dependencia->IdDependencia,'area'=>$IdArea));
        	}else{
        		Session::flash('msgf','Error al intentar registrar la nueva Entidad. Intente de nuevo.');
				return Redirect::action('OficiosController@personal_Dependencia_Entidad_2',array('dependencia'=>$dependencia->IdDependencia,'area'=>$IdArea));
        	}
        }

	}
	///////////////Validacion de los oficios///////////////////
	public function oficialia_oficios_por_validar()
		{
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Dependencia_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_validaroficio_saliente', array('oficios' => $oficios));
		}
	public function oficialia_validar_oficio_saliente()
		{
			$id = Input::get('id');
			
			$oficios = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','DirigidoA_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','DirigidoA_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_validaroficio_observaciones', array('oficio' => $oficio, 'id' => $id, 'oficios' => $oficios));
		}
	
	//Vista para registrar anexos 	
	public function personal_agregar_anexo()
		{
			$id = Input::get('id');
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','DirigidoA_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.personal_agregar_anexos', array('oficio' => $oficio, 'id' => $id, 'oficios' => $oficios));
		}
		
	public function oficialia_subir_acuse()
		{
			return View::make('oficios.oficialia_subir_acuse');
		}
		
	public function personal_registrar_anexos()
		{
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Dependencia_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.personal_registrar_anexos', array('oficios'=>$oficios));
		}
		
	public function corregir_oficio()
		{
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Dependencia_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.personal_corregiroficio_saliente', array('oficios'=>$oficios));
		}
	//Funcion para registrar oficio saliente
	public function oficialia_registrar_oficio_saliente()
		{
			//////////////
			$TipoOficio = 2;//Request::get('TipoOficio');
			$DependenciaId = Request::get('IdDependenciaAEnviar');
			$AreaId = Request::get('IdAreaAEnviar');
			$EntidadId = Request::get('IdEntidad');
			$CargoId = Request::get('IdCargoEntidad');
			$FechaEmision = Request::get('FechaEmision');
			$FechaEntrega = Request::get('FechaEntrega');
			$Asunto = Request::get('Asunto');
			$Prioridad = Request::get('Prioridad');
			$Caracter = Request::get('Caracter');
			//$FechaLimiteR = Request::get('FechaLimiteR');
			//$EnRespuestaA = Request::get('EnRespuestaA');
			$TieneAnexos = Request::get('TieneAnexos');
			$RequiereRespuesta = false;
			/*if($FechaLimiteR)
			{
				$RequiereRespuesta = true;
			}
			*/

			$correspondencia= new Correspondencia();
			$oficio = new OficioSaliente();
			$oficios = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Dependencia_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			$id = $correspondencia->nuevaCorrespondencia(array('FechaEmision'=>$FechaEmision, 'FechaEntrega'=>$FechaEntrega, 'Asunto'=>$Asunto, 'RequiereRespuesta'=>$RequiereRespuesta, 'Estatus_Id'=>1, 'Prioridad_Id'=>$Prioridad, 'Caracter_Id'=>$Caracter));
			if($id){//Primero registra correspondencia
				$IdOficioSaliente = $oficio->nuevoOficioSaliente(array('Correspondencia_Id'=>$id, 'Usuario_Id'=>Auth::id(), 'Dependencia_Id'=>$DependenciaId));//Registra oficio saliente
				Session::flash('msg','Registro de oficio saliente realizado correctamente.');
				if($TieneAnexos == true)
				{
					Session::flash('msg','Registro de oficio saliente realizado correctamente.');
					return Redirect::action('OficiosController@personal_registrar_nuevo_anexo',array('TipoOficio'=>$TipoOficio,'IdOficioEoS'=>$IdOficioSaliente));
				}
				else
				{
					return View::make('oficios.oficialia_enviados', array('oficios' => $oficios, 'prioridad'=>$Prioridad));
				}	
			}else{
				Session::flash('msgf','Error: No se pudo registrar el oficio saliente.');
				return View::make('oficios.oficialia_enviados');
			}
		}

	//funciones para consulta
		public function oficios_por_numero ()
		{

			$oficios= OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Entidad_Externa_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_recibidos',array('oficios'=>$oficios));
		}

		public function oficios_por_fecha ()
		{
			$oficios= OficioEntrante::join('correspondencia','FechaEntrega','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Entidad_Externa_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_recibidos',array('oficios'=>$oficios));
		}

		public function oficios_por_institucion ()
		{

		}
		
}
?>