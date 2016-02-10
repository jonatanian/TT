<?php

class SIGController extends BaseController {

	public function SIG_RD()
		{
			if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
			{
				$areas = Area::join('objetivo','Objetivo_Id','=','objetivo.IdObjetivo')
							 ->join('organigrama','Organigrama_Id','=','organigrama.IdOrganigrama')
							 ->get();

				$secciones = Area::join('objetivo','Objetivo_Id','=','objetivo.IdObjetivo')
							 ->join('organigrama','Organigrama_Id','=','organigrama.IdOrganigrama')
							 ->join('area_tiene_secciones','IdArea','=','area_tiene_secciones.Area_Id')
							 ->join('tipodecontenido','area_tiene_secciones.TipoDeContenido_Id','=','tipodecontenido.IdTipoDeContenido')
							 ->join('secciones','area_tiene_secciones.Secciones_Id','=','secciones.IdSeccion')
							 ->join('descripcion','secciones.IdSeccion','=','descripcion.Secciones_Id')
							 ->orderBy('area_tiene_secciones.Precedencia','desc')
							 ->get();

				return View::make('SIG.rd',array('areas'=>$areas,'secciones'=>$secciones));
			}
			else
			{
				return Redirect::to('/SIG');
			}
		}

	public function nuevaSeccion()
		{
			if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
			{
				$areaActual = Request::get('area');
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
			if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
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
			if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
			{
				$areaActual = Request::get('area');
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
			if((Auth::User()->Rol_Id == 7) or (Auth::User()->Rol_Id == 1))
			{
				Input::flashOnly('new-nombre');
				$datos = Input::all();

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

					if($SizeKB > 5120)
					{
						Session::flash('msgf','El tamaño máximo por archivo es de 5 MB.');
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
				return View::make('SIG.index');
			}
			else
			{
				return Redirect::to('/login');
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


}
?>
