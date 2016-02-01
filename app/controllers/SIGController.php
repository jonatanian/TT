<?php

class SIGController extends BaseController {

	public function SIG_RD()
		{
			if(Auth::User()->Rol_Id == 7)
			{
				return View::make('SIG.rd');
			}
			else
			{
				return Redirect::to('/SIG');
			}
		}

	public function SIG_index()
		{
			if(Auth::check())
			{
				return View::make('SIG.index');
			}
			else
			{
				return Redirect::to('/login');
			}
		}
		
	public function SIG_Direccion()
		{
			if(Auth::check())
			{
				return View::make('SIG.direccion');
			}
			else
			{
				return Redirect::to('/login');
			}
		}
	
	public function SIG_Tecnica()
		{
			if(Auth::check())
			{
				return View::make('SIG.tecnica');
			}
			else
			{
				return Redirect::to('/login');
			}
		}
	
	public function SIG_Posgrado()
		{
			if(Auth::check())
			{
				return View::make('SIG.posgrado');
			}
			else
			{
				return Redirect::to('/login');
			}
		}

	public function SIG_Vinculacion()
		{
			if(Auth::check())
			{
				return View::make('SIG.vinculacion');
			}
			else
			{
				return Redirect::to('/login');
			}
		}

	public function SIG_Administrativa()
		{
			if(Auth::check())
			{
				return View::make('SIG.administrativa');
			}
			else
			{
				return Redirect::to('/login');
			}
		}

	public function SIG_Sistemas()
		{
			if(Auth::check())
			{
				return View::make('SIG.sistemas');
			}
			else
			{
				return Redirect::to('/login');
			}
		}

}
?>