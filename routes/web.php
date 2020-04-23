<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ItemController@home');

Route::get('/manageitem', function () {
    return view('items');
});

Route::get('/additem', function () {
    return view('add_items');
});

Route::get('/items', 'ItemController@index');
Route::get('/items/create', 'ItemController@create');
Route::post('/items', 'ItemController@store');
Route::get('/items/{id}/edit', 'ItemController@edit');
Route::get('/items/{id}/detail', 'ItemController@detail');
Route::patch('/items/{id}', 'ItemController@update');
Route::get('/changestat', 'ItemController@updateStat');
Route::delete('/items/{id}', 'ItemController@destroy');

Route::get('/itemimage', 'ImageController@index');
Route::post('/itemimage', 'ImageController@upload');
Route::delete('/itemimage/{id}', 'ImageController@destroy');

Route::get('/home', 'UserController@index');
Route::get('/log-in', 'UserController@login');
Route::post('/loginPost', 'UserController@loginPost');
Route::get('/signin', 'UserController@register');
Route::post('/registerPost', 'UserController@registerPost');
Route::get('/logout', 'UserController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

