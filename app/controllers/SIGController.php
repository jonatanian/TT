<?php

class SIGController extends BaseController {

	public function SIG_RD()//Validaci'on quitada provicionalmente
		{
			//if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
			//{
				$areas = Area::join('objetivo','Objetivo_Id','=','objetivo.IdObjetivo')
							 ->join('organigrama','Organigrama_Id','=','organigrama.IdOrganigrama')
							 ->get();

				$secciones = Area::join('objetivo','Objetivo_Id','=','objetivo.IdObjetivo')
							 ->join('organigrama','Organigrama_Id','=','organigrama.IdOrganigrama')
							 ->join('area_tiene_secciones','IdArea','=','area_tiene_secciones.Area_Id')
							 ->join('tipodecontenido','area_tiene_secciones.TipoDeContenido_Id','=','tipodecontenido.IdTipoDeContenido')
							 ->join('secciones','area_tiene_secciones.Secciones_Id','=','secciones.IdSeccion')
							 ->join('descripcion','secciones.IdSeccion','=','descripcion.Secciones_Id')
							 ->orderBy('area_tiene_secciones.Precedencia','asc')
							 ->get();

				return View::make('SIG.rd',array('areas'=>$areas,'secciones'=>$secciones));
			//}
			//else
			//{
		//		return Redirect::to('/SIG');
			//}
		}

