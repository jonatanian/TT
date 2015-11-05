<?php

class OficiosController extends BaseController {
		
	public function oficialia_recibidos()
		{
			$oficios= OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('dependencia','Dependencia_Id','=','Dependencia.IdDependencia')
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