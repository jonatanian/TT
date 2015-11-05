<?php

Route::get('/', function()
{
	return View::make('index');
});


Route::get('/login','LoginController@login_index');
Route::post('/login','LoginController@login');
Route::get('/salir','LoginController@logout');

//Sistema Integrado de Gestión de la Calidad y del Ambiente
Route::group(array("prefix"=>'SIG'), function(){
	Route::get('/','SIGController@SIG_index');
	Route::get('/Direccion','SIGController@SIG_Direccion');
	Route::get('/Tecnica','SIGController@SIG_Tecnica');
	Route::get('/Posgrado','SIGController@SIG_Posgrado');
	Route::get('/Vinculacion','SIGController@SIG_Vinculacion');
	Route::get('/Administrativa','SIGController@SIG_Administrativa');
	Route::get('/Sistemas','SIGController@SIG_Sistemas');
});

//////////////////Administrador////////////////////////////
	Route::group(array("prefix"=>'dsbd'), function(){
		Route::get('/','AdminController@dsbd_index');
		//RECIBIDOS Y ENVIADOS 
		Route::get('/oficios/recibidos','AdminController@oficialia_recibidos');
		Route::get('/oficios/enviados','AdminController@oficialia_enviados');

		Route::get('/corrregiroficio','OficiosController@corregir_oficio');
		//Funciones para registrar anexos
		Route::get('/anexos','OficiosController@personal_registrar_anexos');
		//Funciones de control de usuarios
		Route::get('/usuarios','UsersController@dsbd_usuarios');
		Route::get('/usuarios/nuevo','UsersController@dsbd_nuevoUsuario');
});
//////////////////Jefes de departamento////////////////////
	Route::group(array("prefix"=>'jefatura'), function(){
		Route::get('/','JefaturaController@jefatura_index');
		//RECIBIDOS Y ENVIADOS
		Route::get('/oficios/recibidos','JefaturaController@oficialia_recibidos');
		//Route::post('/oficios/recibidos','OficiosController@oficialia_recibidos_buscar');
		Route::get('/oficios/enviados','JefaturaController@oficialia_enviados');
		Route::get('/corrregiroficio','OficiosController@corregir_oficio');
		//Funciones para registrar anexos
		Route::get('/anexos','OficiosController@personal_registrar_anexos');
});
//////////////////Subdirección//////////////////////////////
	Route::group(array("prefix"=>'subdireccion'), function(){
		Route::get('/','SubdireccionController@subdireccion_index');
		//RECIBIDOS Y ENVIADOS
		Route::get('/oficios/recibidos','SubdireccionController@oficialia_recibidos');
		Route::get('/oficios/enviados','SubdireccionController@oficialia_enviados');

		Route::get('/corrregiroficio','OficiosController@corregir_oficio');
		//Funciones para registrar anexos
		Route::get('/anexos','OficiosController@personal_registrar_anexos');
});

/////////////////Subdirección con jefaturas//////////////////
Route::group(array("prefix"=>'direccion'), function(){
	Route::get('/','DireccionController@direccion_index');
	//RECIBIDOS Y ENVIADOS 
	Route::get('/oficios/recibidos','DireccionController@oficialia_recibidos');
	Route::get('/oficios/enviados','DireccionController@oficialia_enviados');
	Route::get('/corrregiroficio','OficiosController@corregir_oficio');
	//Funciones para registrar anexos
	Route::get('/anexos','OficiosController@personal_registrar_anexos');
});

Route::group(array("prefix"=>'oficialia'), function(){
	Route::get('/','OficialiaController@oficialia_index');
	
	//Funciones de Oficios Entrantes
	//Vista de oficios recibidos
	Route::get('/oficios/entrantes','OficiosController@oficialia_recibidos');
	
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/entrantes/nuevo','OficiosEntrantesController@oficialia_nuevoOficio');
	
	Route::post('/oficios/entrantes/nuevo','OficiosEntrantesController@oficialia_nuevoOficio_registrar');
	
	//Funciones de Oficios Salientes
	//Vista de oficios enviados
	Route::get('/oficios/enviados','OficiosController@oficialia_enviados');
	
});

Route::group(array("prefix"=>'iescmpl'), function(){
	Route::get('/','IescmplController@cmpl_index');
	//RECIIDOS Y ENVIADOS 
	Route::get('/oficios/recibidos','IescmplController@oficialia_recibidos');
	Route::get('/oficios/enviados','IescmplController@oficialia_enviados');
	//Funciones para corregir oficios
	Route::get('/corrregiroficio','OficiosController@corregir_oficio');
	//Funciones para registrar anexos
	Route::get('/anexos','OficiosController@personal_registrar_anexos');
});
?>