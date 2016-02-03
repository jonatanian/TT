<?php

class SIGController extends BaseController {

	public function SIG_RD()
		{
			if(Auth::User()->Rol_Id == 7)
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
			if(Auth::User()->Rol_Id == 7)
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
			if(Auth::User()->Rol_Id == 7)
			{
				$nuevaDescripcion = new Descripcion();
				$nuevaSeccion = new Secciones();
				$nuevaATS = new AreaTieneSecciones();
				$datos = Input::all();
				if($datos['new-nombre'] == NULL)
				{
					$IdDescripcion = $nuevaDescripcion->nuevaDescripcion($datos,$datos['set-nombre']);
					$IdATS = $nuevaATS->nuevaATS($datos,$datos['set-nombre']);
				}	
				else
				{
					$IdSeccion = $nuevaSeccion->nuevaSeccion($datos);
					$IdDescripcion = $nuevaDescripcion->nuevaDescripcion($datos,$IdSeccion);
					$IdATS = $nuevaATS->nuevaATS($datos,$IdSeccion);
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
			if(Auth::User()->Rol_Id == 7)
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
			if(Auth::User()->Rol_Id == 7)
			{
				$datos = Input::all();
				
				$nuevoItem = new Contenido();
				
				if($datos['IdTipoDeContenido'] == 1)
				{
					$IdItem = $nuevoItem->nuevoItem($datos);
					Session::flash('msg','Item registrado correctamente.');
					return Redirect::action('SIGController@editarTabla',array('IdSeccion'=>$datos['IdSeccion'],'IdATS'=>$datos['IdATS'],'TipoContenido'=>$datos['IdTipoDeContenido'],'area'=>$datos['AreaActual']));
				}
								
				
			}
			else
			{
				return Redirect::to('/SIG');
			}
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
		
	public function SIG_Direccion()
		{
			if(Auth::check())
			{
				return View::make('SIG.direccion');
			}
			else
			{
				return Redirect::to('/login');
			}
		}
	
	public function SIG_Tecnica()
		{
			if(Auth::check())
			{
				return View::make('SIG.tecnica');
			}
			else
			{
				return Redirect::to('/login');
			}
		}
	
	public function SIG_Posgrado()
		{
			if(Auth::check())
			{
				return View::make('SIG.posgrado');
			}
			else
			{
				return Redirect::to('/login');
			}
		}

	public function SIG_Vinculacion()
		{
			if(Auth::check())
			{
				return View::make('SIG.vinculacion');
			}
			else
			{
				return Redirect::to('/login');
			}
		}

	public function SIG_Administrativa()
		{
			if(Auth::check())
			{
				return View::make('SIG.administrativa');
			}
			else
			{
				return Redirect::to('/login');
			}
		}

	public function SIG_Sistemas()
		{
			if(Auth::check())
			{
				return View::make('SIG.sistemas');
			}
			else
			{
				return Redirect::to('/login');
			}
		}

}
?>