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