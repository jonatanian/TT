<?php 
	/**
	* 
	*/
	class Caracter extends Eloquent
	{

		protected $table='CARACTER';
		protected $primaryKey = 'IdCaracter';
		protected $fillable = array('IdCaracter', 'NombreCaracter');
		public $timestamps = false;

	}
?>