<?php 
	/**
	* 
	*/
	class UsuarioTurnaCorrespondencia extends Eloquent
	{

		protected $table='USUARIO_TURNA_CORRESPONDENCIA';
		protected $primaryKey = 'IdUTC';
		
		public $timestamps = false;
		
		public function turnarA($IdUsuario,$IdCorrespondencia,$TurnadoA,$fecha){
			
	    	DB::transaction(function () use ($IdUsuario,$IdCorrespondencia,$TurnadoA,$fecha){
				$a = new UsuarioTurnaCorrespondencia();
				$a -> Usuario_Id = $IdUsuario;
				$a -> Correspondencia_Id = $IdCorrespondencia;
				$a -> UTC_TurnarA_Id = $TurnadoA;
				$a -> FechaTurnadoA = $fecha->format('Y-m-d');
				$a -> Activo = true;
				$a -> save();
				
	    	});
	    //$Id = DB::table('usuario_turna_correspondencia')->max('IdCargoEntidad');
		return true;
		}

	}
?>