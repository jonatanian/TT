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
				return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosSalientesController@oficialia_nuevoOficio')->withInput();
			}
			
			$url_docpdf = $file->getClientOriginalName();

			if(!preg_match('/^[\x20-\x7e]*$/',$url_docpdf)){
				Session::flash('msgf','El nombre del archivo PDF no puede contener los caracteres /^[\-]*$');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio')->withInput();
			}
			
			$path = 'oficios\\salientes\\'.$url_docpdf;
			$destinoPath = public_path().'\\oficios\\salientes\\';
			
			$subir = $file->move($destinoPath,$url_docpdf);//.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$addDatosConfidenciales = new DatosConfidenciales();
			$addAnexos = new Anexo();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$path)){
				if($datos['hidden-TagsConfidenciales'] != NULL){
					$IdDatos = $addDatosConfidenciales->nuevoDatoConf($datos['hidden-TagsConfidenciales'],$IdCorrespondencia);
				}
				
				if($datos['hidden-TagsAnexos'] != NULL){
					$IdAnexos = $addAnexos->nuevoAnexo($datos['hidden-TagsAnexos'],$IdCorrespondencia);
				}
				
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Emisor = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Emisor->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upEmisor = $Emisor->updateCargoSaliente($datos);			
				}
				
				if($Emisor->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Emisor->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Emisor->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Emisor->Dependencia_Area_Id);
					}
					if($DepTieneArea->Dependencia_Id != $datos['DependenciaE']){
						$UpDTA = $DepTieneArea->updateDependencia($datos,$DepTieneArea->IdDependenciaTieneArea);
					}
				}
				
				//$fecha = new DateTime();
				//$UTC = new UsuarioTurnaCorrespondencia();
				//$IdUTC = $UTC->turnarA(Auth::User()->IdUsuario,$IdCorrespondencia,$datos['DirigidoA'],1,$fecha);
				
				Session::flash('msg','Registro de oficio saliente realizado correctamente.');
				return Redirect::action('OficiosController@oficialia_salientes');
			}	
			else{
				Session::flash('msgf','Error al registrar nuevo oficio entrante.');
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
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
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
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
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
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
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
				return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosSalientesController@dsbd_nuevoOficio')->withInput();
			}
			
			$url_docpdf = $file->getClientOriginalName();

			if(!preg_match('/^[\x20-\x7e]*$/',$url_docpdf)){
				Session::flash('msgf','El nombre del archivo PDF no puede contener los caracteres /^[\-]*$');
				return Redirect::action('OficiosEntrantesController@dsbd_nuevoOficio')->withInput();
			}
			
			$path = 'oficios\\salientes\\'.$url_docpdf;
			$destinoPath = public_path().'\\oficios\\salientes\\';
			
			$subir = $file->move($destinoPath,$url_docpdf);//.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$addDatosConfidenciales = new DatosConfidenciales();
			$addAnexos = new Anexo();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$path)){
				if($datos['hidden-TagsConfidenciales'] != NULL){
					$IdDatos = $addDatosConfidenciales->nuevoDatoConf($datos['hidden-TagsConfidenciales'],$IdCorrespondencia);
				}
				
				if($datos['hidden-TagsAnexos'] != NULL){
					$IdAnexos = $addAnexos->nuevoAnexo($datos['hidden-TagsAnexos'],$IdCorrespondencia);
				}
				
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Emisor = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Emisor->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upEmisor = $Emisor->updateCargoSaliente($datos);			
				}
				
				if($Emisor->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Emisor->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Emisor->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Emisor->Dependencia_Area_Id);
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
				Session::flash('msgf','Error al registrar nuevo oficio entrante.');
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
				return Redirect::action('OficiosSalientesController@direccion_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosSalientesController@direccion_nuevoOficio')->withInput();
			}
			
			$url_docpdf = $file->getClientOriginalName();

			if(!preg_match('/^[\x20-\x7e]*$/',$url_docpdf)){
				Session::flash('msgf','El nombre del archivo PDF no puede contener los caracteres /^[\-]*$');
				return Redirect::action('OficiosEntrantesController@direccion_nuevoOficio')->withInput();
			}
			
			$path = 'oficios\\salientes\\'.$url_docpdf;
			$destinoPath = public_path().'\\oficios\\salientes\\';
			
			$subir = $file->move($destinoPath,$url_docpdf);//.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$addDatosConfidenciales = new DatosConfidenciales();
			$addAnexos = new Anexo();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$path)){
				if($datos['hidden-TagsConfidenciales'] != NULL){
					$IdDatos = $addDatosConfidenciales->nuevoDatoConf($datos['hidden-TagsConfidenciales'],$IdCorrespondencia);
				}
				
				if($datos['hidden-TagsAnexos'] != NULL){
					$IdAnexos = $addAnexos->nuevoAnexo($datos['hidden-TagsAnexos'],$IdCorrespondencia);
				}
				
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Emisor = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Emisor->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upEmisor = $Emisor->updateCargoSaliente($datos);			
				}
				
				if($Emisor->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Emisor->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Emisor->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Emisor->Dependencia_Area_Id);
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
				Session::flash('msgf','Error al registrar nuevo oficio entrante.');
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
				return Redirect::action('OficiosSalientesController@subdireccion_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosSalientesController@subdireccion_nuevoOficio')->withInput();
			}
			
			$url_docpdf = $file->getClientOriginalName();

			if(!preg_match('/^[\x20-\x7e]*$/',$url_docpdf)){
				Session::flash('msgf','El nombre del archivo PDF no puede contener los caracteres /^[\-]*$');
				return Redirect::action('OficiosEntrantesController@subdireccion_nuevoOficio')->withInput();
			}
			
			$path = 'oficios\\salientes\\'.$url_docpdf;
			$destinoPath = public_path().'\\oficios\\salientes\\';
			
			$subir = $file->move($destinoPath,$url_docpdf);//.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$addDatosConfidenciales = new DatosConfidenciales();
			$addAnexos = new Anexo();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$path)){
				if($datos['hidden-TagsConfidenciales'] != NULL){
					$IdDatos = $addDatosConfidenciales->nuevoDatoConf($datos['hidden-TagsConfidenciales'],$IdCorrespondencia);
				}
				
				if($datos['hidden-TagsAnexos'] != NULL){
					$IdAnexos = $addAnexos->nuevoAnexo($datos['hidden-TagsAnexos'],$IdCorrespondencia);
				}
				
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Emisor = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Emisor->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upEmisor = $Emisor->updateCargoSaliente($datos);			
				}
				
				if($Emisor->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Emisor->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Emisor->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Emisor->Dependencia_Area_Id);
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
				Session::flash('msgf','Error al registrar nuevo oficio entrante.');
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
				return Redirect::action('OficiosSalientesController@jefatura_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosSalientesController@jefatura_nuevoOficio')->withInput();
			}
			
			$url_docpdf = $file->getClientOriginalName();

			if(!preg_match('/^[\x20-\x7e]*$/',$url_docpdf)){
				Session::flash('msgf','El nombre del archivo PDF no puede contener los caracteres /^[\-]*$');
				return Redirect::action('OficiosEntrantesController@jefatura_nuevoOficio')->withInput();
			}
			
			$path = 'oficios\\salientes\\'.$url_docpdf;
			$destinoPath = public_path().'\\oficios\\salientes\\';
			
			$subir = $file->move($destinoPath,$url_docpdf);//.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$addDatosConfidenciales = new DatosConfidenciales();
			$addAnexos = new Anexo();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$path)){
				if($datos['hidden-TagsConfidenciales'] != NULL){
					$IdDatos = $addDatosConfidenciales->nuevoDatoConf($datos['hidden-TagsConfidenciales'],$IdCorrespondencia);
				}
				
				if($datos['hidden-TagsAnexos'] != NULL){
					$IdAnexos = $addAnexos->nuevoAnexo($datos['hidden-TagsAnexos'],$IdCorrespondencia);
				}
				
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Emisor = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Emisor->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upEmisor = $Emisor->updateCargoSaliente($datos);			
				}
				
				if($Emisor->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Emisor->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Emisor->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Emisor->Dependencia_Area_Id);
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
				Session::flash('msgf','Error al registrar nuevo oficio entrante.');
				return Redirect::action('OficiosController@jefatura_salientes');
			}
			
		}
		
		/////////////////////Personal CMPL////////////////////////////////
		public function iescmpl_nuevoOficio()
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
			return View::make('oficios.iescmpl_salientes_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce,'OEs'=>$oficiosEntrantes,'idOficio' => $idOficio,'prioridades'=>$prioridades,'caracteres'=>$caracteres));
		}
		
	public function iescmpl_nuevoOficio_registrar()
		{
			Input::flashOnly('IdOficio','DirigidoA','FechaEmision','FechaRecepcion','Asunto','IdOficioR','FechaLimiteR');
			
			$file = Input::file('DocPDF');
			if($file == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosSalientesController@iescmpl_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosSalientesController@iescmpl_nuevoOficio')->withInput();
			}
			
			$url_docpdf = $file->getClientOriginalName();

			if(!preg_match('/^[\x20-\x7e]*$/',$url_docpdf)){
				Session::flash('msgf','El nombre del archivo PDF no puede contener los caracteres /^[\-]*$');
				return Redirect::action('OficiosEntrantesController@iescmpl_nuevoOficio')->withInput();
			}
			
			$path = 'oficios\\salientes\\'.$url_docpdf;
			$destinoPath = public_path().'\\oficios\\salientes\\';
			
			$subir = $file->move($destinoPath,$url_docpdf);//.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$addDatosConfidenciales = new DatosConfidenciales();
			$addAnexos = new Anexo();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$path)){
				if($datos['hidden-TagsConfidenciales'] != NULL){
					$IdDatos = $addDatosConfidenciales->nuevoDatoConf($datos['hidden-TagsConfidenciales'],$IdCorrespondencia);
				}
				
				if($datos['hidden-TagsAnexos'] != NULL){
					$IdAnexos = $addAnexos->nuevoAnexo($datos['hidden-TagsAnexos'],$IdCorrespondencia);
				}
				
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Emisor = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Emisor->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upEmisor = $Emisor->updateCargoSaliente($datos);			
				}
				
				if($Emisor->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Emisor->updateAreaSaliente($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Emisor->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaE']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Emisor->Dependencia_Area_Id);
					}
					if($DepTieneArea->Dependencia_Id != $datos['DependenciaE']){
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
				Session::flash('msgf','Error al registrar nuevo oficio entrante.');
				return Redirect::action('OficiosController@iescmpl_salientes');
			}
			
		}
		///////////////Ver detalles y ver PDF///////////////////
	public function verPDF()
	{
		$Correspondencia = Request::get('correspondencia');
		
		$OficioSaliente = Correspondencia::join('oficio_saliente','IdCorrespondencia','=','oficio_saliente.Correspondencia_Id')
										 ->where('correspondencia.IdCorrespondencia',$Correspondencia)
										 ->first();
										 
		$pathToFile = public_path().'/'.$OficioSaliente->URLPDF;
		$name = 'OficioSaliente_'.$OficioSaliente->IdConsecutivo.'_'.$OficioSaliente->FechaEntrega.'.pdf';
		$headers = array('Content-Type'=>'application/pdf',);
		//Cambio de estátus a Visto
		
		return Response::download($pathToFile,$name, $headers);
	}
	
	public function oficialia_verDetalles()
	{
		$IdCorrespondencia = Request::get('correspondencia');
		$isDatosConfidenciales = DatosConfidenciales::where('Correspondencia_Id',$IdCorrespondencia)->first();
		$isAnexos = Anexo::where('Correspondencia_Id',$IdCorrespondencia)->first();
		
		if($isDatosConfidenciales != NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif(($isDatosConfidenciales != NULL) && ($isAnexos == NULL))
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif($isDatosConfidenciales == NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		else//($isDatosConfidenciales == NULL && $isAnexos == NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
				  
		return View::make('oficios.oficialia_OficioSalienteDetalles',array('oficio'=>$oficio,));
	}
	public function dsbd_verDetalles()
	{
		$IdCorrespondencia = Request::get('correspondencia');
		$isDatosConfidenciales = DatosConfidenciales::where('Correspondencia_Id',$IdCorrespondencia)->first();
		$isAnexos = Anexo::where('Correspondencia_Id',$IdCorrespondencia)->first();
		
		if($isDatosConfidenciales != NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif(($isDatosConfidenciales != NULL) && ($isAnexos == NULL))
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif($isDatosConfidenciales == NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		else//($isDatosConfidenciales == NULL && $isAnexos == NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
				  
		return View::make('oficios.dsbd_OficioSalienteDetalles',array('oficio'=>$oficio,));
	}
	
	public function direccion_verDetalles()
	{
		$IdCorrespondencia = Request::get('correspondencia');
		$isDatosConfidenciales = DatosConfidenciales::where('Correspondencia_Id',$IdCorrespondencia)->first();
		$isAnexos = Anexo::where('Correspondencia_Id',$IdCorrespondencia)->first();
		
		if($isDatosConfidenciales != NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif(($isDatosConfidenciales != NULL) && ($isAnexos == NULL))
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif($isDatosConfidenciales == NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		else//($isDatosConfidenciales == NULL && $isAnexos == NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
				  
		return View::make('oficios.direccion_OficioSalienteDetalles',array('oficio'=>$oficio,));
	}
	public function subdireccion_verDetalles()
	{
		$IdCorrespondencia = Request::get('correspondencia');
		$isDatosConfidenciales = DatosConfidenciales::where('Correspondencia_Id',$IdCorrespondencia)->first();
		$isAnexos = Anexo::where('Correspondencia_Id',$IdCorrespondencia)->first();
		
		if($isDatosConfidenciales != NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif(($isDatosConfidenciales != NULL) && ($isAnexos == NULL))
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif($isDatosConfidenciales == NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		else//($isDatosConfidenciales == NULL && $isAnexos == NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
				  
		return View::make('oficios.subdireccion_OficioSalienteDetalles',array('oficio'=>$oficio,));
	}
		
	public function jefatura_verDetalles()
	{
		$IdCorrespondencia = Request::get('correspondencia');
		$isDatosConfidenciales = DatosConfidenciales::where('Correspondencia_Id',$IdCorrespondencia)->first();
		$isAnexos = Anexo::where('Correspondencia_Id',$IdCorrespondencia)->first();
		
		if($isDatosConfidenciales != NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif(($isDatosConfidenciales != NULL) && ($isAnexos == NULL))
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif($isDatosConfidenciales == NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		else//($isDatosConfidenciales == NULL && $isAnexos == NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
				  
		return View::make('oficios.jefatura_OficioSalienteDetalles',array('oficio'=>$oficio,));
	}
	
	public function iescmpl_verDetalles()
	{
		$IdCorrespondencia = Request::get('correspondencia');
		$isDatosConfidenciales = DatosConfidenciales::where('Correspondencia_Id',$IdCorrespondencia)->first();
		$isAnexos = Anexo::where('Correspondencia_Id',$IdCorrespondencia)->first();
		
		if($isDatosConfidenciales != NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif(($isDatosConfidenciales != NULL) && ($isAnexos == NULL))
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('datos_confidenciales','correspondencia.IdCorrespondencia','=','datos_confidenciales.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		elseif($isDatosConfidenciales == NULL && $isAnexos != NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('anexo','correspondencia.IdCorrespondencia','=','anexo.Correspondencia_Id')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
		
		else//($isDatosConfidenciales == NULL && $isAnexos == NULL)
		{
			$oficio = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('prioridad','correspondencia.Prioridad_Id','=','prioridad.IdPrioridad')
									->join('caracter','correspondencia.Caracter_Id','=','caracter.IdCaracter')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('cargo_entidad','entidad_externa.DepArea_Cargo_Id','=','cargo_entidad.IdCargoEntidad')
									->join('dependencia_area','AreaDestinada','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','Dependencia','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->where('correspondencia.IdCorrespondencia',$IdCorrespondencia)
									->first();
		}
				  
		return View::make('oficios.iescmpl_OficioSalienteDetalles',array('oficio'=>$oficio,));
	}
}
?>