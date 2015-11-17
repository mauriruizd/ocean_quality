<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

Route::get('/', 'WelcomeController@index');
Route::get('productos', 'WelcomeController@productos');
Route::get('news', 'WelcomeController@noticias');
Route::get('vendedores', 'WelcomeController@vendedores');
Route::get('empresa', 'WelcomeController@empresa');
Route::get('trabaje_con_nosotros', 'WelcomeController@trabajeConNosotros');
Route::post('trabaje_con_nosotros', 'WelcomeController@postTrabajeConNosotros');
Route::get('contacto', 'WelcomeController@contacto');
Route::post('contacto', 'WelcomeController@postContacto');

Route::group(['prefix' => 'admin'], function(){
	Route::get('login', 'AdminController@login');
	Route::post('login', 'AdminController@loginAttempt');
	Route::get('logout', 'AdminController@logout');
	Route::get('/', 'AdminController@index');
	Route::get('categorias', 'AdminController@categorias');
	Route::get('subcategorias', 'AdminController@subcategorias');
	Route::get('proveedores', 'AdminController@proveedores');
	Route::get('productos', 'AdminController@productos');
	Route::get('zonas', 'AdminController@zonas');
	Route::get('empleados', 'AdminController@empleados');
	Route::get('noticias', 'AdminController@noticias');
	Route::get('banners', 'AdminController@banners');
});

Route::group(['prefix' => 'api'], function(){
	Route::resource('administradores', 'Rest\Administradores');
	Route::resource('banners', 'Rest\Banner');
	Route::resource('categorias', 'Rest\Categorias');
	Route::resource('cotizaciones', 'Rest\Cotizaciones');
	Route::resource('empleados', 'Rest\Empleados');
	Route::resource('monedas', 'Rest\Monedas');
	Route::resource('noticias', 'Rest\Noticias');
	Route::get('noticias/{id}/modal', 'Rest\Noticias@modal');
	Route::resource('proveedores', 'Rest\Proveedores');
	Route::resource('productos', 'Rest\Productos');
	Route::resource('subcategorias', 'Rest\Subcategorias');
	Route::resource('zonas', 'Rest\Zonas');
});

Route::get('adm_prods', 'Adm@productos');
Route::get('clima', 'Adm@clima');
