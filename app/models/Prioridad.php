<?php 
	/**
	* 
	*/
	class Prioridad extends Eloquent
	{

		protected $table='PRIORIDAD';
		protected $primaryKey = 'IdPrioridad';
		public $timestamps = false;
		protected $fillable = array('IdPrioridad', 'NombrePrioridad');

	}
?>