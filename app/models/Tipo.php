<?php 
	/**
	* 
	*/
	class Tipo extends Eloquent
	{

		protected $table='TIPO';
		protected $primaryKey = 'IdTipo';
		public $timestamps = false;
		protected $fillable = array('IdTipo', 'NombreTipo');

	}
?>