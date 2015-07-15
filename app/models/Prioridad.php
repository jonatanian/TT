<?php 
	/**
	* 
	*/
	class Prioridad extends Eloquent
	{

		protected $table='PRIORIDAD';

		public $timestamps = false;
		protected $fillable = array('IdPrioridad', 'NombrePrioridad');

	}
?>