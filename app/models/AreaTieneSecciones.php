<?php
	/**
	*
	*/
	class AreaTieneSecciones extends Eloquent
	{
		protected $table='AREA_TIENE_SECCIONES';
		protected $primaryKey = 'IdATS';
		public $timestamps = false;
		protected $fillable = array('IdATS', 'Area_Id', 'Secciones_Id','TipoDeContenido_Id','FechaCreacion','FechaEdicion','Precedencia','CreadoPor','EditadoPor');

		public function nuevaATS($inputs,$IdSeccion){
			$fecha = new DateTime();
	    	DB::transaction(function () use ($inputs,$IdSeccion,$fecha){
				$newATS = new AreaTieneSecciones();
				$newATS -> Area_Id = $inputs['IdArea'];
				$newATS -> Secciones_Id = $IdSeccion;
				$newATS -> TipoDeContenido_Id = $inputs['set-contenido'];
				$newATS -> FechaCreacion = $fecha->format('Y-m-d');
				$newATS -> FechaEdicion = $fecha->format('Y-m-d');
				$newATS -> Precedencia = 1;
				$newATS -> CreadoPor = Auth::User()->IdUsuario;
				$newATS -> EditadoPor = Auth::User()->IdUsuario;
				$newATS -> save();
	    	});
	    	$Id = DB::table('area_tiene_secciones')->max('IdATS');
		return $Id;
		}

		public function eliminarATS($IdATS){
	    	DB::transaction(function () use ($IdATS){
				$newATS = AreaTieneSecciones::where('IdATS',$IdATS)->first();
				$newATS -> delete();
	    	});
	    	$Id = DB::table('area_tiene_secciones')->max('IdATS');
		return $Id;
		}
	}

?>
