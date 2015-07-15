<?php

class AdminController extends BaseController {

	public function dsbd_index()
		{
			return View::make('dsbd.dsbd_index');
		}

	public function oficialia_recibidos() //departamento de sistemas y banco de datos
		{
			$oficios= OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Entidad_Externa_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_recibidos',array('oficios'=>$oficios));
		}

	public function oficialia_enviados() //departamento de sistemas y banco de datos
		{
			$oficios= OficioSaliente::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','DirigidoA_Id','=','entidad_externa.IdEntidadExterna')
									->get();
			return View::make('oficios.oficialia_enviados', array('oficios' => $oficios));
		}

}
?>