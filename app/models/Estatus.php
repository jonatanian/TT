<?php 
	/**
	* 
	*/
	class Estatus extends Eloquent
	{

		protected $table='ESTATUS';
		protected $primaryKey = 'IdEstatus';
		public $timestamps = false;
		protected $fillable = array('IdEstatus', 'NombreEstatus');

	}
?>