<?php

class OficialiaController extends BaseController {

	public function oficialia_index()
		{
			$roles = Rol::all();
			return View::make('oficialia.oficialia_index',array('roles'=>$roles));
		}
}
?>