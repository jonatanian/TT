<?php

class OficiosSalientesController extends BaseController {
			
			
	///////////////////////Oficialia///////////////////////////////
	public function oficialia_nuevoOficio()
		{
			$of = new OficioSaliente();
			$idOficio = $of->getIdOficio();
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			$dep_areas = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$entidades_externas = EntidadExterna::select('*')->orderBy('ApPaternoEntidad')->get();
			$cargos_entidades = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			$usuarios = Usuario::select('*')->orderBy('ApPaterno')->get();
			$oficiosEntrantes = OficioEntrante::select('*')->orderBy('IdOficioDependencia')->get();
			$caracteres = Caracter::all();
			$prioridades = Prioridad::all();
			$dep = Request::get('DependenciaE');
			$a = Request::get('AreaE');
			$e = Request::get('EntidadE');
			$ce = Request::get('CargoEntidadE');
			return View::make('oficios.oficialia_salientes_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce,'OEs'=>$oficiosEntrantes,'idOficio' => $idOficio,'prioridades'=>$prioridades,'caracteres'=>$caracteres));
		}
		
	public function oficialia_nuevoOficio_registrar()
		{
			
			Input::flashOnly('IdOficio','DirigidoA','FechaEmision','FechaRecepcion','Asunto','IdOficioR','FechaLimiteR');
			
			$file = Input::file('DocPDF');
			if($file == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio')->withInput();
			}

			$url_docpdf = Hash::make($file->getClientOriginalName());
			$destinoPath = public_path().'\\oficios\\entrantes\\';
			$subir = $file->move($destinoPath,$url_docpdf.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$subir)){
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Destinatario = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Destinatario->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upDestinatario = $Destinatario->updateCargoSaliente($datos);			
				}
				
				if($Destinatario->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Destinatario->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Destinatario->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Destinatario->Dependencia_Area_Id);
					}
					if($DepTieneArea->Dependencia_Id != $datos['DependenciaE']){
						$UpDTA = $DepTieneArea->updateDependenciaSaliente($datos,$DepTieneArea->IdDependenciaTieneArea);
					}
				}
				
				//$fecha = new DateTime();
				//$UTC = new UsuarioTurnaCorrespondencia();
				//$IdUTC = $UTC->turnarA(Auth::User()->IdUsuario,$IdCorrespondencia,$datos['DirigidoA'],1,$fecha);
				
				Session::flash('msg','Registro de oficio saliente realizado correctamente.');
				return Redirect::action('OficiosController@oficialia_salientes');
			}	
			else{
				Session::flash('msgf','Error al registrar nuevo oficio saliente.');
				return Redirect::action('OficiosController@oficialia_salientes');
			}
		}
		
	public function oficialia_consultaDependencia()
	{
		$dependencia = Request::get('dependenciaFiltro');
		$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->orderBy('oficio_saliente.IdOficioSaliente','desc')->where('IdDependencia','=',$dependencia)
									->get();;
			$dependencias = Dependencia::all();
			$estatus = Estatus::all();
			
			return View::make('oficios.oficialia_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
	}
	
	public function oficialia_consultaEstatus()
	{
		$estatus = Request::get('estatusFiltro');
		$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->orderBy('oficio_saliente.IdOficioSaliente','desc')->where('Estatus_Id','=',$estatus)
									->get();;
			$dependencias = Dependencia::all();
			$estatus = Estatus::all();
			
			return View::make('oficios.oficialia_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
	}
	public function oficialia_consultaId()
	{
		$id = Request::get('idFiltro');
		$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->orderBy('oficio_saliente.IdOficioSaliente','desc')->where('IdOficioSaliente','=',$id)
									->get();;
			$dependencias = Dependencia::all();
			$estatus = Estatus::all();
			
			return View::make('oficios.oficialia_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
	}
		
	///////////////////////DSBD////////////////////////////////////////
	public function dsbd_nuevoOficio()
		{
			$of = new OficioSaliente();
			$idOficio = $of->getIdOficio();
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			$dep_areas = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$entidades_externas = EntidadExterna::select('*')->orderBy('ApPaternoEntidad')->get();
			$cargos_entidades = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			$usuarios = Usuario::select('*')->orderBy('ApPaterno')->get();
			$oficiosEntrantes = OficioEntrante::select('*')->orderBy('IdOficioDependencia')->get();
			$caracteres = Caracter::all();
			$prioridades = Prioridad::all();
			$dep = Request::get('DependenciaE');
			$a = Request::get('AreaE');
			$e = Request::get('EntidadE');
			$ce = Request::get('CargoEntidadE');
			return View::make('oficios.dsbd_salientes_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce,'OEs'=>$oficiosEntrantes,'idOficio' => $idOficio,'prioridades'=>$prioridades,'caracteres'=>$caracteres));
		}
		
	public function dsbd_nuevoOficio_registrar()
		{
			
			Input::flashOnly('IdOficio','DirigidoA','FechaEmision','FechaRecepcion','Asunto','IdOficioR','FechaLimiteR');
			
			$file = Input::file('DocPDF');
			if($file == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@dsbd_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@dsbd_nuevoOficio')->withInput();
			}

			$url_docpdf = Hash::make($file->getClientOriginalName());
			$destinoPath = public_path().'\\oficios\\entrantes\\';
			$subir = $file->move($destinoPath,$url_docpdf.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$subir)){
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Destinatario = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Destinatario->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upDestinatario = $Destinatario->updateCargoSaliente($datos);			
				}
				
				if($Destinatario->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Destinatario->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Destinatario->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Destinatario->Dependencia_Area_Id);
					}
					if($DepTieneArea->Dependencia_Id != $datos['DependenciaE']){
						$UpDTA = $DepTieneArea->updateDependencia($datos,$DepTieneArea->IdDependenciaTieneArea);
					}
				}
				
				//$fecha = new DateTime();
				//$UTC = new UsuarioTurnaCorrespondencia();
				//$IdUTC = $UTC->turnarA(Auth::User()->IdUsuario,$IdCorrespondencia,$datos['DirigidoA'],1,$fecha);
				
				Session::flash('msg','Registro de oficio saliente realizado correctamente.');
				return Redirect::action('OficiosController@dsbd_salientes');
			}	
			else{
				Session::flash('msgf','Error al registrar nuevo oficio saliente.');
				return Redirect::action('OficiosController@dsbd_salientes');
			}
		}
		
		///////////////////Director////////////////////////
		public function direccion_nuevoOficio()
		{
			$of = new OficioSaliente();
			$idOficio = $of->getIdOficio();
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			$dep_areas = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$entidades_externas = EntidadExterna::select('*')->orderBy('ApPaternoEntidad')->get();
			$cargos_entidades = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			$usuarios = Usuario::select('*')->orderBy('ApPaterno')->get();
			$oficiosEntrantes = OficioEntrante::select('*')->orderBy('IdOficioDependencia')->get();
			$caracteres = Caracter::all();
			$prioridades = Prioridad::all();
			$dep = Request::get('DependenciaE');
			$a = Request::get('AreaE');
			$e = Request::get('EntidadE');
			$ce = Request::get('CargoEntidadE');
			return View::make('oficios.direccion_salientes_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce,'OEs'=>$oficiosEntrantes,'idOficio' => $idOficio,'prioridades'=>$prioridades,'caracteres'=>$caracteres));
		}
		
	public function direccion_nuevoOficio_registrar()
		{
			
			Input::flashOnly('IdOficio','DirigidoA','FechaEmision','FechaRecepcion','Asunto','IdOficioR','FechaLimiteR');
			
			$file = Input::file('DocPDF');
			if($file == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@direccion_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@direccion_nuevoOficio')->withInput();
			}

			$url_docpdf = Hash::make($file->getClientOriginalName());
			$destinoPath = public_path().'\\oficios\\entrantes\\';
			$subir = $file->move($destinoPath,$url_docpdf.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$subir)){
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Destinatario = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Destinatario->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upDestinatario = $Destinatario->updateCargoSaliente($datos);			
				}
				
				if($Destinatario->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Destinatario->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Destinatario->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Destinatario->Dependencia_Area_Id);
					}
					if($DepTieneArea->Dependencia_Id != $datos['DependenciaE']){
						$UpDTA = $DepTieneArea->updateDependencia($datos,$DepTieneArea->IdDependenciaTieneArea);
					}
				}
				
				//$fecha = new DateTime();
				//$UTC = new UsuarioTurnaCorrespondencia();
				//$IdUTC = $UTC->turnarA(Auth::User()->IdUsuario,$IdCorrespondencia,$datos['DirigidoA'],1,$fecha);
				
				Session::flash('msg','Registro de oficio saliente realizado correctamente.');
				return Redirect::action('OficiosController@direccion_salientes');
			}	
			else{
				Session::flash('msgf','Error al registrar nuevo oficio saliente.');
				return Redirect::action('OficiosController@direccion_salientes');
			}
		}
		
		//////////////////////////////Subdirección////////////////////////////
		
		public function subdireccion_nuevoOficio()
		{
			$of = new OficioSaliente();
			$idOficio = $of->getIdOficio();
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			$dep_areas = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$entidades_externas = EntidadExterna::select('*')->orderBy('ApPaternoEntidad')->get();
			$cargos_entidades = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			$usuarios = Usuario::select('*')->orderBy('ApPaterno')->get();
			$oficiosEntrantes = OficioEntrante::select('*')->orderBy('IdOficioDependencia')->get();
			$caracteres = Caracter::all();
			$prioridades = Prioridad::all();
			$dep = Request::get('DependenciaE');
			$a = Request::get('AreaE');
			$e = Request::get('EntidadE');
			$ce = Request::get('CargoEntidadE');
			return View::make('oficios.subdireccion_salientes_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce,'OEs'=>$oficiosEntrantes,'idOficio' => $idOficio,'prioridades'=>$prioridades,'caracteres'=>$caracteres));
		}
		
	public function subdireccion_nuevoOficio_registrar()
		{
			
			Input::flashOnly('IdOficio','DirigidoA','FechaEmision','FechaRecepcion','Asunto','IdOficioR','FechaLimiteR');
			
			$file = Input::file('DocPDF');
			if($file == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@subdireccion_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@subdireccion_nuevoOficio')->withInput();
			}

			$url_docpdf = Hash::make($file->getClientOriginalName());
			$destinoPath = public_path().'\\oficios\\entrantes\\';
			$subir = $file->move($destinoPath,$url_docpdf.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$subir)){
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Destinatario = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Destinatario->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upDestinatario = $Destinatario->updateCargoSaliente($datos);			
				}
				
				if($Destinatario->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Destinatario->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Destinatario->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Destinatario->Dependencia_Area_Id);
					}
					if($DepTieneArea->Dependencia_Id != $datos['DependenciaE']){
						$UpDTA = $DepTieneArea->updateDependencia($datos,$DepTieneArea->IdDependenciaTieneArea);
					}
				}
				
				//$fecha = new DateTime();
				//$UTC = new UsuarioTurnaCorrespondencia();
				//$IdUTC = $UTC->turnarA(Auth::User()->IdUsuario,$IdCorrespondencia,$datos['DirigidoA'],1,$fecha);
				
				Session::flash('msg','Registro de oficio saliente realizado correctamente.');
				return Redirect::action('OficiosController@subdireccion_salientes');
			}	
			else{
				Session::flash('msgf','Error al registrar nuevo oficio saliente.');
				return Redirect::action('OficiosController@subdireccion_salientes');
			}
		}
		
		///////////////////////Jefe de departamento//////////////////////////
		
		public function jefatura_nuevoOficio()
		{
			$of = new OficioSaliente();
			$idOficio = $of->getIdOficio();
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			$dep_areas = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$entidades_externas = EntidadExterna::select('*')->orderBy('ApPaternoEntidad')->get();
			$cargos_entidades = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			$usuarios = Usuario::select('*')->orderBy('ApPaterno')->get();
			$oficiosEntrantes = OficioEntrante::select('*')->orderBy('IdOficioDependencia')->get();
			$caracteres = Caracter::all();
			$prioridades = Prioridad::all();
			$dep = Request::get('DependenciaE');
			$a = Request::get('AreaE');
			$e = Request::get('EntidadE');
			$ce = Request::get('CargoEntidadE');
			return View::make('oficios.jefatura_salientes_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce,'OEs'=>$oficiosEntrantes,'idOficio' => $idOficio,'prioridades'=>$prioridades,'caracteres'=>$caracteres));
		}
		
	public function jefatura_nuevoOficio_registrar()
		{
			
			Input::flashOnly('IdOficio','DirigidoA','FechaEmision','FechaRecepcion','Asunto','IdOficioR','FechaLimiteR');
			
			$file = Input::file('DocPDF');
			if($file == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@jefatura_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@jefatura_nuevoOficio')->withInput();
			}

			$url_docpdf = Hash::make($file->getClientOriginalName());
			$destinoPath = public_path().'\\oficios\\entrantes\\';
			$subir = $file->move($destinoPath,$url_docpdf.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$subir)){
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Destinatario = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Destinatario->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upDestinatario = $Destinatario->updateCargoSaliente($datos);			
				}
				
				if($Destinatario->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Destinatario->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Destinatario->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Destinatario->Dependencia_Area_Id);
					}
					if($DepTieneArea->Dependencia_Id != $datos['DependenciaE']){
						$UpDTA = $DepTieneArea->updateDependencia($datos,$DepTieneArea->IdDependenciaTieneArea);
					}
				}
				
				//$fecha = new DateTime();
				//$UTC = new UsuarioTurnaCorrespondencia();
				//$IdUTC = $UTC->turnarA(Auth::User()->IdUsuario,$IdCorrespondencia,$datos['DirigidoA'],1,$fecha);
				
				Session::flash('msg','Registro de oficio saliente realizado correctamente.');
				return Redirect::action('OficiosController@jefatura_salientes');
			}	
			else{
				Session::flash('msgf','Error al registrar nuevo oficio saliente.');
				return Redirect::action('OficiosController@jefatura_salientes');
			}
		}
		
		/////////////////////Personal CMPL////////////////////////////////
		public function personal_nuevoOficio()
		{
			$of = new OficioSaliente();
			$idOficio = $of->getIdOficio();
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			$dep_areas = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$entidades_externas = EntidadExterna::select('*')->orderBy('ApPaternoEntidad')->get();
			$cargos_entidades = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			$usuarios = Usuario::select('*')->orderBy('ApPaterno')->get();
			$oficiosEntrantes = OficioEntrante::select('*')->orderBy('IdOficioDependencia')->get();
			$caracteres = Caracter::all();
			$prioridades = Prioridad::all();
			$dep = Request::get('DependenciaE');
			$a = Request::get('AreaE');
			$e = Request::get('EntidadE');
			$ce = Request::get('CargoEntidadE');
			return View::make('oficios.personal_salientes_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce,'OEs'=>$oficiosEntrantes,'idOficio' => $idOficio,'prioridades'=>$prioridades,'caracteres'=>$caracteres));
		}
		
	public function iescmpl_nuevoOficio_registrar()
		{
			
			Input::flashOnly('IdOficio','DirigidoA','FechaEmision','FechaRecepcion','Asunto','IdOficioR','FechaLimiteR');
			
			$file = Input::file('DocPDF');
			if($file == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@iescmpl_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@iescmpl_nuevoOficio')->withInput();
			}

			$url_docpdf = Hash::make($file->getClientOriginalName());
			$destinoPath = public_path().'\\oficios\\entrantes\\';
			$subir = $file->move($destinoPath,$url_docpdf.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$subir)){
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Destinatario = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Destinatario->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upDestinatario = $Destinatario->updateCargoSaliente($datos);			
				}
				
				if($Destinatario->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Destinatario->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Destinatario->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaD']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Destinatario->Dependencia_Area_Id);
					}
					if($DepTieneArea->Dependencia_Id != $datos['DependenciaD']){
						$UpDTA = $DepTieneArea->updateDependencia($datos,$DepTieneArea->IdDependenciaTieneArea);
					}
				}
				
				//$fecha = new DateTime();
				//$UTC = new UsuarioTurnaCorrespondencia();
				//$IdUTC = $UTC->turnarA(Auth::User()->IdUsuario,$IdCorrespondencia,$datos['DirigidoA'],1,$fecha);
				
				Session::flash('msg','Registro de oficio saliente realizado correctamente.');
				return Redirect::action('OficiosController@iescmpl_salientes');
			}	
			else{
				Session::flash('msgf','Error al registrar nuevo oficio saliente.');
				return Redirect::action('OficiosController@iescmpl_salientes');
			}
		}
}
?>