<?php

class OficiosSalientesController extends BaseController {
			
	public function oficialia_nuevoOficio()
		{
			$of = new OficioSaliente();
			$idOficio = $of->getIdOficio();
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			$dep_areas = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$entidades_externas = EntidadExterna::select('*')->orderBy('ApPaternoEntidad')->get();
			$cargos_entidades = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			$usuarios = Usuario::select('*')->orderBy('ApPaterno')->get();
			$oficiosEntrantes = OficioEntrante::select('*')->orderBy('IdOficioDependencia')->get();
			
			$dep = Request::get('DependenciaE');
			$a = Request::get('AreaE');
			$e = Request::get('EntidadE');
			$ce = Request::get('CargoEntidadE');
			return View::make('oficios.oficialia_salientes_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce,'OEs'=>$oficiosEntrantes,'idOficio' => $idOficio));
		}
		
	public function oficialia_nuevoOficio_registrar()
		{
			
			Input::flashOnly('IdOficio','DirigidoA','FechaEmision','FechaRecepcion','Asunto','IdOficioR','FechaLimiteR');
			
			$file = Input::file('DocPDF');
			if($file == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio')->withInput();
			}
			
			$fileExt = Input::file('DocPDF')->getClientOriginalExtension();
			if($fileExt != 'pdf' or $fileExt == NULL){
				Session::flash('msgf','Debe subir un archivo en formato PDF.');
				return Redirect::action('OficiosEntrantesController@oficialia_nuevoOficio')->withInput();
			}

			$url_docpdf = Hash::make($file->getClientOriginalName());
			$destinoPath = public_path().'\\oficios\\entrantes\\';
			$subir = $file->move($destinoPath,$url_docpdf.'.'.$file->guessExtension());
			$datos = Input::all();
			$correspondenciaSaliente = new Correspondencia();
			$oficio = new OficioSaliente();
			if($IdCorrespondencia = $correspondenciaSaliente->nuevaCorrespondenciaSaliente($datos,$subir)){
				$IdOficioE = $oficio->nuevoOficioSaliente($datos,$IdCorrespondencia);
				
				$Destinatario = EntidadExterna::where('IdEntidadExterna',$datos['Destinatario'])->first();
				
				if($Destinatario->DepArea_Cargo_Id != $datos['CargoDestinatario']){
					$upDestinatario = $Destinatario->updateCargo($datos);			
				}
				
				if($Destinatario->Dependencia_Area_Id == NULL){
					$DTA = new DependenciaTieneArea();
					$IdDepTieneArea = $DTA ->nuevaDependenciaTieneArea($datos);
					$AgregarArea = $Destinatario->updateArea($datos,$IdDepTieneArea);
				}
				else{					
					$DepTieneArea = DependenciaTieneArea::where('IdDependenciaTieneArea',$Destinatario->Dependencia_Area_Id)->first();
					if($DepTieneArea->DepArea_Id != $datos['AreaD']){
						$UpETA = $DepTieneArea->upDateETA($datos,$Destinatario->Dependencia_Area_Id);
					}
					if($DepTieneArea->Dependencia_Id != $datos['DependenciaD']){
						$UpDTA = $DepTieneArea->updateDependencia($datos,$DepTieneArea->IdDependenciaTieneArea);
					}
				}
				
				//$fecha = new DateTime();
				//$UTC = new UsuarioTurnaCorrespondencia();
				//$IdUTC = $UTC->turnarA(Auth::User()->IdUsuario,$IdCorrespondencia,$datos['DirigidoA'],1,$fecha);
				
				Session::flash('msg','Registro de oficio saliente realizado correctamente.');
				return Redirect::action('OficiosController@oficialia_salientes');
			}	
			else{
				Session::flash('msgf','Error al registrar nuevo oficio saliente.');
				return Redirect::action('OficiosController@oficialia_salientes');
			}
		}
	
}
?>