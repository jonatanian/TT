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

		public function nuevoItem($inputs,$urlArchivo,$Ext){
			$fecha = new DateTime();
	    	DB::transaction(function () use ($inputs,$fecha,$urlArchivo,$Ext){
				$item = new Contenido();
				$item -> NombreODescripcion = $inputs['new-nombre'];
				if($inputs['IdTipoDeContenido'] == 1)
				{
					$item -> AccionesOMetas = $inputs['set-descripcion'];
				}
				else
				{
					$item -> AccionesOMetas = $urlArchivo;
					$item -> ExtensionDoc = $Ext;
				}
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

		public function eliminarItem($IdContenido){
	    	DB::transaction(function () use ($IdContenido){
				$item = Contenido::where('IdContenido',$IdContenido)->first();
				$item -> delete();
	    	});
		return 1;
		}
	}

?>
