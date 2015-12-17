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

		
	}
 ?>