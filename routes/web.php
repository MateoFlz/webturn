<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('imprimer', ['as' => 'atendidos.imprimir', 'uses' => 'HomeController@print']);
Route::get('imprimer2', ['as' => 'noatendidos.imprimir', 'uses' => 'HomeController@print2']);

Route::group(['middleware' => ['auth', 'superadmin']], function () {
    Route::get('dependencias', ['as' => 'dependencia.index', 'uses' => 'DependenciaController@index']);
    Route::get('dependencias/create', ['as' => 'dependencia.create', 'uses' => 'DependenciaController@create']);
    Route::post('dependencias', ['as' => 'dependencia.store', 'uses' => 'DependenciaController@store']);
    Route::get('dependencias/{dependencia}/edit', ['as' => 'dependencia.edit', 'uses' => 'DependenciaController@edit']);
    Route::get('dependencias/{dependencia}', ['as' => 'dependencia.show', 'uses' => 'DependenciaController@show']);
    Route::put('dependencias/{dependencia}', ['as' => 'dependencia.update', 'uses' => 'DependenciaController@update']);
    Route::delete('dependencia/{dependencia}', ['as' => 'dependencia.destroy', 'uses' => 'DependenciaController@destroy']);
    Route::get('dependencia/imprimir', ['as' => 'dependencia.imprimir', 'uses' => 'DependenciaController@print']);
});

Route::resource('configurar', 'ConfigurarController');

Route::group(['middleware' => 'auth'], function () {

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');



	Route::get('map', function () {

		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('cliente',['as' => 'cliente.create', 'uses' => 'ClienteController@create']);
    Route::post('cliente',['as' => 'cliente.store', 'uses' => 'ClienteController@store']);
});

Route::group(['middleware' => ['auth', 'superadmin']], function () {
    Route::get('clientes', ['as' => 'clientes.index', 'uses' => 'ClienteController@index']);
    Route::get('clientes/nuevo',['as' => 'clientes.authcreate', 'uses' => 'ClienteController@Authcreate']);
    Route::post('clientes/store',['as' => 'clientes.authstore', 'uses' => 'ClienteController@Authstore']);
    Route::get('clientes/{cliente}/editar',['as' => 'clientes.edit', 'uses' => 'ClienteController@edit']);
    Route::put('clientes/{cliente}',['as' => 'clientes.update', 'uses' => 'ClienteController@update']);
    Route::get('clientes/{cliente}',['as' => 'clientes.show', 'uses' => 'ClienteController@show']);
    Route::delete('clientes/{cliente}',['as' => 'clientes.destroy', 'uses' => 'ClienteController@destroy']);
    Route::get('cliente/imprimer', ['as' => 'clientes.imprimir', 'uses' => 'ClienteController@print']);
});

Route::group(['middleware' => ['auth','superadmin']], function () {
    Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);
    Route::get('user/{user}/editar', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
    Route::put('user/{user}', ['as' => 'user.update', 'uses' => 'UserController@update']);
    Route::delete('user/{user}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);
    Route::get('user/imprimer', ['as' => 'user.imprimir', 'uses' => 'UserController@print']);
    Route::get('user/{user}', ['as' => 'user.show', 'uses' => 'UserController@show']);
    Route::get('profile',['as' => 'profile.index', 'uses' => 'ProfileController@index']);
    Route::post('profile', ['as' => 'profile.store', 'uses' => 'ProfileController@store']);
    Route::get('profile/editar', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

});

Route::group(['middleware' => ['auth', 'superadmin']], function () {
    Route::resource('modulo', 'ModuloController');
    Route::get('modulos/imprimer', ['as' => 'modulo.imprimir', 'uses' => 'ModuloController@print']);
    Route::post('modulo/search', 'ModuloController@getuser')->name('search');
    Route::post('modulo/{id}/search', 'ModuloController@getuser')->name('search');

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('atencion', 'TurnoController')->except('index','update', 'store', 'Showsistema');
    Route::put('atencion/{turno}',  ['as' => 'turno.update', 'uses' => 'TurnoController@update']);
    Route::get('atencion',  ['as' => 'turno.wait', 'uses' => 'TurnoController@ShowTurnos']);
    Route::post('turnos',  ['as' => 'turno.tranferido', 'uses' => 'TurnoController@tranferido']);
    Route::post('atencion/{turno}',  ['as' => 'turno.llamado', 'uses' => 'TurnoController@updateLlamado']);
    Route::put('atencion/terminar/{turno}',  ['as' => 'turno.terminar', 'uses' => 'TurnoController@terminar']);
});


Route::group(['middleware' => 'guest'], function () {
    Route::post('turno',  ['as' => 'turno.index', 'uses' => 'TurnoController@index']);
    Route::post('turno/store',  ['as' => 'turno.store', 'uses' => 'TurnoController@store']);
    Route::get('/sistema', ['as' => 'sistema', 'uses' => 'TurnoController@Showsistema']);
});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('fichos', 'FichosController');
    Route::get('ficho/imprimer', ['as' => 'fichos.imprimir', 'uses' => 'FichosController@print']);

});
