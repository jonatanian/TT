<?php

class OficiosController extends BaseController {
		
	public function oficialia_recibidos()
		{
			$oficios= OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Emisor','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_area','AreaEmite','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','DependenciaEmite','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('usuario_turna_correspondencia','correspondencia.IdCorrespondencia','=','usuario_turna_correspondencia.Correspondencia_Id')
									->join('usuario','usuario_turna_correspondencia.UTC_TurnarA_Id','=','usuario.IdUsuario')
									//->where('usuario.IdUsuario','usuario_turna_correspondencia.UTC_TurnarA_Id')
									->orderBy('oficio_entrante.IdOficioEntrante','desc')
									->get();

			$estatus = Estatus::all();
			$dependencias = Dependencia::all();
			return View::make('oficios.oficialia_recibidos',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
		}


	public function oficialia_salientes()
		{
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->orderBy('oficio_saliente.IdOficioSaliente','desc')
									->get();;
			$dependencias = Dependencia::all();
			$estatus = Estatus::all();
			return View::make('oficios.oficialia_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias, 'dependenciaFiltro'=>0));
		}	
		
	public function dsbd_salientes()
		{
			$IdUsuario = Auth::id();
			$Usuario = Usuario::where('IdUsuario','=',$IdUsuario)->first();
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->orderBy('oficio_saliente.IdOficioSaliente','desc')->where('Area_Id','=',$Usuario->area(Auth::id()))
									->get();
			$dependencias = Dependencia::all();
			$estatus = Estatus::all();
			return View::make('oficios.dsbd_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
		}
		
	public function direccion_salientes()
		{
			$IdUsuario = Auth::id();
			$Usuario = Usuario::where('IdUsuario','=',$IdUsuario)->first();
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->orderBy('oficio_saliente.IdOficioSaliente','desc')->where('Area_Id','=',$Usuario->area(Auth::id()))
									->get();;
			$dependencias = Dependencia::all();
			$estatus = Estatus::all();
			return View::make('oficios.direccion_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
		}
		
	public function subdireccion_salientes()
		{
			$IdUsuario = Auth::id();
			$Usuario = Usuario::where('IdUsuario','=',Auth::id())->first();
			if($Usuario->area()==2){
				$Usuario = Usuario::where('IdUsuario','=',$IdUsuario)->first();
				$oficios = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
										->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
										->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
										->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
										->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
										->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
										->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
										->orderBy('oficio_saliente.IdOficioSaliente','desc')->where('Area_Id','=',2)->orWhere('Area_Id','=',5)->orWhere('Area_Id','=',6)
										->get();;
				$dependencias = Dependencia::all();
				$estatus = Estatus::all();
				return View::make('oficios.subdireccion_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
			}	
			else{
				$Usuario = Usuario::where('IdUsuario','=',$IdUsuario)->first();
				$oficios = OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
										->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
										->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
										->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
										->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
										->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
										->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
										->orderBy('oficio_saliente.IdOficioSaliente','desc')->where('Area_Id','=',$Usuario->area(Auth::id()))
										->get();;
				$dependencias = Dependencia::all();
				$estatus = Estatus::all();
				return View::make('oficios.subdireccion_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
			}
		}
		
	public function jefatura_salientes()
		{
			$IdUsuario = Auth::id();
			$Usuario = Usuario::where('IdUsuario','=',$IdUsuario)->first();
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->orderBy('oficio_saliente.IdOficioSaliente','desc')->where('Area_Id','=',$Usuario->area(Auth::id()))
									->get();;
			$dependencias = Dependencia::all();
			$estatus = Estatus::all();
			return View::make('oficios.jefatura_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
		}
	
	public function iescmpl_salientes()
		{
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Destinatario','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
									->join('observaciones','observaciones.Oficio_Saliente_Id','=','Oficio_Saliente.IdConsecutivo')
									->join('usuario','Oficio_Saliente.Usuario_Id','=','Usuario.IdUsuario')
									->orderBy('oficio_saliente.IdOficioSaliente','desc')->where('Usuario_Id','=',Auth::id())
									->get();;
			$dependencias = Dependencia::all();
			$estatus = Estatus::all();
			return View::make('oficios.iescmpl_salientes',array('oficios'=>$oficios,'estatus'=>$estatus,'dependencias'=>$dependencias));
		}
}
?>