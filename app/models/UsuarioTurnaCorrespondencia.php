<?php 
	/**
	* 
	*/
	class UsuarioTurnaCorrespondencia extends Eloquent
	{

		protected $table='USUARIO_TURNA_CORRESPONDENCIA';
		protected $primaryKey = 'Usuario_Id,Correspondencia_Id,UTC_TurnarA_Id';
		
		public $timestamps = false;
		
		public function turnarA($IdUsuario,$IdCorrespondencia,$TurnadoA,$tipo,$fecha){
			
	    	DB::transaction(function () use ($IdUsuario,$IdCorrespondencia,$TurnadoA,$tipo,$fecha){
				$a = new UsuarioTurnaCorrespondencia();
				$a -> Usuario_Id = $IdUsuario;
				$a -> Correspondencia_Id = $IdCorrespondencia;
				$a -> UTC_TurnarA_Id = $TurnadoA;
				$a -> FechaTurnadoA = $fecha->format('Y-m-d');
				$a -> Tipo_Id = $tipo;
				$a -> save();
				
	    	});
	    //$Id = DB::table('usuario_turna_correspondencia')->max('IdCargoEntidad');
		return true;
		}

	}
?>