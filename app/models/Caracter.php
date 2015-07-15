<?php 
	/**
	* 
	*/
	class Caracter extends Eloquent
	{

		protected $table='CARACTER';
		protected $fillable = array('IdCaracter', 'NombreCaracter');
		public $timestamps = false;

	}
?>