<?php

class MemosController extends BaseController {

	public function oficialia_nuevo_recibido()
		{
			return View::make('memos.oficialia_nuevomemo_recibido');
		}
		
	public function oficialia_recibidos()
		{
			return View::make('memos.oficialia_recibidos');
		}
		
	public function oficialia_enviados()
		{
			return View::make('memos.oficialia_enviados');
		}
		
	public function oficialia_nuevo_saliente()
		{
			return View::make('memos.oficialia_nuevomemo_saliente');
		}
		
	public function oficialia_vermemo()
		{
			return View::make('memos.oficialia_vermemo');
		}
}
?>