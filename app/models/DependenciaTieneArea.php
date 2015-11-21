<?php 
	/**
	* 
	*/
	class DependenciaTieneArea extends Eloquent
	{

		protected $table='DEPENDENCIA_TIENE_AREA';
		protected $primaryKey = 'IdDependenciaTieneArea';
		public $timestamps = false;
		
		public function nuevaDependenciaTieneArea($inputs){
			
	    	DB::transaction(function () use ($inputs){
				$dep = new DependenciaTieneArea();
				$dep ->Dependencia_Id = $inputs['DependenciaE'];
				$dep ->DepArea_Id = $inputs['AreaE'];
				$dep ->save();
				
	    	});
	    
			$Id = DB::table('dependencia_tiene_area')->max('IdDependenciaTieneArea');
			return $Id;
		}
		
		public function updateETA($inputs,$id){
			DB::transaction(function () use ($inputs,$id){
				$EmisorTieneArea = DependenciaTieneArea::find($id);
				$EmisorTieneArea-> DepArea_Id = $inputs['AreaE'];
				$EmisorTieneArea-> save();
			});
			return true;
		}
		
		public function updateDependencia($inputs,$id){
			DB::transaction(function () use ($inputs,$id){
				$EmisorTieneArea = DependenciaTieneArea::find($id);
				$EmisorTieneArea-> Dependencia_Id = $inputs['DependenciaE'];
				$EmisorTieneArea-> save();
			});
			return true;
		}
		
	}
 ?>