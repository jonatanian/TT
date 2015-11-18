<?php 
	/**
	* 
	*/
	class DependenciaTieneArea extends Eloquent
	{

		protected $table='DEPENDENCIA_TIENE_AREA';
		protected $primaryKey = 'Dependencia_Id,DepArea_Id';
		public $timestamps = false;
		
		public function nuevaDependenciaTieneArea($IdDepArea,$IdDep){
			
	    	DB::transaction(function () use ($IdDepArea,$IdDep){
				$dep = new DependenciaTieneArea();
				$dep ->Dependencia_Id = $IdDep;
				$dep ->DepArea_Id = $IdDepArea;
				$dep ->save();
				
	    	});
	    
		return true;
		}
	}
 ?>