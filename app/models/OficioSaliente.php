<?php 
	/**
	* 
	*/
	class OficioSaliente extends Eloquent
	{

		protected $table='oficio_saliente';
		protected $primaryKey = 'IdConsecutivo';
		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');
		
		public function nuevoOficioSaliente($inputs,$IdOficio){
			
	    	DB::transaction(function () use ($inputs,$IdOficio){
				$oficio = new OficioSaliente();
				$oficio->IdOficioSaliente = $inputs['IdOficio'];
				$oficio->Destinatario = $inputs['Destinatario'];
				$oficio->Correspondencia_Id = $IdOficio;
				$oficio->Usuario_Id = Auth::id();
				$oficio->Dependencia = $inputs['DependenciaE'];
				$oficio->AreaDestinada = $inputs['AreaE'];
				$oficio->save();
	    	});
	    	$Id = DB::table('oficio_entrante')->max('IdOficioEntrante');
		return $Id;
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