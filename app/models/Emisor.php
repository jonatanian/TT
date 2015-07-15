<?php 
	/**
	* 
	*/
	class Emisor extends Eloquent
	{

		protected $table='ENTIDAD_EXTERNA';

		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');

		
		public function nuevoEmisor($inputs,$IdDependencia){
			
	    	DB::transaction(function () use ($inputs,$IdDependencia){
				$e = new Emisor();
				$e ->NombreEntidad = $inputs['NombreEmisor'];
				$e ->CargoEntidad = $inputs['Cargo'];
				$e ->AreaEntidad = $inputs['AreaEmite'];
				$e ->Dependencia_Id = $IdDependencia;
				$e ->save();
				
	    	});
	    $Id = DB::table('entidad_externa')->max('IdEntidadExterna');
		return $Id;
		}
	}
 ?>