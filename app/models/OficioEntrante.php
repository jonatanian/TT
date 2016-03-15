<?php 
	/**
	* 
	*/
	class OficioEntrante extends Eloquent
	{

		protected $table='OFICIO_ENTRANTE';
		protected $primaryKey = 'IdOficioEntrante';
		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');

		
		public function nuevoOficioEntrante($inputs,$IdOficio,$dirigidoA){
			
	    	DB::transaction(function () use ($inputs,$IdOficio,$dirigidoA){
				$oficio = new OficioEntrante();
				$oficio->IdOficioDependencia = $inputs['IdOficio'];
				$oficio->DirigidoA = $inputs['DirigidoA'];
				$oficio->CargoDirigidoA_Id = $dirigidoA->Cargo_Id;
				$oficio->AreaRecibe_Id = $dirigidoA->Area_Id;
				$oficio->Correspondencia_Id = $IdOficio;
				$oficio->Emisor = $inputs['Remitente'];
				$oficio->CargoEmisor_Id = $inputs['CargoEmisor'];
				$oficio->AreaEmite = $inputs['AreaE'];
				$oficio->DependenciaEmite = $inputs['DependenciaE'];
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