﻿<?php 
	/**
	* 
	*/
	class EntidadExterna extends Eloquent
	{

		protected $table='ENTIDAD_EXTERNA';
		protected $primaryKey = 'IdEntidadExterna';
		public $timestamps = false;
		
		public function nuevaEntidad($inputs,$cargo){
			
	    	DB::transaction(function () use ($inputs,$cargo){
				$dep = new EntidadExterna();
				$dep ->NombreEntidad = $inputs['NombreEntidad'];
				$dep ->ApPaternoEntidad = $inputs['ApPaternoE'];
				$dep ->ApMaternoEntidad = $inputs['ApMaternoE'];
				$dep ->DepArea_Cargo_Id = $cargo;
				$dep ->save();
				
	    	});
	    $Id = DB::table('entidad_externa')->max('IdEntidadExterna');
		return $Id;
		}
		
		public function updateCargo($inputs){
			DB::transaction(function () use ($inputs){
				$entidadE = EntidadExterna::find($inputs['Remitente']);
				$entidadE -> DepArea_Cargo_Id = $inputs['CargoEmisor'];
				$entidadE -> save();
			});
			
			return true;
		}
		
		public function updateArea($inputs){
			DB::transaction(function () use ($inputs){
				$entidadE = EntidadExterna::find($inputs['Remitente']);
				$entidadE -> Dependencia_Area_Id = $inputs['AreaE'];
				$entidadE -> save();
			});
			
			return true;
		}
		
		public function getNombreCompletoE()
		{
			return $this->NombreEntidad.' '.$this->ApPaternoEntidad.' '.$this->ApMaternoEntidad;
		}
		
		public function getNombreCompletoPMN()
	{
		return $this->ApPaternoEntidad.' '.$this->ApMaternoEntidad.' '.$this->NombreEntidad;
	}
	}
 ?>