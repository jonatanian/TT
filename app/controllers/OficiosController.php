<?php

class OficiosController extends BaseController {
		
	public function oficialia_recibidos()
		{
			$oficios= OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Emisor','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_area','entidad_externa.Dependencia_Area_Id','=','dependencia_area.IdDependenciaArea')
									->join('dependencia_tiene_area','dependencia_area.IdDependenciaArea','=','dependencia_tiene_area.DepArea_Id')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
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