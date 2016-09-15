<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');


Route::get('loginGet', [
	'as'=>'login-get',
	'uses'=>'Auth\CustomAuthController@showLogin'
]);


Route::post('login/post', [
	'as'=>'login-post',
	'uses'=>'Auth\CustomAuthController@postLogin'

]);

Route::get('/salir', [
	'as'=>'login-des',
	'uses'=>'Auth\CustomAuthController@destroy'

]);

	//CRUD OPCION
	
	Route::resource('Acceso','admin\gbAccesoController');
	Route::resource('Persona','admin\gbPersonaController');
	Route::resource('Usuario','admin\gbUsuarioController');
	Route::resource('Rol', 'admin\gbRolController');
    Route::resource('Grupo', 'admin\gbGrupoController');
	Route::resource('Opcion', 'admin\gbOpcionController');
    Route::resource('Asignacion','admin\gbAsignacionController');
	//PRUEBAS TAMARA
	Route::any('procesos/{option}/{pageSize}/{limit}/{start}','ProcesosController@index');
	Route::get('procesos/{id}','ProcesosController@show');
	Route::post('procesos','ProcesosController@store');
	Route::put('procesos/{id}','ProcesosController@update');
	Route::delete('procesos/{id}','ProcesosController@destroy');
	

