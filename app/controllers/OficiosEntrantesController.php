<?php

class OficiosEntrantesController extends BaseController {
			
	public function oficialia_nuevoOficio()
		{
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
			return View::make('oficios.oficialia_recibidos_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce,'OEs'=>$oficiosEntrantes));
		}
		
	public function oficialia_nuevoOficio_registrar()
		{
			/*$file = Input::file('DocPDF');
			$url_docpdf = Hash::make($file->getClientOriginalName());
			$destinoPath = public_path().'\\oficios\\entrantes\\';
			$subir = $file->move($destinoPath,$url_docpdf.'.'.$file->guessExtension());*/
			$subir = 1;
			$datos = Input::all();
			$correspondenciaEntrante = new Correspondencia();
			$oficio = new OficioEntrante();
			if($IdCorrespondencia = $correspondenciaEntrante->nuevaCorrespondenciaEntrante($datos,$subir)){
				$IdOficioE = $oficio->nuevoOficioEntrante($datos,$IdCorrespondencia);
				
				$Emisor = EntidadExterna::find($datos['Remitente'])->first();
				if($Emisor->DepArea_Cargo_Id != $datos['CargoEmisor']){
					$upEmisor = $Emisor->updateCargo($datos);			
				}
				if($Emisor->Dependencia_Area_Id != $datos['AreaE']){
					$UpEmisor = $Emisor->updateArea($datos);
				}
				/*$EmisorDependencia = EntidadExterna::join()
				
				Dependencia_Area_Id
				OficioEntrante::join('correspondencia','Correspondencia_Id','=','Correspondencia.IdCorrespondencia')
									->join('entidad_externa','Emisor','=','Entidad_Externa.IdEntidadExterna')
									->join('dependencia_area','entidad_externa.Dependencia_Area_Id','=','dependencia_area.IdDependenciaArea')
									->join('dependencia_tiene_area','dependencia_area.IdDependenciaArea','=','dependencia_tiene_area.DepArea_Id')
									->join('dependencia','dependencia_tiene_area.Dependencia_Id','=','dependencia.IdDependencia')
									->get();*/
				Session::flash('msg','Registro de oficio entrante realizado correctamente.');
				return Redirect::action('OficiosController@oficialia_recibidos');
			}	
			else{
				Session::flash('msgf','Error al registrar nuevo oficio entrante.');
				return Redirect::action('OficiosController@oficialia_recibidos');
			}
		}
	
}
?>