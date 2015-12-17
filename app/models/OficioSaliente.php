<?php 
	/**
	* 
	*/
	class OficioSaliente extends Eloquent
	{

		protected $table='oficio_saliente';
		protected $primaryKey = 'IdConsecutivo';
		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');
		
		public function nuevoOficioSaliente($inputs,$IdOficio){
			
	    	DB::transaction(function () use ($inputs,$IdOficio){
				$oficio = new OficioSaliente();
				$oficio->IdOficioSaliente = $inputs['IdOficio'];
				$oficio->Destinatario = $inputs['Destinatario'];
				$oficio->Correspondencia_Id = $IdOficio;
				$oficio->Usuario_Id = Auth::id();
				$oficio->Dependencia = $inputs['DependenciaE'];
				$oficio->AreaDestinada = $inputs['AreaE'];
				$oficio->save();
	    	});
			$Id = DB::table('oficio_saliente')->max('IdConsecutivo');
			//Inicialización de las observaciones
			DB::transaction(function () use ($inputs,$Id){
				$oficio = new OficioSaliente();
				$oficioObservacion = new Observaciones();
				$oficioObservacion->Oficio_Saliente_Id = $Id;
				$oficioObservacion->Observacion_Usuario_Id = $oficio->getIdRevisor($Id, $inputs['TipoDeOficio']);//Auth::id();
				$oficioObservacion->save();
	    	});
	    	$Id = DB::table('oficio_saliente')->max('IdConsecutivo');
		return $Id;
		}
		

		
		////////Obtiene el último id de correspondencia saliente////////
		public function getIdOficio(){
			$id = DB::table('oficio_saliente')->max('IdConsecutivo');//Regresa el último id
			$id = $id + 1;
			if($id){
				return 'CMPL/'.$id.'/2015';
			}
			else
				return 'CMPL/1/2015';
		}
		public function getAsunto($id){
			$correspondencia = DB::table('correspondencia')->where('IdCorrespondencia', '=', $id)->get();
			return $correspondencia;
		}

		public function getNombreRevisor($IdUsuario){
			$Usuario = Usuario::find($IdUsuario);
			if($Usuario)
				return $Usuario->getNombreCompletoPMN();
			else 
				return "-";
		}
		
		public function getCargoRevisor($IdUsuario){
			$Usuario = Usuario::find($IdUsuario);
			if($Usuario)
				return $Usuario->getNombreCargo();
			else 
				return "-";
		}
		
		public function getIdRevisor($IdOficio, $TipoDeOficio){
			$Usuarios = Usuario::all();
			$Usuario = Usuario::where('IdUsuario','=',Auth::id())->first();
			//////Usuarios del CMPL por área
			//////Privados
			if($TipoDeOficio==1){
				$Usuario = Usuario::where('Rol_Id', '=', 2)
							   ->first();
				return $Usuario->id();
			}
			if($Usuario->rol()==6 && $Usuario->area()==1){
				$Usuario = Usuario::where('Cargo_Id', '=', 1)
							   ->where('Area_Id', '=', 1)
							   ->first();
				return $Usuario->id();
			}
			if($Usuario->rol()==6 && $Usuario->area()==2){
				$Usuario = Usuario::where('Cargo_Id', '=', 4)
							   ->where('Area_Id', '=', 2)
							   ->first();
				return $Usuario->id();
			}
			if($Usuario->rol()==6 && $Usuario->area()==3){
				$Usuario = Usuario::where('Cargo_Id', '=', 4)
							   ->where('Area_Id', '=', 3)
							   ->first();
				return $Usuario->id();
			}
			if($Usuario->rol()==6 && $Usuario->area()==4){
				$Usuario = Usuario::where('Cargo_Id', '=', 4)
							   ->where('Area_Id', '=', 4)
							   ->first();
				return $Usuario->id();
			}
			if($Usuario->rol()==6 && $Usuario->area()==5){
				$Usuario = Usuario::where('Cargo_Id', '=', 5)
							   ->where('Area_Id', '=', 5)
							   ->first();
				return $Usuario->id();
			}
			if($Usuario->rol()==6 && $Usuario->area()==6){
				$Usuario = Usuario::where('Cargo_Id', '=', 5)
							   ->where('Area_Id', '=', 6)
							   ->first();
				return $Usuario->id();
			}
			if($Usuario->rol()==6 && $Usuario->area()==7){
				$Usuario = Usuario::where('Cargo_Id', '=', 5)
							   ->where('Area_Id', '=', 7)
							   ->first();
				return $Usuario->id();
			}
			if($Usuario->rol()==6 && $Usuario->area()==8){
				$Usuario = Usuario::where('Cargo_Id', '=', 5)
							   ->where('Area_Id', '=', 8)
							   ->first();
				return $Usuario->id();
			}
			/////////Procesos y Energía////////////
			if($Usuario->rol()==5 && $Usuario->area()==5){
				$Usuario = Usuario::where('Cargo_Id', '=', 4)
							   ->where('Area_Id', '=', 2)
							   ->first();
				return $Usuario->id();
			}
			if($Usuario->rol()==5 && $Usuario->area()==6){
				$Usuario = Usuario::where('Cargo_Id', '=', 4)
							   ->where('Area_Id', '=', 2)
							   ->first();
				return $Usuario->id();
			}
			/////////Jefes Directos////////////////
			//////Tecnica
			if($Usuario->rol()==4 && $Usuario->area()==2){
				$Usuario = Usuario::where('Rol_Id', '=', 2)
							   ->first();
				return $Usuario->id();
			}
			//////Posgrado
			if($Usuario->rol()==4 && $Usuario->area()==3){
				$Usuario = Usuario::where('Rol_Id', '=', 2)
							   ->first();
				return $Usuario->id();
			}
			//////Vinculación
			if($Usuario->rol()==4 && $Usuario->area()==4){
				$Usuario = Usuario::where('Rol_Id', '=', 2)
							   ->first();
				return $Usuario->id();
			}
			/////DSBD
			if($Usuario->rol()==1 && $Usuario->area()==8){
				$Usuario = Usuario::where('Rol_Id', '=', 2)
							   ->first();
				return $Usuario->id();
			}
			//////Dirección
			if($Usuario->rol()==3 && $Usuario->area()==1){
				$Usuario = Usuario::where('Rol_Id', '=', 2)
							   ->first();
				return $Usuario->id();
			}
			
			return null;
		}
	}
 ?>