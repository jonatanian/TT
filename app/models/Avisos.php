<?php
	/**
	*
	*/
	class Avisos extends Eloquent
	{

		protected $table='AVISOS';
		protected $primaryKey = 'idAviso';
		public $timestamps = false;
		protected $fillable = array('idAviso', 'aviso', 'fecha','titulo');

		public function getAviso()
		{
			return this.aviso;
		}

		public function getFecha()
		{
			return this.fecha;
		}
		public function getTitulo()
		{
			return this.aviso;
		}
		public function getUsuario($idUsuario)
		{
			$usuario = Usuario::find($idUsuario);
			return $usuario->getNombreCompleto();
		}

		public function getCargoUsuario($idUsuario)
		{
			$usuario = Usuario::find($idUsuario);
			return $usuario->getNombreCargo();
		}

		public function crearAviso($inputs){
			$time = getdate();
			$fecha = $time['year'].'-'.$time['mon'].'-'.$time['mday'];
	    	DB::transaction(function () use ($inputs, $fecha){

			    $aviso = new Avisos();
			    $aviso->titulo = $inputs['titulo'];
			    $aviso->aviso = $inputs['aviso'];
			    $aviso->fecha = $fecha;
			    $aviso->usuario_id = Auth::id();
					$aviso->prioridad = $inputs['prioridad'];

			    $aviso->save();
	    	});

	    	return true;
	    }

			public function updateAviso($inputs){
		    	DB::transaction(function () use ($inputs){

						$aviso = new Avisos();
				    $aviso = Avisos::find($inputs['idAviso']);
				    $aviso->titulo = $inputs['titulo'];
				    $aviso->aviso = $inputs['aviso'];
						$aviso->prioridad = $inputs['prioridad'];

				    $aviso->save();
		    	});

		    	return true;
		    }
	}
?>
