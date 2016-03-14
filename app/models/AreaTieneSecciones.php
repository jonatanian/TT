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
			$IdCount = DB::table('area_tiene_secciones')->where('Area_Id',$inputs['IdArea'])->max('Precedencia');
			if(!$IdCount)
			{
				$IdCount = 0;
			}
	    	DB::transaction(function () use ($inputs,$IdSeccion,$fecha,$IdCount){
				$newATS = new AreaTieneSecciones();
				$newATS -> Area_Id = $inputs['IdArea'];
				$newATS -> Secciones_Id = $IdSeccion;
				$newATS -> TipoDeContenido_Id = $inputs['set-contenido'];
				$newATS -> FechaCreacion = $fecha->format('Y-m-d');
				$newATS -> FechaEdicion = $fecha->format('Y-m-d');
				$newATS -> Precedencia = $IdCount + 1;
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
		return 1;
		}

		public function reordenarATS($IdArea, $IdSeccion)
		{
			$secciones = AreaTieneSecciones::where('Area_Id', $IdArea)->get();
			if(!$secciones)
			{
				return null;
			}
			$val = 1;
			foreach($secciones as $seccion) {
				$IdATS = $seccion->IdATS;
				DB::transaction(function () use ($IdATS, $val){
					$newATS = AreaTieneSecciones::where('IdATS',$IdATS)->first();
					$newATS -> Precedencia = $val;
					$newATS -> save();
			});
				$val = $val + 1;
			}
			return $val;
		}

		public function subirSeccion($IdArea,$IdSeccion)
		{
			$seccion = AreaTieneSecciones::where('Area_Id',$IdArea)->where('Secciones_Id',$IdSeccion)->first();
			if(!$seccion)
			{
				return null;
			}
			DB::transaction(function () use ($seccion, $IdArea, $IdSeccion){//Se le asigna nueva precedencia al anterior
				$newATS = AreaTieneSecciones::where('Area_Id',$IdArea)->where('Precedencia', $seccion->Precedencia - 1)->first();
				$newATS -> Precedencia = $seccion->Precedencia;
				$newATS -> save();
			});

			DB::transaction(function () use ($seccion, $IdArea, $IdSeccion){//Se le asigna nueva precedencia
				$newATS = AreaTieneSecciones::where('Area_Id',$IdArea)->where('Secciones_Id',$IdSeccion)->first();
				$newATS -> Precedencia = $seccion->Precedencia - 1;
				$newATS -> save();
			});
			return 1;
		}
	}

?>
