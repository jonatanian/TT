<?php
	/**
	*
	*/
	class Secciones extends Eloquent
	{

		protected $table='SECCIONES';
		protected $primaryKey = 'IdSeccion';
		public $timestamps = false;
		protected $fillable = array('IdSeccion', 'NombreSeccion','FechaCreacion','FechaEdicion','CreadoPor','EditadoPor');

		public function nuevaSeccion($inputs){
			$fecha = new DateTime();
	    	DB::transaction(function () use ($inputs,$fecha){
				$section = new Secciones();
				$section -> NombreSeccion = $inputs['new-nombre'];
				$section -> FechaCreacion = $fecha->format('Y-m-d');
				$section -> FechaEdicion = $fecha->format('Y-m-d');
				$section -> CreadoPor = Auth::User()->IdUsuario;
				$section -> EditadoPor = Auth::User()->IdUsuario;
				$section -> save();
	    	});
	    	$Id = DB::table('secciones')->max('IdSeccion');
				return $Id;
		}

		public function actualizarSeccion($inputs){
			$fecha = new DateTime();
			DB::transaction(function () use ($inputs,$fecha){
			$section = Secciones::where('IdSeccion',$inputs['IdSeccion'])->first();
			$section -> NombreSeccion = $inputs['new-nombre'];
			$section -> FechaEdicion = $fecha->format('Y-m-d');
			$section -> EditadoPor = Auth::User()->IdUsuario;
			$section -> save();
			});
			$Id = DB::table('secciones')->max('IdSeccion');
			return $Id;
		}

		public function eliminarSeccion($IdSeccion){
			DB::transaction(function () use ($IdSeccion){
			$section = Secciones::where('IdSeccion',$IdSeccion)->first();
			$section -> delete();
			});
			return 1;
		}
	}
?>
