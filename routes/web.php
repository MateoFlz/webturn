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

Route::group(['middleware' => 'auth'], function () {
	Route::resource('dependencia', 'DependenciaController');


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

Route::group(['middleware' => 'auth'], function () {
    Route::get('clientes', ['as' => 'clientes.index', 'uses' => 'ClienteController@index']);
    Route::get('clientes/nuevo',['as' => 'clientes.authcreate', 'uses' => 'ClienteController@Authcreate']);
    Route::post('clientes/store',['as' => 'clientes.authstore', 'uses' => 'ClienteController@Authstore']);
    Route::get('clientes/{cliente}/editar',['as' => 'clientes.edit', 'uses' => 'ClienteController@edit']);
    Route::put('clientes/{cliente}',['as' => 'clientes.update', 'uses' => 'ClienteController@update']);
    Route::get('clientes/{cliente}',['as' => 'clientes.show', 'uses' => 'ClienteController@show']);
    Route::delete('clientes/{cliente}',['as' => 'clientes.destroy', 'uses' => 'ClienteController@destroy']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);
    Route::get('user/{user}/editar', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
    Route::put('user/{user}', ['as' => 'user.update', 'uses' => 'UserController@update']);
    Route::get('user/{user}', ['as' => 'user.show', 'uses' => 'UserController@show']);
    Route::get('profile',['as' => 'profile.index', 'uses' => 'ProfileController@index']);
    Route::post('profile', ['as' => 'profile.store', 'uses' => 'ProfileController@store']);
    Route::get('profile/editar', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('modulo', 'ModuloController');
    Route::post('modulo/search', 'ModuloController@getuser')->name('search');
    Route::post('modulo/{id}/search', 'ModuloController@getuser')->name('search');

});

Route::group(['middleware' => 'guest'], function () {
    Route::resource('turno', 'TurnoController')->except('index');
    Route::post('turno',  ['as' => 'turno.index', 'uses' => 'TurnoController@index']);
    Route::post('turno/store',  ['as' => 'turno.store', 'uses' => 'TurnoController@store']);
});
