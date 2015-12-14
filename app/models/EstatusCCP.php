<?php 
	/**
	* 
	*/
	class EstatusCCP extends Eloquent
	{

		protected $table='ESTATUS_CCP';
		protected $primaryKey = 'IdEstatusCCP';
		public $timestamps = false;
		protected $fillable = array('IdEstatus', 'NombreEstatusCPP');

	}
?>