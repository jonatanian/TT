<?php

class CorrespondenciaController extends BaseController {

	public function turnar_a()
		{
			return View::make('turnar_a.turnar_a_index');
		}
		
	public function turnar_a_registrar()
		{
			Session::flash('msg','Oficio turnado correctamente.');
			return Redirect::action('OficiosController@oficialia_recibidos');
		}
}
?>