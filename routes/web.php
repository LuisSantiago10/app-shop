<?php

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

Route::get('/', 'TestController@welcome');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');//formulario edicion
Route::post('/cart','CartDetailController@store');//formulario edicion
Route::delete('/cart','CartDetailController@destroy');//formulario 



Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function (){
	Route::get('/products','ProductController@index');//lista de productos
	Route::get('/products/create','ProductController@create');//formulario
	Route::post('/products','ProductController@store');//Registrar
	Route::get('/products/{id}/edit','ProductController@edit');//formulario edicion
	Route::post('/products/{id}/edit','ProductController@update');//Registrar
	Route::post('/products/{id}/delete','ProductController@destroy');//formulario eliminacion
										
	Route::get('/products/{id}/images','ImageController@index');//lista de imagenes
	Route::post('/products/{id}/images','ImageController@store');//Registrar
	Route::delete('/products/{id}/images','ImageController@destroy');//formulario eliminacion
});


