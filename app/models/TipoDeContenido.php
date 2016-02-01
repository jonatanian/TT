<?php 
	/**
	* 
	*/
	class TipoDeContenido extends Eloquent
	{

		protected $table='TIPODECONTENIDO';
		protected $primaryKey = 'IdTipoDeContenido';
		public $timestamps = false;
		protected $fillable = array('IdTipoDeContenido', 'NombreContenido');
	}

?>