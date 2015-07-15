<?php

class SIGController extends BaseController {

	public function SIG_index()
		{
			return View::make('SIG.index');
		}
		
	public function SIG_Direccion()
		{
			return View::make('SIG.direccion');
		}
	
	public function SIG_Tecnica()
		{
			return View::make('SIG.tecnica');
		}
	
	public function SIG_Posgrado()
		{
			return View::make('SIG.posgrado');
		}

	public function SIG_Vinculacion()
		{
			return View::make('SIG.vinculacion');
		}

	public function SIG_Administrativa()
		{
			return View::make('SIG.administrativa');
		}

	public function SIG_Sistemas()
		{
			return View::make('SIG.sistemas');
		}

}
?>