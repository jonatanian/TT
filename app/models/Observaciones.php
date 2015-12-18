<?php 
	/**
	* 
	*/
	class Observaciones extends Eloquent
	{

		protected $table='OBSERVACIONES';
		protected $primaryKey = 'IdObservaciones';
		public $timestamps = false;
		protected $fillable = array('IdObservaciones', 'Oficio_Saliente_Id', 'DescripcionObservaciones','VistoBueno','Observaciones_Usuario_Id');

		public function nuevaObservacion($inputs){
			DB::transaction(function () use ($inputs){
					$oficioU =Observaciones::find($inputs['IdObservaciones']);
					$oficioU->Oficio_Saliente_Id = $inputs['IdConsecutivo'];
					$oficioU->Observacion_Usuario_Id = $inputs['IdRevisor'];//Usuario que va a corregir
					$oficioU->DescripcionObservaciones = $inputs['Observacion'];
					$oficioU->save();
				});
			DB::transaction(function () use ($inputs){
					$oficioU = Correspondencia::find($inputs['IdCorrespondencia']);
					$oficioU->Estatus_Id = 403;
					$oficioU->save();
				});
			//
		}
		
		public function nuevaCorreccionObservacion($inputs){
			$Correspondencia = Correspondencia::find($inputs['IdCorrespondencia']);
			if($Correspondencia->getIdCaracter()==1)
			{
				DB::transaction(function () use ($inputs){
						$oficio = new OficioSaliente();
						$oficioU =Observaciones::find($inputs['IdObservaciones']);
						$oficioU->Oficio_Saliente_Id = $inputs['IdConsecutivo'];
						$oficioU->Observacion_Usuario_Id = $oficio->getIdRevisor($inputs['IdConsecutivo'], 1);//Usuario que va a corregir
						$oficioU->DescripcionObservaciones = $inputs['Observacion'];
						$oficioU->save();
					});
			}
			else{
				DB::transaction(function () use ($inputs){
					$oficio = new OficioSaliente();
					$oficioU =Observaciones::find($inputs['IdObservaciones']);
					$oficioU->Oficio_Saliente_Id = $inputs['IdConsecutivo'];
					$oficioU->Observacion_Usuario_Id = $oficio->getIdRevisor($inputs['IdConsecutivo'], $Correspondencia->getIdCaracter());//Usuario que va a corregir
					$oficioU->DescripcionObservaciones = $inputs['Observacion'];
					$oficioU->save();
				});
			}
			/*DB::transaction(function () use ($inputs, $path){
					$oficioU = Correspondencia::find($inputs['IdCorrespondencia']);
					$oficioU->URLPDF = $path;
					$oficioU->save();
				});*/
			
			DB::transaction(function () use ($inputs){
					$oficioU = Correspondencia::find($inputs['IdCorrespondencia']);
					$oficioU->Estatus_Id = 401;
					$oficioU->save();
				});
		}
		
		public function getObservacion(){
			return $this->DescripcionObservaciones;
		}
		
	}
 ?>