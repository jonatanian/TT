<?php 
	/**
	* 
	*/
	class Correspondencia extends Eloquent
	{

		protected $table='CORRESPONDENCIA';

		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');

		
	public function nuevaCorrespondencia($inputs, $subir){
	    	DB::transaction(function () use ($inputs, $subir){
				$correspondencia = new Correspondencia();
				$correspondencia->FechaEmision = $inputs['FechaEmision'];
				$correspondencia->FechaEntrega = $inputs['FechaRecepcion'];
				$correspondencia->Asunto = $inputs['Asunto'];
				//$correspondencia->RequiereRespuesta = $inputs['RequiereRespuesta'];
				$correspondencia->URLPDF = $subir;
				//$correspondencia->FechaLimiteR = $inputs['FechaLimiteR'];
				//$correspondencia->EnRespuestaA = $inputs['EnRespuestaA'];
				$correspondencia->Estatus_Id = 1;
				//$correspondencia->Prioridad_Id = $inputs['Prioridad_Id'];
				//$correspondencia->Caracter_Id = $inputs['Caracter_Id'];
				$correspondencia->save();
	    	});
			$id = DB::table('correspondencia')->max('IdCorrespondencia');
			return $id;
		}
	
	
	public function nuevaCorrespondenciaEntrante($inputs){
			DB::transaction(function () use ($inputs){
				$correspondencia = new Correspondencia();
				$correspondencia->FechaEmision = $inputs['FechaEmision'];
				$correspondencia->FechaEntrega = $inputs['FechaEntrega'];
				$correspondencia->Asunto = $inputs['Asunto'];
				//$correspondencia->RequiereRespuesta = $ReqResp;
				$correspondencia->URLPDF = null;//$inputs['DocPDF'];
				//$correspondencia->FechaLimiteR = $inputs['FechaLimiteR'];
				//$correspondencia->EnRespuestaA = $inputs['EnRespuestaA'];
				$correspondencia->Estatus_Id = 1;
				$correspondencia->Prioridad_Id = $inputs['Prioridad'];
				$correspondencia->Caracter_Id = $inputs['Caracter'];
				$correspondencia->save();
			});
			
			$Id = DB::table('correspondencia')->max('IdCorrespondencia');
			return $Id;
		}
	}
 ?>