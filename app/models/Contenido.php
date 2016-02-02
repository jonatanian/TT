<?php 
	/**
	* 
	*/
	class Contenido extends Eloquent
	{

		protected $table='CONTENIDO';
		protected $primaryKey = 'IdContenido';
		public $timestamps = false;
		protected $fillable = array('IdContenido', 'NombreODescripcion', 'AccionesOMetas','FechaCreacion','FechaEdicion','ATS_Id','CreadoPor','EditadoPor');
	}

?>