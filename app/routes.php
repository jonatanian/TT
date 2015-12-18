<?php

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/SISA_Startup','LoginController@SISA_Startup');
Route::get('/HomePage','LoginController@SISA_index');

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
	Route::get('/usuario/contrasena','UsersController@personal_cambiarContrasena');
	Route::post('/usuario/contrasena','UsersController@personal_actualizarContrasenaUsuario');
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
		Route::post('/usuarios/nuevo','UsersController@dsbd_registrarUsuario');
		Route::get('/usuarios/editar','UsersController@dsbd_editarUsuario');
		Route::post('/usuarios/editar','UsersController@dsbd_actualizarUsuario');
		Route::get('/usuarios/contrasena','UsersController@dsbd_recuperarContrasenaUsuario');
		Route::post('/usuarios/contrasena','UsersController@dsbd_actualizarContrasenaUsuario');
		Route::get('/usuarios/estatus','UsersController@dsbd_cambiarEstatus');
		Route::post('/usuarios/estatus','UsersController@dsbd_actualizarEstatus');
		Route::get('/usuario/contrasena','UsersController@personal_cambiarContrasena');
		Route::post('/usuario/contrasena','UsersController@personal_actualizarContrasenaUsuario');
		Route::post('usuario/ordenar', 'UsersController@dsbd_consultarUsuarios');
		
		//Funciones de Oficios Salientes
	Route::get('/oficios/salientes','OficiosController@dsbd_salientes');
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/salientes/nuevo','OficiosSalientesController@dsbd_nuevoOficio');
	Route::post('/oficios/salientes/nuevo','OficiosSalientesController@dsbd_nuevoOficio_registrar');
		
	//Registro de nueva dependencia salientes
		Route::get('/oficios/salientes/nueva_dependencia','InstanciasExternasController@dsbd_nuevaDependenciaSaliente');
		Route::post('/oficios/salientes/nueva_dependencia','InstanciasExternasController@dsbd_registrarDependenciaSaliente');
		//Registro de nueva área saliente
		Route::get('/oficios/salientes/nueva_area','InstanciasExternasController@dsbd_nuevaAreaSaliente');
		Route::post('/oficios/salientes/nueva_area','InstanciasExternasController@dsbd_registrarAreaSaliente');
		//Registro de nuevo emisor saliente
		Route::get('/oficios/salientes/nuevo_emisor','InstanciasExternasController@dsbd_nuevoEmisorSaliente');
		Route::post('/oficios/salientes/nuevo_emisor','InstanciasExternasController@dsbd_registrarEmisorSaliente');
		//Registro de nuevo cargo saliente
		Route::get('oficios/salientes/nuevo_cargo','InstanciasExternasController@dsbd_nuevoCargoSaliente');
		Route::post('oficios/salientes/nuevo_cargo','InstanciasExternasController@dsbd_registrarCargoSaliente');
		
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
		
		Route::get('/usuario/contrasena','UsersController@personal_cambiarContrasena');
		Route::post('/usuario/contrasena','UsersController@personal_actualizarContrasenaUsuario');
		
		//Funciones de Oficios Salientes
	Route::get('/oficios/salientes','OficiosController@jefatura_salientes');
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/salientes/nuevo','OficiosSalientesController@jefatura_nuevoOficio');
	Route::post('/oficios/salientes/nuevo','OficiosSalientesController@jefatura_nuevoOficio_registrar');
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
		
		Route::get('/usuario/contrasena','UsersController@personal_cambiarContrasena');
		Route::post('/usuario/contrasena','UsersController@personal_actualizarContrasenaUsuario');
		
		//Funciones de Oficios Salientes
	Route::get('/oficios/salientes','OficiosController@subdireccion_salientes');
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/salientes/nuevo','OficiosSalientesController@subdireccion_nuevoOficio');
	Route::post('/oficios/salientes/nuevo','OficiosSalientesController@subdireccion_nuevoOficio_registrar');
});

/////////////////Dirección//////////////////
Route::group(array("prefix"=>'direccion'), function(){
	Route::get('/','DireccionController@direccion_index');
	//RECIBIDOS Y ENVIADOS 
	Route::get('/oficios/recibidos','DireccionController@oficialia_recibidos');
	Route::get('/oficios/enviados','DireccionController@oficialia_enviados');
	Route::get('/corrregiroficio','OficiosController@corregir_oficio');
	//Funciones para registrar anexos
	Route::get('/anexos','OficiosController@personal_registrar_anexos');
	
	Route::get('/usuario/contrasena','UsersController@personal_cambiarContrasena');
		Route::post('/usuario/contrasena','UsersController@personal_actualizarContrasenaUsuario');
		
		//Funciones de Oficios Salientes
	Route::get('/oficios/salientes','OficiosController@direccion_salientes');
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/salientes/nuevo','OficiosSalientesController@direccion_nuevoOficio');
	Route::post('/oficios/salientes/nuevo','OficiosSalientesController@direccion_nuevoOficio_registrar');
	
});


