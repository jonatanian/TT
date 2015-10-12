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
	
///////////////////Funciones para los oficios salientes//////////////////////
	//Pantalla para seleccionar una dependencia
	Route::get('/oficios/salientes/nuevo/dependencia','OficiosController@personal_Dependencia');//Para oficio saliente
	//Funciones para registrar una dependencia nueva
		Route::get('/oficios/salientes/nuevo/dependencia/nueva','OficiosController@oficialia_nuevaDependencia');
		Route::post('/oficios/salientes/nuevo/dependencia/nueva','OficiosController@personal_regDependencia');
	Route::post('/oficios/salientes/nuevo/dependencia','OficiosController@personal_Dependencia_Area');
	
	//Pantalla para seleccionar un Área
	Route::get('/oficios/salientes/nuevo/dependencia/area','OficiosController@personal_Dependencia_Area_2');
		//Funciones para registrar un Área nueva
		Route::get('/oficios/salientes/nuevo/dependencia/{IdDep}/area/nueva','OficiosController@oficialia_nuevaArea');
		Route::post('/oficios/salientes/nuevo/dependencia/{IdDep}/area/nueva','OficiosController@personal_regArea');
	Route::post('/oficios/salientes/nuevo/dependencia/area','OficiosController@personal_Dependencia_Entidad');
	
	//Pantalla para seleccionar entidad
	Route::get('/oficios/salientes/nuevo/dependencia/area/entidad','OficiosController@personal_Dependencia_Entidad_2');
		//Funciones para registrar una entidad nueva
		Route::get('/oficios/salientes/nuevo/dependencia/area/entidad/nuevo', 'OficiosController@personal_nuevaentidad');
		Route::post('/oficios/salientes/nuevo/dependencia/area/entidad/nuevo', 'OficiosController@personal_regEntidad');
	Route::post('/oficios/salientes/nuevo/dependencia/area/entidad','OficiosController@personal_nuevo_saliente');
	
/////////////////////Funciones para los oficios entrantes///////////
	Route::get('/oficios/entrantes/nuevo','OficiosEntrantesController@oficialia_nuevoOficio');


	Route::get('/oficios/nuevo/dependencia/','OficiosController@oficialia_Dependencia');
		//Funciones para registrar una dependencia nueva
		Route::get('/oficios/nuevo/dependencia/nueva','OficiosController@oficialia_nuevaDependencia');
		Route::post('/oficios/nuevo/dependencia/nueva','OficiosController@oficialia_regDependencia');
	Route::post('/oficios/nuevo/dependencia','OficiosController@oficialia_Dependencia_Area');
	
	//Pantalla para seleccionar un Área
	Route::get('/oficios/nuevo/dependencia/area','OficiosController@oficialia_Dependencia_Area_2');
		//Funciones para registrar un Área nueva
		Route::get('/oficios/nuevo/dependencia/{IdDep}/area/nueva','OficiosController@oficialia_nuevaArea');
		Route::post('/oficios/nuevo/dependencia/{IdDep}/area/nueva','OficiosController@oficialia_regArea');
	Route::post('/oficios/nuevo/dependencia/area','OficiosController@oficialia_Dependencia_Entidad');
	//Pantalla para seleccionar entidad
	Route::get('/oficios/nuevo/dependencia/area/entidad','OficiosController@oficialia_Dependencia_Entidad_2');
		//Funciones para registrar una entidad nueva
		Route::get('/oficios/nuevo/dependencia/area/entidad/nuevo', 'OficiosController@personal_nuevaentidad');
		Route::post('/oficios/nuevo/dependencia/area/entidad/nuevo', 'OficiosController@oficialia_regEntidad');
	Route::post('/oficios/nuevo/dependencia/area/entidad','OficiosController@oficialia_seleccionar_tipo_oficio');
	//Pantalla para seleccionar el tipo de oficio
	Route::get('/oficios/nuevo/tipo','OficiosController@oficialia_seleccionar_tipo_oficio_2');
	Route::post('/oficios/nuevo/tipo','OficiosController@oficialia_seleccion_tipo_oficio');
		//Pantalla para registro de oficios entrantes
		Route::get('/oficios/recibidos/nuevo','OficiosController@oficialia_nuevo_entrante');
		Route::post('/oficios/recibidos/nuevo','OficiosController@oficialia_registrar_oficio_entrante');
	//Pantalla de registro de anexos
	Route::get('/oficios/nuevo/anexo','OficiosController@personal_registrar_nuevo_anexo');

	//Funciones para los oficios enviados
	Route::get('/oficios/enviados','OficiosController@oficialia_enviados');
	Route::get('/oficios/enviados/nuevo','OficiosController@oficialia_nuevo_saliente');
	Route::post('/oficios/enviados/nuevo','OficiosController@oficialia_registrar_oficio_saliente');
	Route::get('/oficios/enviados/acuse','OficiosController@oficialia_subir_acuse');
	
	Route::get('/oficios/porvalidar','OficiosController@oficialia_oficios_por_validar');
	Route::get('/oficios/porvalidar/observaciones','OficiosController@oficialia_validar_oficio_saliente');
	//Route::post('/oficios/porvalidar/observaciones','OficiosController@oficialia_');
	
	//Funciones para los oficios recibidos
	Route::get('/oficios/entrantes','OficiosController@oficialia_recibidos');
	Route::post('/oficios/recibidos','OficiosController@oficialia_recibidos_buscar');
	Route::get('/oficios/recibidos/turnar_a','CorrespondenciaController@turnar_a');
	Route::post('/oficios/recibidos/turnar_a','CorrespondenciaController@turnar_a_registrar');
	
	//Funciones para los memorándums
	Route::get('/memorandums/enviados','MemosController@oficialia_enviados');
	Route::get('/memorandums/enviados/nuevo','MemosController@oficialia_nuevo_saliente');
	Route::get('/memorandums/recibidos','MemosController@oficialia_recibidos');
	Route::get('/memorandums/recibidos/nuevo','MemosController@oficialia_nuevo_recibido');
	
	Route::get('/memorandums/ver','MemosController@oficialia_vermemo');
	
	//Funciones para registrar anexos
	Route::get('/anexos','OficiosController@personal_registrar_anexos');
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