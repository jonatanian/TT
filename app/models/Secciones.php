<?php 
	/**
	* 
	*/
	class Secciones extends Eloquent
	{

		protected $table='SECCIONES';
		protected $primaryKey = 'IdSeccion';
		public $timestamps = false;
		protected $fillable = array('IdSeccion', 'NombreSeccion', 'DescripcionSeccion','FechaCreacion','FechaEdicion','CreadoPor','EditadoPor');
	}

?>