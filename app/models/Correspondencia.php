<?php 
	/**
	* 
	*/
	class Correspondencia extends Eloquent
	{

		protected $table='CORRESPONDENCIA';

		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');
	
	public function nuevaCorrespondenciaEntrante($inputs, $subir){
			DB::transaction(function () use ($inputs, $subir){
				$correspondencia = new Correspondencia();
				//$correspondencia->FechaEmision = $inputs['FechaEmision'];
				//$correspondencia->FechaEntrega = $inputs['FechaRecepcion'];
				//$correspondencia->Asunto = $inputs['Asunto'];
				//$correspondencia->RequiereRespuesta = $inputs['RequiereRespuesta'];
				//$correspondencia->URLPDF = $subir;
				//$correspondencia->FechaLimiteR = $inputs['FechaLimiteR'];
				//$correspondencia->EnRespuestaA = $inputs['EnRespuestaA'];
				$correspondencia->Estatus_Id = 1;
				//$correspondencia->Prioridad_Id = $inputs['Prioridad_Id'];
				//$correspondencia->Caracter_Id = $inputs['Caracter_Id'];
				$correspondencia->save();
			});
			
			$Id = DB::table('correspondencia')->max('IdCorrespondencia');
			return $Id;
		}
	}
 ?>