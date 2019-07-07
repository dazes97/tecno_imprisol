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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//CASO DE USO 1 GESTIONAR USUARIO
Route::resource('clients', 'ClientsController');
Route::resource('administratives', 'AdministrativesController');
Route::resource('providers', 'ProvidersController');





