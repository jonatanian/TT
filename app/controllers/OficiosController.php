<?php

class OficiosController extends BaseController {
		
	public function oficialia_recibidos()
		{
			/*$oficios= OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Emisor','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_tiene_area','entidad_externa.Dependencia_Area_Id','=','dependencia_tiene_area.IdDependenciaTieneArea')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->orderBy('oficio_entrante.IdOficioEntrante','desc')
									->get();*/
									
			$oficios= OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Emisor','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_area','AreaEmite','=','dependencia_area.IdDependenciaArea')
									->join('dependencia','DependenciaEmite','=','dependencia.IdDependencia')
									->orderBy('oficio_entrante.IdOficioEntrante','desc')
									->get();

			$estatus = Estatus::all();
			return View::make('oficios.oficialia_recibidos',array('oficios'=>$oficios,'estatus'=>$estatus));
		}

	public function oficialia_enviados()
		{
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Dependencia_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_enviados', array('oficios' => $oficios));
		}
		
}
?>