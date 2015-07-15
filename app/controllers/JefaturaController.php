<?php

class JefaturaController extends BaseController {

/*public function oficialia_index()
		{
			$roles = Rol::all();
			return View::make('oficialia.oficialia_index',array('roles'=>$roles));
		}*/

	public function jefatura_index()
		{
			return View::make('jefatura.jefatura_index');
		}

	public function oficialia_recibidos()
		{
			$oficios= OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Entidad_Externa_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_recibidos',array('oficios'=>$oficios));
		}

	public function oficialia_enviados()
		{
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','DirigidoA_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_enviados', array('oficios' => $oficios));
		}
}
?>