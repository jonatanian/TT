<?php 
	/**
	* 
	*/
	class Estatus extends Eloquent
	{

		protected $table='ESTATUS';

		public $timestamps = false;
		protected $fillable = array('IdEstatus', 'NombreEstatus');

	}
?>