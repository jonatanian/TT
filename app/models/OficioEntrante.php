<?php 
	/**
	* 
	*/
	class OficioEntrante extends Eloquent
	{

		protected $table='OFICIO_ENTRANTE';

		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');

		
		public function nuevoOficioEntrante($inputs,$IdOficio){
			
	    	DB::transaction(function () use ($inputs,$IdOficio){
				$oficio = new OficioEntrante();
				$oficio->IdOficioDependencia = $inputs['IdOficio'];
				$oficio->DirigidoA = $inputs['DirigidoA'];
				$oficio->Correspondencia_Id = $IdOficio;
				$oficio->Emisor = $inputs['Remitente'];
				$oficio->save();
	    	});
	    	$Id = DB::table('oficio_entrante')->max('IdOficioEntrante');
		return $Id;
		}
		////////Obtiene el último id de correspondencia saliente////////
		public function getIdOficio(){
			$id = OficioSaliente::all();
			var_dump($id->last());
			return $id->IdConsecutivo;
		}
	}
 ?>