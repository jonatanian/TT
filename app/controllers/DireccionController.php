<?php

class DireccionController extends BaseController {

	public function direccion_index()
		{
			$correspondencia = Correspondencia::join('usuario_turna_correspondencia','IdCorrespondencia','=','usuario_turna_correspondencia.Correspondencia_Id')
											  ->join('usuario','usuario_turna_correspondencia.UTC_TurnarA_Id','=','usuario.IdUsuario')
											  ->join('oficio_entrante','correspondencia.IdCorrespondencia','=','oficio_entrante.Correspondencia_Id')
											  ->leftJoin('oficio_saliente','correspondencia.IdCorrespondencia','=','oficio_saliente.Correspondencia_Id')
											  ->leftJoin('memorandum','correspondencia.IdCorrespondencia','=','memorandum.Correspondencia_Id')
											  ->join('tipo','usuario_turna_correspondencia.Tipo_Id','=','tipo.IdTipo')
											  ->join('dependencia','oficio_entrante.DependenciaEmite','=','dependencia.IdDependencia')
											  ->join('estatus','correspondencia.Estatus_Id','=','estatus.IdEstatus')
											  ->orderBy('correspondencia.IdCorrespondencia','desc')
											  ->where('usuario_turna_correspondencia.UTC_TurnarA_Id',Auth::user()->IdUsuario)
											  ->get();
		
			return View::make('direccion.direccion_index',array('correspondencia'=>$correspondencia));
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