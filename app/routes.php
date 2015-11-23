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
		
		//////////////Autocompletado//////////////////
		Route::get('getdata', function()
		{
			$term = Str::lower(Input::get('term'));
			$data = array(
				'R' => 'Red',
				'O' => 'Orange',
				'Y' => 'Yellow',
				'G' => 'Green',
				'B' => 'Blue',
				'I' => 'Indigo',
				'V' => 'Violet',
			);
			$return_array = array();

			foreach ($data as $k => $v) {
				if (strpos(Str::lower($v), $term) !== FALSE) {
					$return_array[] = array('value' => $v, 'id' =>$k);
				}
			}
			return Response::json($return_array);
		});
		///////////////////////////////
		
		
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
});


////////////////////Oficialía de Partes///////////////////////
Route::group(array("prefix"=>'oficialia'), function(){

	Route::get('/','OficialiaController@oficialia_index');
	
	//Funciones de Oficios Entrantes
	//Vista de oficios recibidos
	Route::get('/oficios/entrantes','OficiosController@oficialia_recibidos');
	
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
	
	//Funciones de Oficios Salientes
	Route::get('/oficios/salientes','OficiosController@oficialia_salientes');
	//Wizard: Registro de oficios entrantes
	Route::get('/oficios/salientes/nuevo','OficiosSalientesController@oficialia_nuevoOficio');
	Route::post('/oficios/salientes/nuevo','OficiosSalientesController@oficialia_nuevoOficio_registrar');
	//Vista de oficios enviados
	Route::get('/oficios/enviados','OficiosController@oficialia_enviados');
	
	Route::get('/usuario/contrasena','UsersController@personal_cambiarContrasena');
	Route::post('/usuario/contrasena','UsersController@personal_actualizarContrasenaUsuario');
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
});
?>