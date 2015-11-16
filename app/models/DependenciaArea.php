<?php 
	/**
	* 
	*/
	class DependenciaArea extends Eloquent
	{

		protected $table='DEPENDENCIA_AREA';

		public $timestamps = false;
		
		public function nuevaArea($inputs){
			
	    	DB::transaction(function () use ($inputs){
				$dep = new DependenciaArea();
				$dep ->NombreDependenciaArea = $inputs['AreaE'];
				$dep ->save();
				
	    	});
	    $Id = DB::table('dependencia_area')->max('IdDependenciaArea');
		return $Id;
		}

	}
 ?>