	public function nuevaSeccion()
		{
			$areaActual = Request::get('area');
			if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1) or ($areaActual == 19))
			{
				//$areaActual = Request::get('area');
				$areaActualNombre = Area::where('IdArea',$areaActual)->first();
				$areas = Area::join('objetivo','Objetivo_Id','=','objetivo.IdObjetivo')
							 ->join('organigrama','Organigrama_Id','=','organigrama.IdOrganigrama')
							 ->get();
				$tipoContenido = TipoDeContenido::all();
				$NombresSecciones = Secciones::all();
				return View::make('SIG.nuevaSeccion',array('areaActual'=>$areaActual,'areaActualNombre'=>$areaActualNombre,'areas'=>$areas,'TipoDeContenido'=>$tipoContenido,'NombresSecciones'=>$NombresSecciones));
			}
			else
			{
				return Redirect::to('/SIG');
			}
		}

	public function registrarSeccion()
		{
			$datos = Input::all();
			if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1) or ($datos['IdArea'] == 19))
			{
				$nuevaDescripcion = new Descripcion();
				$nuevaSeccion = new Secciones();
				$nuevaATS = new AreaTieneSecciones();
				$datos = Input::all();
				if($datos['new-nombre'] == NULL)
				{
					$verificarExistencia = AreaTieneSecciones::where('Area_Id',$datos['IdArea'])->where('Secciones_Id',$datos['set-nombre'])->first();
					if($verificarExistencia != NULL)
					{
						Session::flash('msgWarning','Ya existe una sección en esta área con el mismo nombre. Intenta con otro nombre.');
						return Redirect::action('SIGController@nuevaSeccion',array('area'=>$datos['IdArea']));
					}
					else
					{
						$IdDescripcion = $nuevaDescripcion->nuevaDescripcion($datos,$datos['set-nombre']);
						$IdATS = $nuevaATS->nuevaATS($datos,$datos['set-nombre']);
					}
				}
				else
				{
					$verificarNombre = Secciones::where('NombreSeccion',$datos['new-nombre'])->first();
					if($verificarNombre != NULL)
					{
						$verificarExistencia = AreaTieneSecciones::where('Area_Id',$datos['IdArea'])->where('Secciones_Id',$verificarNombre->IdSeccion)->first();
					}
					else
					{
						$verificarExistencia = NULL;
					}

					if($verificarExistencia != NULL)
					{
						Session::flash('msgWarning','Ya existe una sección en esta área con el mismo nombre. Intenta con otro nombre.');
						return Redirect::action('SIGController@nuevaSeccion',array('area'=>$datos['IdArea']));
					}
					else
					{
						$IdSeccion = $nuevaSeccion->nuevaSeccion($datos);
						$IdDescripcion = $nuevaDescripcion->nuevaDescripcion($datos,$IdSeccion);
						$IdATS = $nuevaATS->nuevaATS($datos,$IdSeccion);
					}
				}
				Session::flash('msg','Nueva sección creada correctamente.');
				return Redirect::to('/SIG/RD');
			}
			else
			{
				return Redirect::to('/SIG');
			}
		}

	public function editarTabla()
		{
			$areaActual = Request::get('area');
			if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1) or ($areaActual == 19))
			{
				//$areaActual = Request::get('area');
				$IdSeccion = Request::get('IdSeccion');
				$IdATS = Request::get('IdATS');
				$IdTipoContenido = Request::get('TipoContenido');

				$areaActualNombre = Area::where('IdArea',$areaActual)->first();
				$Seccion = Secciones::where('IdSeccion',$IdSeccion)->first();

				$TablaDeContenido = Contenido::join('area_tiene_secciones','ATS_Id','=','area_tiene_secciones.IdATS')
											 ->where('area_tiene_secciones.Area_Id','=',$areaActual)
											 ->where('area_tiene_secciones.Secciones_Id','=',$IdSeccion)
											 ->get();

				return View::make('SIG.editarContenido',array('areaActual'=>$areaActual,'areaActualNombre'=>$areaActualNombre,'Seccion'=>$Seccion,'IdATS'=>$IdATS,'Items'=>$TablaDeContenido,'TipoDeContenido'=>$IdTipoContenido));
			}
			else
			{
				return Redirect::to('/SIG');
			}
		}

	public function actualizarTabla()
		{
			$datos = Input::all();
			if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1) or ($datos['AreaActual'] == 19))
			{
				Input::flashOnly('new-nombre');
				//$datos = Input::all();

				$nuevoItem = new Contenido();

				if($datos['IdTipoDeContenido'] == 1)
				{
					$IdItem = $nuevoItem->nuevoItem($datos,NULL,NULL);
					Session::flash('msg','Item publicado correctamente.');
					return Redirect::action('SIGController@editarTabla',array('IdSeccion'=>$datos['IdSeccion'],'IdATS'=>$datos['IdATS'],'TipoContenido'=>$datos['IdTipoDeContenido'],'area'=>$datos['AreaActual']));
				}
				else
				{
					$file = Input::file('set-archivo');
					$fileExt = Input::file('set-archivo')->getClientOriginalExtension();
					$fileSize = Input::file('set-archivo')->getSize();

					$SizeKB = $fileSize/1000;

					if($SizeKB > 20000)
					{
						Session::flash('msgf','El tamaño máximo por archivo es de 20 MB.');
						return Redirect::action('SIGController@editarTabla',array('IdSeccion'=>$datos['IdSeccion'],'IdATS'=>$datos['IdATS'],'TipoContenido'=>$datos['IdTipoDeContenido'],'area'=>$datos['AreaActual']))->withInput();
					}

					if($fileExt == 'exe' or $fileExt == 'sql')
					{
						Session::flash('msgf','Debe subir un archivo en formato PDF, Word o Excel.');
						return Redirect::action('SIGController@editarTabla',array('IdSeccion'=>$datos['IdSeccion'],'IdATS'=>$datos['IdATS'],'TipoContenido'=>$datos['IdTipoDeContenido'],'area'=>$datos['AreaActual']))->withInput();
					}

					$url_doc = $file->getClientOriginalName();

					if(!preg_match('/^[\x20-\x7e]*$/',$url_doc))
					{
						Session::flash('msgf','El nombre del archivo no puede contener caracteres especiales.');
						return Redirect::action('SIGController@editarTabla',array('IdSeccion'=>$datos['IdSeccion'],'IdATS'=>$datos['IdATS'],'TipoContenido'=>$datos['IdTipoDeContenido'],'area'=>$datos['AreaActual']))->withInput();
					}

					$getNombreArea = Area::where('IdArea',$datos['AreaActual'])->first();
					$getNombreSeccion = Secciones::where('IdSeccion',$datos['IdSeccion'])->first();
					$path = 'contenido-sig\\archivos\\'.$getNombreArea->NombreArea.'\\'.$getNombreSeccion->NombreSeccion.'\\'.$url_doc;
					$destinoPath = public_path().'\\contenido-sig\\archivos\\'.$getNombreArea->NombreArea.'\\'.$getNombreSeccion->NombreSeccion;
					$subir = $file->move($destinoPath,$url_doc);

					$IdItem = $nuevoItem->nuevoItem($datos,$path,$fileExt);

					Session::flash('msg','Item publicado correctamente.');
					return Redirect::action('SIGController@editarTabla',array('IdSeccion'=>$datos['IdSeccion'],'IdATS'=>$datos['IdATS'],'TipoContenido'=>$datos['IdTipoDeContenido'],'area'=>$datos['AreaActual']));
				}

			}
			else
			{
				return Redirect::to('/SIG');
			}
		}

	public function descargarDocumento()
	{
		$IdContenido = Request::get('IdContenido');

		$documento = Contenido::join('area_tiene_secciones','ATS_Id','=','area_tiene_secciones.IdATS')
							  ->join('secciones','area_tiene_secciones.Secciones_Id','=','secciones.IdSeccion')
							  ->join('area','area_tiene_secciones.Area_Id','=','area.IdArea')
		                      ->where('IdContenido',$IdContenido)->first();

		$pathToFile = public_path().'/'.$documento->AccionesOMetas;
		$name = 'SIG_'.$documento->NombreODescripcion.'_'.$documento->NombreSeccion.'_'.$documento->NombreArea.'.'.$documento->ExtensionDoc;
		$headers = array('Content-Type'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
						 'Content-Type'=> 'application/vnd.ms-powerpoint',
						 'Content-Type'=> 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
						 'Content-Type'=> 'application/vnd.ms-powerpoint',
						 'Content-Type'=> 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
						 'Content-Type'=> 'application/vnd.ms-excel',
						 'Content-Type'=> 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
						 'Content-Type'=> 'application/pdf',);

		$response = Response::download($pathToFile,$name,$headers);
		ob_end_clean();

		return $response;
	}

	public function SIG_index()
		{
			if(Auth::check())
			{
				return Redirect::to('/SIG/Avisos');
				//return View::make('SIG.index');
			}
			else
			{
				return Redirect::to('/login');
			}
		}

	public function SGA_index()
		{
			if(Auth::check())
			{
				return View::make('SIG.SGA');
			}
			else
			{
				return Redirect::to('/');
			}
		}


	public function SIG_Master()
		{
			if(Auth::check())
			{
				$IdArea = Request::get('IdArea');
				$areas = Area::join('objetivo','Objetivo_Id','=','objetivo.IdObjetivo')
							 ->join('organigrama','Organigrama_Id','=','organigrama.IdOrganigrama')
							 ->join('usuario', 'Area_Id', '=', 'usuario.Area_Id')
							 ->join('rol', 'usuario.Rol_Id', '=', 'rol.IdRol')
							 ->where('Area.IdArea', $IdArea)
							 ->first();

				$responsable = Usuario::join('area','Area_Id', '=', 'area.IdArea')
				       				  ->join('cargo', 'Cargo_Id', '=', 'cargo.IdCargo')
				       				  ->where('Area.IdArea', $IdArea)
							 		  ->whereIn('usuario.Cargo_Id', array(1,4,5))
							 		  ->first();

		  		$secciones = AreaTieneSecciones::join('secciones','Secciones_Id','=','secciones.IdSeccion')
               								   ->join('descripcion','secciones.IdSeccion','=','descripcion.Secciones_Id')
							 				   ->where('area_tiene_secciones.Area_Id',$IdArea)
							 				   ->where('descripcion.SecDeArea',$IdArea)
							 				   ->orderBy('area_tiene_secciones.Precedencia','asc')
							                   ->get();

			  	$contenido = Contenido::join('area_tiene_secciones','ATS_Id','=','area_tiene_secciones.IdATS')
			  						  //->join('secciones','area_tiene_secciones.Secciones_Id','=','secciones.IdSeccion')
			  						  //->join('descripcion','secciones.IdSeccion','=','descripcion.Secciones_Id')
							 		  ->where('area_tiene_secciones.Area_Id','=',$IdArea)
							          ->get();

				return View::make('SIG.master',array('areas'=>$areas, 'secciones'=>$secciones, 'IdArea'=>$IdArea, 'contenido'=>$contenido, 'responsable'=>$responsable));

			}
			else
			{
				return Redirect::to('/login');
			}
		}

		public function SIG_Avisos(){
				if(Auth::check())
				{
					//$IdArea = Request::get('IdArea');
					$avisos = Avisos::orderBy('prioridad','asc')->orderBy('fecha','desc')->orderBy('idAviso','desc')->get();
					return View::make('SIG.avisos',array('avisos'=>$avisos));

				}
				else
				{
					return Redirect::to('/login');
				}
			}

		public function editarSeccion()
			{
				if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
				{
					$areaActual = Request::get('IdArea');
					$seccionActual = Request::get('IdSeccion');
					$areaActualNombre = Area::where('IdArea',$areaActual)->first();

					$tipoContenido = TipoDeContenido::all();
					$NombreSeccion = Secciones::where('IdSeccion', $seccionActual)->first();
					$Descripcion = Descripcion::where('Secciones_Id', $seccionActual)
													->where('SecDeArea',$areaActual)
													->first();
					return View::make('SIG.editarSeccion',array('areaActual'=>$areaActual,'areaActualNombre'=>$areaActualNombre,'NombreSeccion'=>$NombreSeccion,'Descripcion'=>$Descripcion, 'seccionActual'=>$seccionActual));
				}
				else
				{
					return Redirect::to('/SIG');
				}
			}

			public function actualizarSeccion()
				{
					if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
					{
						$actualizarDescripcion = new Descripcion();
						$actualizarSeccion = new Secciones();
						$datos = Input::all();

						if($datos['new-nombre'] != NULL)
						{
							$verificarNombre = Secciones::where('NombreSeccion',$datos['new-nombre'])->first();

								if(!$actualizarSeccion->actualizarSeccion($datos))
								{
									Session::flash('msgWarning','Error en la aplicación, vuelva a intentarlo');
									return Redirect::to('/SIG/RD');
								}
								elseif(!$actualizarDescripcion->actualizarDescripcion($datos))
								{
									Session::flash('msgWarning','Error en la aplicación, vuelva a intentarlo');
									return Redirect::to('/SIG/RD');
								}


						}
						Session::flash('msg','Sección actualizada correctamente.');
						return Redirect::to('/SIG/RD');
					}
					else
					{
						return Redirect::to('/SIG');
					}
				}

				public function eliminarSeccion()
					{
						if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
						{

							$seccionActual = Request::get('IdSeccion');
							$areaActual = Request::get('IdArea');
							$ATSActual = Request::get('IdATS');
							$seccion = new Secciones();
							$descripcion = new Descripcion();
							$ATS = new AreaTieneSecciones();
							$contenido = Contenido::where('ATS_Id',$ATSActual)->first();
							if($contenido != NULL)
							{
								Session::flash('msgWarning','La sección NO está vacía! Debe eliminar primero el contenido.');
								return Redirect::to('/SIG/RD');
							}
							if(!$descripcion->eliminarDescripcion($areaActual,$seccionActual))
							{
								Session::flash('msgWarning','Error en la aplicación, vuelva a intentarlo');
								return Redirect::to('/SIG/RD');
							}
							//Area Tiene secciones
							elseif(!$ATS->eliminarATS($ATSActual))
							{
								Session::flash('msgWarning','Error en la aplicación, vuelva a intentarlo');
								return Redirect::to('/SIG/RD');
							}

							elseif(!$ATS->reordenarATS($areaActual,$seccionActual))
							{
								Session::flash('msgWarning','Error en la aplicación, vuelva a intentarlo');
								return Redirect::to('/SIG/RD');
							}
							$val = $ATS->reordenarATS($areaActual,$seccionActual);
							echo '<script type="text/javascript">alert("'. $val .'")</script>';
							Session::flash('msg','Sección eliminada correctamente.');
							return Redirect::to('/SIG/RD');
						}
						else
						{

							return Redirect::to('/SIG');
						}
					}

					public function eliminarItem()
					{
						if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
						{
							$IdContenido = Request::get('IdContenido');
							$areaActual = Request::get('IdArea');
							$IdSeccion = Request::get('IdSeccion');
							$IdATS = Request::get('IdATS');
							$IdTipoContenido = Request::get('TipoContenido');
							$Item = new Contenido();
							$areaActualNombre = Area::where('IdArea',$areaActual)->first();
							$Seccion = Secciones::where('IdSeccion',$IdSeccion)->first();
							if($Item->eliminarItem($IdContenido))
								{
									echo '<script type="text/javascript">alert("' . 'Se ha eliminado el Item' . '")</script>';
									$TablaDeContenido = Contenido::join('area_tiene_secciones','ATS_Id','=','area_tiene_secciones.IdATS')
																 ->where('area_tiene_secciones.Area_Id','=',$areaActual)
																 ->where('area_tiene_secciones.Secciones_Id','=',$IdSeccion)
																 ->get();
									Session::flash('msg','Item eliminado correctamente.');
									return View::make('SIG.editarContenido',array('areaActual'=>$areaActual,'areaActualNombre'=>$areaActualNombre,'Seccion'=>$Seccion,'IdATS'=>$IdATS,'Items'=>$TablaDeContenido,'TipoDeContenido'=>$IdTipoContenido));
								}
							else {

								$TablaDeContenido = Contenido::join('area_tiene_secciones','ATS_Id','=','area_tiene_secciones.IdATS')
															 ->where('area_tiene_secciones.Area_Id','=',$areaActual)
															 ->where('area_tiene_secciones.Secciones_Id','=',$IdSeccion)
															 ->get();
								Session::flash('msgWarning','Error en la aplicación, vuelva a intentarlo');
								return View::make('SIG.editarContenido',array('areaActual'=>$areaActual,'areaActualNombre'=>$areaActualNombre,'Seccion'=>$Seccion,'IdATS'=>$IdATS,'Items'=>$TablaDeContenido,'TipoDeContenido'=>$IdTipoContenido));
							}

						}
						else
						{
							return Redirect::to('/SIG');
						}

					}

	public function descargarDocumentoDefiniciones()
	{
		$pathToFile = public_path().'./SGA/Definiciones.docx';
		$headers = array('Content-Type'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
						 'Content-Type'=> 'application/vnd.ms-powerpoint',
						 'Content-Type'=> 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
						 'Content-Type'=> 'application/vnd.ms-powerpoint',
						 'Content-Type'=> 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
						 'Content-Type'=> 'application/vnd.ms-excel',
						 'Content-Type'=> 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
						 'Content-Type'=> 'application/pdf',);

		$response = Response::download($pathToFile,'Definiciones.docx',$headers);
		ob_end_clean();

		return $response;
	}

	public function descargarManualOrg()
	{
		$pathToFile = public_path().'./procedimientos/ManualOrganizacion.pdf';
		$headers = array('Content-Type'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
						 'Content-Type'=> 'application/vnd.ms-powerpoint',
						 'Content-Type'=> 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
						 'Content-Type'=> 'application/vnd.ms-powerpoint',
						 'Content-Type'=> 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
						 'Content-Type'=> 'application/vnd.ms-excel',
						 'Content-Type'=> 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
						 'Content-Type'=> 'application/pdf',);

		$response = Response::download($pathToFile,'ManualOrganizacion.pdf',$headers);
		ob_end_clean();

		return $response;
	}

	public function subirSeccion()
	{
		$IdArea = Request::get('IdArea');
		$IdSeccion = Request::get('IdSeccion');
		$seccion = AreaTieneSecciones::where('Area_Id',$IdArea)->where('Secciones_Id',$IdSeccion)->first();
		if($seccion->Precedencia == 1)
		{
			Session::flash('msgWarning','Error, esta sección no se puede subir más');
			return Redirect::to('/SIG/RD');
		}
		else
		{
			$ATS = new AreaTieneSecciones();
			if($ATS->subirSeccion($IdArea, $IdSeccion))
			{
				echo '<script type="text/javascript">alert("' . 'Se ha movido la sección' . '")</script>';
				Session::flash('msg','La sección se movió con éxito');
				return Redirect::to('/SIG/RD');
			}
			else {
				Session::flash('msgWarning','Error en la aplicación, vuelva a intentarlo');
				return Redirect::to('/SIG/RD');
			}
		}
	}

	public function editarOrganigrama(){
		if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1)){
			//$areas = Area::lists('NombreArea','NombreArea');
			$areas = array('Direccion' => 'Dirección', 'Tecnica' => 'Subdirección Técnica', 'Posgrado'=>'Subdirección de Posgrado', 'Vinculacion' => 'Subdirección de Vinculación y Apoyo', 'Administrativa' => 'Departamento de Servicios Administrativos y Técnicos', 'Sistemas' => 'Departamento de Sistemas y Banco de Datos');
			return View::make('SIG.editarOrganigramas', array('areas'=>$areas));
		}
		else{
			return Redirect::to('/SIG');
		}
	}

	public function actualizarOrganigrama(){
		$datos = Input::all();
		if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
		{
			$newOrganigrama = new Organigrama();
			if(Input::file('set-archivo')){
				$file = Input::file('set-archivo');
				if($file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'PNG'){
					//File::delete(public_path().'\\images\\organigrama', $datos['area'].'.'.$file->getClientOriginalExtension());
					$subir = $file->move(public_path().'\\images\\organigrama', $datos['area'].'.'.$file->getClientOriginalExtension());
					Session::flash('msg','Organigrama actualizado correctamente.');
					$areas = array('Direccion' => 'Dirección', 'Tecnica' => 'Subdirección Técnica', 'Posgrado'=>'Subdirección de Posgrado', 'Vinculacion' => 'Subdirección de Vinculación y Apoyo', 'Administrativa' => 'Departamento de Servicios Administrativos y Técnicos', 'Sistemas' => 'Departamento de Sistemas y Banco de Datos');
					return Redirect::action('SIGController@editarOrganigrama', array('areas'=>$areas));
				}
				else{
					Session::flash('msgf','Debe seleccionar una imagen con extensión PNG');
					$areas = array('Direccion' => 'Dirección', 'Tecnica' => 'Subdirección Técnica', 'Posgrado'=>'Subdirección de Posgrado', 'Vinculacion' => 'Subdirección de Vinculación y Apoyo', 'Administrativa' => 'Departamento de Servicios Administrativos y Técnicos', 'Sistemas' => 'Departamento de Sistemas y Banco de Datos');
					return Redirect::action('SIGController@editarOrganigrama', array('areas'=>$areas));
				}
			}
			else{
				Session::flash('msgf','Debe seleccionar una imagen de su equipo');
				$areas = array('Direccion' => 'Dirección', 'Tecnica' => 'Subdirección Técnica', 'Posgrado'=>'Subdirección de Posgrado', 'Vinculacion' => 'Subdirección de Vinculación y Apoyo', 'Administrativa' => 'Departamento de Servicios Administrativos y Técnicos', 'Sistemas' => 'Departamento de Sistemas y Banco de Datos');
				return Redirect::action('SIGController@editarOrganigrama', array('areas'=>$areas));
			}
		}
		else
		{
			return Redirect::to('/SIG');
		}
	}

	public function crearAvisos(){
		if(Auth::check()){
			//$areas = Area::lists('NombreArea','NombreArea');
			$avisos = Avisos::orderBy('idAviso','desc')->get();
			$prioridad = Prioridad::lists('NombrePrioridad','IdPrioridad');
			return View::make('SIG.crearAvisos', array('avisos'=>$avisos, 'prioridad'=>$prioridad));
		}
		else{
			return Redirect::to('/SIG');
		}
	}

	public function nuevoAviso(){
		if(Auth::check()){
			//$areas = Area::lists('NombreArea','NombreArea');
			$datos = Input::all();
			$aviso = new Avisos();
			if($aviso->crearAviso($datos)){
				$prioridad = Prioridad::lists('NombrePrioridad','IdPrioridad');
				$avisos = Avisos::orderBy('idAviso','desc')->get();
				Session::flash('msg','Aviso publicado correctamente.');
				return View::make('SIG.crearAvisos', array('avisos'=>$avisos, 'prioridad'=>$prioridad));
			}
			else{
				$avisos = Avisos::orderBy('idAviso','desc')->get();
				$prioridad = Prioridad::lists('NombrePrioridad','IdPrioridad');
				Session::flash('msgf','Aviso no publicado. Intente más tarde.');
				return View::make('SIG.crearAvisos', array('avisos'=>$avisos, 'prioridad'=>$prioridad));
			}
		}
		else{
			return Redirect::to('/SIG');
		}
	}

	public function editarAvisos(){
		if(Auth::check()){
			//$areas = Area::lists('NombreArea','NombreArea');
			$IdAviso = Request::get('IdAviso');
			$aviso = Avisos::where('idAviso',$IdAviso)->first();
			$prioridad = Prioridad::lists('NombrePrioridad','IdPrioridad');
			return View::make('SIG.editarAvisos', array('aviso'=>$aviso, 'prioridad'=>$prioridad));
		}
		else{
			return Redirect::to('/SIG');
		}
	}

	public function actualizarAviso(){
		if(Auth::check()){
			//$areas = Area::lists('NombreArea','NombreArea');
			$datos = Input::all();
			$aviso = new Avisos();
			if($aviso->updateAviso($datos)){
				$prioridad = Prioridad::lists('NombrePrioridad','IdPrioridad');
				$aviso = Avisos::where('idAviso',$datos['idAviso'])->first();
				Session::flash('msg','Aviso modificado correctamente.');
				return View::make('SIG.editarAvisos', array('aviso'=>$aviso, 'prioridad'=>$prioridad));
			}
			else{
				$aviso = Avisos::where('idAviso',$datos['idAviso'])->first();
				$prioridad = Prioridad::lists('NombrePrioridad','IdPrioridad');
				Session::flash('msgf','Aviso no modificado. Intente más tarde.');
				return View::make('SIG.editarAvisos', array('aviso'=>$aviso, 'prioridad'=>$prioridad));
			}
		}
		else{
			return Redirect::to('/SIG');
		}
	}


}
?>
