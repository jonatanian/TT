<?php 
	/**
	* 
	*/
	class CargoEntidad extends Eloquent
	{

		protected $table='CARGO_ENTIDAD';

		public $timestamps = false;
		
		public function nuevoCargoEntidad($inputs){
			
	    	DB::transaction(function () use ($inputs){
				$cargo = new CargoEntidad();
				$cargo ->NombreCargoEntidad = $inputs['CargoEntidad'];
				$cargo ->save();
				
	    	});
	    $Id = DB::table('cargo_entidad')->max('IdCargoEntidad');
		return $Id;
		}
	}
 ?>