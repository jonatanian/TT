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
	
		public function nuevoItem($inputs){
			$fecha = new DateTime();
	    	DB::transaction(function () use ($inputs,$fecha){
				$item = new Contenido();
				$item -> NombreODescripcion = $inputs['new-nombre'];
				$item -> AccionesOMetas = $inputs['set-descripcion'];
				$item -> FechaCreacion = $fecha->format('Y-m-d');
				$item -> FechaEdicion = $fecha->format('Y-m-d');
				$item -> ATS_Id = $inputs['IdATS'];
				$item -> CreadoPor = Auth::User()->IdUsuario;
				$item -> EditadoPor = Auth::User()->IdUsuario;
				$item -> save();
	    	});
	    	$Id = DB::table('Contenido')->max('IdContenido');
		return $Id;
		}
	}

?>