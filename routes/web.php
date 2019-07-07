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


Route::middleware(['root'])->group(function () {
    //CASO DE USO 1 GESTIONAR USUARIO
    Route::resource('administratives', 'AdministrativesController');
});


Route::middleware(['administrative'])->group(function () {
    //CASO DE USO 1 GESTIONAR USUARIO
    Route::resource('clients', 'ClientsController');
    Route::resource('providers', 'ProvidersController');
    //CASO DE USO 2 GESTIONAR PRODUCTOS
    Route::resource('products', 'ProductsController');
});

Route::middleware(['client'])->group(function () {
    //CASO DE USO 3 GESTIONAR ORDENES
    Route::resource('orders', 'OrdersController');
});


//PERSONALIZACION COLORES
Route::post('color','UsersController@color')->name('color');






