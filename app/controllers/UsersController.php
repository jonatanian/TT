<?php

class UsersController extends BaseController {

	public function homepage_index()
		{
			Auth::user();
			if()
			return View::make('dsbd.dsbd_index');
		}
}
?>