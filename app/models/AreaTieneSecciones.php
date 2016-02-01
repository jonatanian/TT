<?php 
	/**
	* 
	*/
	class AreaTieneSecciones extends Eloquent
	{

		protected $table='AREA_TIENE_SECCIONES';
		protected $primaryKey = 'IdATS';
		public $timestamps = false;
		protected $fillable = array('IdATS', 'Area_Id', 'Secciones_Id','TipoDeContenido_Id','NombreODescripcion','AccionesOMetas','FechaCreacion','FechaEdicion','Precedencia','CreadoPor','EditadoPor');
	}

?>