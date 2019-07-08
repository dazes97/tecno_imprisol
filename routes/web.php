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
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



    //CASO DE USO 1 GESTIONAR USUARIO
    Route::resource('administratives', 'AdministrativesController');




    //CASO DE USO 1 GESTIONAR USUARIO
    Route::resource('clients', 'ClientsController');
    Route::resource('providers', 'ProvidersController');
    //CASO DE USO 2 GESTIONAR PRODUCTOS
    Route::resource('products', 'ProductsController');
    //GESTIONAR VENTAS
    Route::resource('sales', 'SalesController');
    //GESTIONAR ENTREGAS
    Route::resource('deliveries', 'DeliveriesController');
    //GESTIONAR INVENTARIO
    Route::resource('inventories', 'InventoryCutController');
    //GESTIONAR COMPRAS
    Route::resource('purchases', 'PurchasesController');
    //REPORTES
    //Route::get('reports/products', ['as' => 'report.product', 'uses' => 'ProductsController@reportAllProducts']);

    //Route::resource('reports', 'ReportsController');
    Route::get('reports/sales', ['as' => 'sales.reports', 'uses' => 'SalesController@indexReport']);
    Route::post('reports/sales', ['as' => 'sales.generarrep', 'uses' => 'SalesController@generarReporte']);

    Route::get('reports/products', ['as' => 'products.reports', 'uses' => 'ProductsController@indexReport']);
    Route::post('reports/products', ['as' => 'products.generarrep', 'uses' => 'ProductsController@generarReporte']);

    Route::get('reports/orders', ['as' => 'orders.reports', 'uses' => 'OrdersController@indexReport']);
    Route::post('reports/orders', ['as' => 'orders.generarrep', 'uses' => 'OrdersController@generarReporte']);

    Route::get('reports/purchases', ['as' => 'purchases.reports', 'uses' => 'PurchasesController@indexReport']);
    Route::post('reports/purchases', ['as' => 'purchases.generarrep', 'uses' => 'PurchasesController@generarReporte']);

    //ESTADISTICAS
    Route::get('statistics', ['as' => 'statistics.index', 'uses' => 'StatisticsController@index']);

    //CASO DE USO 3 GESTIONAR ORDENES
    Route::resource('orders', 'OrdersController');
    ///Route::resource('orders', 'OrdersController');



//PERSONALIZACION COLORES
Route::post('color','UsersController@color')->name('color');






