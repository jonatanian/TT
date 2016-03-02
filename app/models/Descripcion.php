<?php
	/**
	*
	*/
	class Descripcion extends Eloquent
	{

		protected $table='DESCRIPCION';
		protected $primaryKey = 'IdDescripcion';
		public $timestamps = false;
		protected $fillable = array('IdDescripcion', 'Secciones_Id','SecDeArea','Descripcion','FechaCreacion','FechaEdicion','CreadoPor','EditadoPor');

		public function nuevaDescripcion($inputs,$IdSeccion){
			$fecha = new DateTime();
	    	DB::transaction(function () use ($inputs,$fecha,$IdSeccion){
				$description = new Descripcion();
				$description -> Secciones_Id = $IdSeccion;
				$description -> SecDeArea = $inputs['IdArea'];
				$description -> Descripcion = $inputs['set-descripcion'];
				$description -> FechaCreacion = $fecha->format('Y-m-d');
				$description -> FechaEdicion = $fecha->format('Y-m-d');
				$description -> CreadoPor = Auth::User()->IdUsuario;
				$description -> EditadoPor = Auth::User()->IdUsuario;
				$description -> save();
	    	});
	    	$Id = DB::table('secciones')->max('IdSeccion');
		return $Id;
		}

		public function actualizarDescripcion($inputs){
			$fecha = new DateTime();
	    	DB::transaction(function () use ($inputs,$fecha){
				$description = Descripcion::where('Secciones_Id',$inputs['IdSeccion'])->where('SecDeArea',$inputs['IdArea'])->first();
				$description -> Descripcion = $inputs['set-descripcion'];
				$description -> FechaEdicion = $fecha->format('Y-m-d');
				$description -> EditadoPor = Auth::User()->IdUsuario;
				$description -> save();
	    	});
	    	$Id = DB::table('secciones')->max('IdSeccion');
		return $Id;
		}

		public function eliminarDescripcion($IdArea, $IdSeccion){
				DB::transaction(function () use ($IdArea,$IdSeccion){
				$description = Descripcion::where('Secciones_Id',$IdSeccion)->where('SecDeArea',$IdArea)->first();
				$description -> delete();
				});
				$Id = DB::table('secciones')->max('IdSeccion');
		return $Id;
		}
	}
?>
