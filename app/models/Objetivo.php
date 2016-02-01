<?php 
	/**
	* 
	*/
	class Objetivo extends Eloquent
	{

		protected $table='OBJETIVO';
		protected $primaryKey = 'IdObjetivo';
		public $timestamps = false;
		protected $fillable = array('IdObjetivo', 'Objetivo', 'FechaEdicion','EditadoPor');
		
	}

?>