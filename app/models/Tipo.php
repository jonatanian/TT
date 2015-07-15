<?php 
	/**
	* 
	*/
	class Tipo extends Eloquent
	{

		protected $table='TIPO';

		public $timestamps = false;
		protected $fillable = array('IdTipo', 'NombreTipo');

	}
?>