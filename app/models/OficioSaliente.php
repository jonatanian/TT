<?php 
	/**
	* 
	*/
	class OficioSaliente extends Eloquent
	{

		protected $table='oficio_saliente';

		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');

		
		public function nuevoOficioSaliente($inputs){
			
	    	DB::transaction(function () use ($inputs){
				$oficio = new OficioSaliente();
				$oficio->IdOficioSaliente = $oficio->getIdOficio();
				$oficio->Correspondencia_Id = $inputs['Correspondencia_Id'];
				$oficio->Usuario_Id = $inputs['Usuario_Id'];
				$oficio->URLAcuse = null;
				$oficio->FechaAcuse = null;
				$oficio->Dependencia_Id = $inputs['Dependencia_Id'];
				$oficio->save();
	    	});
			$id = DB::table('oficio_saliente')->max('IdConsecutivo');
		return $id;
		}
		////////Obtiene el último id de correspondencia saliente////////
		public function getIdOficio(){
			$id = DB::table('oficio_saliente')->max('IdConsecutivo');//Regresa el último id
			$id = $id + 1;
			if($id){
				return 'CMPL/'.$id.'/2015';
			}
			else
				return 'CMPL/1/2015';
		}
		public function getAsunto($id){
			$correspondencia = DB::table('correspondencia')->where('IdCorrespondencia', '=', $id)->get();
			return $correspondencia;
		}
	}
 ?>