////////////////////Oficialía de Partes///////////////////////
Route::group(array("prefix"=>'oficialia'), function(){

	Route::get('/','OficialiaController@oficialia_index');
	
	//Funciones de Oficios Entrantes
	//Vista de oficios recibidos
	Route::get('/oficios/entrantes','OficiosController@oficialia_recibidos');
	
	//Vista de los detalles de un oficio recibido
	Route::get('/oficios/entrantes/detalles','OficiosEntrantesController@oficialia_verDetalles');
	
	
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/entrantes/nuevo','OficiosEntrantesController@oficialia_nuevoOficio');
		//Registro de nueva dependencia
		Route::get('/oficios/entrantes/nueva_dependencia','InstanciasExternasController@nuevaDependencia');
		Route::post('/oficios/entrantes/nueva_dependencia','InstanciasExternasController@registrarDependencia');
		//Registro de nueva área
		Route::get('/oficios/entrantes/nueva_area','InstanciasExternasController@nuevaArea');
		Route::post('/oficios/entrantes/nueva_area','InstanciasExternasController@registrarArea');
		//Registro de nuevo emisor
		Route::get('/oficios/entrantes/nuevo_emisor','InstanciasExternasController@nuevoEmisor');
		Route::post('/oficios/entrantes/nuevo_emisor','InstanciasExternasController@registrarEmisor');
		//Registro de nuevo cargo
		Route::get('oficios/entrantes/nuevo_cargo','InstanciasExternasController@nuevoCargo');
		Route::post('oficios/entrantes/nuevo_cargo','InstanciasExternasController@registrarCargo');
		Route::post('/oficios/entrantes/nuevo','OficiosEntrantesController@oficialia_nuevoOficio_registrar');
		
	//Vista de los detalles de un oficio saliente
	Route::get('/oficios/salientes/detalles','OficiosSalientesController@oficialia_verDetalles');
	
	//Funciones de Oficios Salientes
	Route::get('/oficios/salientes','OficiosController@oficialia_salientes');
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/salientes/nuevo','OficiosSalientesController@oficialia_nuevoOficio');
	Route::post('/oficios/salientes/nuevo','OficiosSalientesController@oficialia_nuevoOficio_registrar');
	//Vista de oficios enviados
	Route::get('/oficios/enviados','OficiosController@oficialia_enviados');
	
	Route::get('/usuario/contrasena','UsersController@personal_cambiarContrasena');
	Route::post('/usuario/contrasena','UsersController@personal_actualizarContrasenaUsuario');
	
	//Registro de nueva dependencia salientes
		Route::get('/oficios/salientes/nueva_dependencia','InstanciasExternasController@nuevaDependenciaSaliente');
		Route::post('/oficios/salientes/nueva_dependencia','InstanciasExternasController@registrarDependenciaSaliente');
		//Registro de nueva área saliente
		Route::get('/oficios/salientes/nueva_area','InstanciasExternasController@nuevaAreaSaliente');
		Route::post('/oficios/salientes/nueva_area','InstanciasExternasController@registrarAreaSaliente');
		//Registro de nuevo emisor saliente
		Route::get('/oficios/salientes/nuevo_emisor','InstanciasExternasController@nuevoEmisorSaliente');
		Route::post('/oficios/salientes/nuevo_emisor','InstanciasExternasController@registrarEmisorSaliente');
		//Registro de nuevo cargo saliente
		Route::get('oficios/salientes/nuevo_cargo','InstanciasExternasController@nuevoCargoSaliente');
		Route::post('oficios/salientes/nuevo_cargo','InstanciasExternasController@registrarCargoSaliente');
	
	/////////////Consultas//////////////////////////////////
	Route::get('/oficios/salientes/filtro/dependencia','OficiosSalientesController@oficialia_consultaDependencia');
	Route::get('/oficios/salientes/filtro/estatus','OficiosSalientesController@oficialia_consultaEstatus');
	Route::get('/oficios/salientes/filtro/id','OficiosSalientesController@oficialia_consultaId');

	/////////////////Memorandums//////////////////////////////7
	Route::get('/memos/recibidos','MemosController@oficialia_recibidos');
	Route::get('/memos/enviados','MemosController@oficialia_enviados');

	//Wizard: Registro 
	Route::get('/memos/entrantes/nuevo','MemosController@oficialia_nuevo_recibido');
	Route::get('/memos/salientes/nuevo','MemosController@oficialia_nuevo_saliente');
	//Route::get('/oficios/entrantes/nuevo','OficiosEntrantesController@oficialia_nuevoOficio');
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
	
	Route::get('/usuario/contrasena','UsersController@personal_cambiarContrasena');
	Route::post('/usuario/contrasena','UsersController@personal_actualizarContrasenaUsuario');
	
	//Funciones de Oficios Salientes
	Route::get('/oficios/salientes','OficiosController@personal_salientes');
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/salientes/nuevo','OficiosSalientesController@personal_nuevoOficio');
	Route::post('/oficios/salientes/nuevo','OficiosSalientesController@personal_nuevoOficio_registrar');
	
	Route::get('/oficios/salientes','OficiosController@iescmpl_salientes');
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/salientes/nuevo','OficiosSalientesController@iescmpl_nuevoOficio');
	Route::post('/oficios/salientes/nuevo','OficiosSalientesController@iescmpl_nuevoOficio_registrar');
});

//////////////////// Funciones de manejo de documentos PDF para todos los usuarios ////////////////////
Route::group(array("prefix"=>'correspondencia'), function(){
	Route::get('/verOficioEntrante','OficiosEntrantesController@verPDF');
	Route::get('/verOficioSaliente','OficiosSalientesController@verPDF');
});



?>