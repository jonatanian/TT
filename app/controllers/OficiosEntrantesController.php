<?php

class OficiosEntrantesController extends BaseController {
			
	public function oficialia_nuevoOficio()
		{
			$dependencias = Dependencia::select('*')->orderBy('NombreDependencia')->get();
			$dep_areas = DependenciaArea::select('*')->orderBy('NombreDependenciaArea')->get();
			$entidades_externas = EntidadExterna::select('*')->orderBy('ApPaternoEntidad')->get();
			$cargos_entidades = CargoEntidad::select('*')->orderBy('NombreCargoEntidad')->get();
			$usuarios = Usuario::select('*')->orderBy('ApPaterno')->get();
			
			$dep = Request::get('DependenciaE');
			$a = Request::get('AreaE');
			$e = Request::get('EntidadE');
			$ce = Request::get('CargoEntidadE');
			return View::make('oficios.oficialia_recibidos_registro',array('dependencias'=>$dependencias,'dep_areas'=>$dep_areas,'entidades_externas'=>$entidades_externas,'cargos_entidades'=>$cargos_entidades,'usuarios'=>$usuarios, 'dep'=>$dep, 'a'=>$a,'e'=>$e,'ce'=>$ce));
		}
		
	public function oficialia_nuevoOficio_registrar()
		{
			$file = Input::file('DocPDF');
			$url_docpdf = Hash::make($file->getClientOriginalName());
			$destinoPath = public_path().'/oficios/entrantes/';
			$subir = $file->move($destinoPath,$url_docpdf.'.'.$file->guessExtension());
			
			$datos = Input::all();
			$correspondenciaEntrante = new Correspondencia();
			$oficio = new OficioEntrante();
			if($IdCorrespondencia = $correspondenciaEntrante->nuevaCorrespondenciaEntrante($datos,$subir)){
				$IdOficioE = $oficio->nuevoOficioEntrante($datos,$IdCorrespondencia);
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