﻿<?php 
	/**
	* 
	*/
	class Correspondencia extends Eloquent
	{

		protected $table='CORRESPONDENCIA';
		protected $primaryKey = 'IdCorrespondencia';
		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');
	
	public function nuevaCorrespondenciaEntrante($inputs,$subir){
			DB::transaction(function () use ($inputs, $subir){
				$correspondencia = new Correspondencia();
				$correspondencia->FechaEmision = $inputs['FechaEmision'];
				$correspondencia->FechaEntrega = $inputs['FechaRecepcion'];
				$correspondencia->Asunto = $inputs['Asunto'];
				$correspondencia->URLPDF = $subir;
				$correspondencia->Estatus_Id = 101;
				$correspondencia->Prioridad_Id = $inputs['PrioridadOE'];
				$correspondencia->Caracter_Id = $inputs['TipoDeOficio'];
				
				if($inputs['IdOficioR'] != 0)
				{
					$correspondencia->EnRespuestaA = $inputs['IdOficioR'];
				}
				if($inputs['FechaLimiteR'] != NULL)
				{
					$correspondencia->FechaLimiteR = $inputs['FechaLimiteR'];
					$correspondencia->RequiereRespuesta = true;
				}
				else
				{
					$correspondencia->RequiereRespuesta = false;
				}
				$correspondencia->save();
			});
			
			$Id = DB::table('correspondencia')->max('IdCorrespondencia');
			return $Id;
		}
		
	public function nuevaCorrespondenciaSaliente($inputs, $subir){
			DB::transaction(function () use ($inputs, $subir){
				$correspondencia = new Correspondencia();
				$correspondencia->FechaEmision = $inputs['FechaEmision'];
				$correspondencia->FechaEntrega = $inputs['FechaRecepcion'];
				$correspondencia->Asunto = $inputs['Asunto'];
				$correspondencia->URLPDF = $subir;
				$correspondencia->Estatus_Id = 401;
				$correspondencia->Prioridad_Id = $inputs['PrioridadOE'];
				$correspondencia->Caracter_Id = $inputs['TipoDeOficio'];
				
				if($inputs['FechaLimiteR'] != NULL)
				{
					$correspondencia->FechaLimiteR = $inputs['FechaLimiteR'];
					$correspondencia->RequiereRespuesta = true;
				}
				else
				{
					$correspondencia->RequiereRespuesta = false;
				}
				$correspondencia->save();
			});
			
			$Id = DB::table('correspondencia')->max('IdCorrespondencia');
			return $Id;
		}
	
	
		public function nuevaCorrespondenciaSalienteRespuesta($inputs, $subir){
			DB::transaction(function () use ($inputs, $subir){
				$correspondencia = new Correspondencia();
				$correspondencia->FechaEmision = $inputs['FechaEmision'];
				$correspondencia->FechaEntrega = $inputs['FechaRecepcion'];
				$correspondencia->Asunto = $inputs['Asunto'];
				$correspondencia->URLPDF = $subir;
				$correspondencia->Estatus_Id = 501;
				$correspondencia->Prioridad_Id = $inputs['PrioridadOE'];
				$correspondencia->Caracter_Id = $inputs['TipoDeOficio'];
				
				if($inputs['FechaLimiteR'] != NULL)
				{
					$correspondencia->FechaLimiteR = $inputs['FechaLimiteR'];
					$correspondencia->RequiereRespuesta = true;
				}
				else
				{
					$correspondencia->RequiereRespuesta = false;
				}
				$correspondencia->save();
			});
			
			$Id = DB::table('correspondencia')->max('IdCorrespondencia');
			return $Id;
		}
	
	
		public function nuevaCorrespondenciaSalientePrivado($inputs, $subir){
			DB::transaction(function () use ($inputs, $subir){
				$correspondencia = new Correspondencia();
				$correspondencia->FechaEmision = $inputs['FechaEmision'];
				$correspondencia->FechaEntrega = $inputs['FechaRecepcion'];
				$correspondencia->Asunto = $inputs['Asunto'];
				$correspondencia->URLPDF = $subir;
				$correspondencia->Estatus_Id = 601;
				$correspondencia->Prioridad_Id = $inputs['PrioridadOE'];
				$correspondencia->Caracter_Id = $inputs['TipoDeOficio'];
				
				if($inputs['FechaLimiteR'] != NULL)
				{
					$correspondencia->FechaLimiteR = $inputs['FechaLimiteR'];
					$correspondencia->RequiereRespuesta = true;
				}
				else
				{
					$correspondencia->RequiereRespuesta = false;
				}
				$correspondencia->save();
			});
			
			$Id = DB::table('correspondencia')->max('IdCorrespondencia');
			return $Id;
		}
		
			public function nuevaCorrespondenciaSalienteRespuestaPrivado($inputs, $subir){
			DB::transaction(function () use ($inputs, $subir){
				$correspondencia = new Correspondencia();
				$correspondencia->FechaEmision = $inputs['FechaEmision'];
				$correspondencia->FechaEntrega = $inputs['FechaRecepcion'];
				$correspondencia->Asunto = $inputs['Asunto'];
				$correspondencia->URLPDF = $subir;
				$correspondencia->Estatus_Id = 701;
				$correspondencia->Prioridad_Id = $inputs['PrioridadOE'];
				$correspondencia->Caracter_Id = $inputs['TipoDeOficio'];
				
				if($inputs['FechaLimiteR'] != NULL)
				{
					$correspondencia->FechaLimiteR = $inputs['FechaLimiteR'];
					$correspondencia->RequiereRespuesta = true;
				}
				else
				{
					$correspondencia->RequiereRespuesta = false;
				}
				$correspondencia->save();
			});
			
			$Id = DB::table('correspondencia')->max('IdCorrespondencia');
			return $Id;
		}
	}
	
	
 ?>