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
 * Login Routes
 */
Route::group(['namespace' => 'Auth'], function(){
    Route::get('login', ['as' => 'show.login', 'uses' => 'AuthController@showLogin']);
    Route::post('login', 'AuthController@doLogin');
    Route::get('logout', ['as' => 'do.logout', 'uses' => 'AuthController@doLogout']);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', ['as' => '/', 'uses' => 'HomeController@index']);
    Route::get('tender', ['as' => 'tender.index', 'uses' => 'TendersController@index']);
    Route::get('tender/new', ['as' => 'tender.new', 'uses' => 'TendersController@showNew']);
    Route::post('tender/save', ['as' => 'tender.save', 'uses' => 'TendersController@saveNew']);
    Route::get('tender/edit/{id}', ['as' => 'tender.edit', 'uses' => 'TendersController@edit']);
    Route::post('tender/update/{id}', ['as' => 'tender.update', 'uses' => 'TendersController@update']);
    Route::get('tender/destroy/{id}', ['as' => 'tender.destroy', 'uses' => 'TendersController@destroy']);
    Route::get('tender/details/{id}', ['as' => 'tender.details.show', 'uses' => 'TendersController@showDetails']);
    Route::post('tender/details/', ['as' => 'tender.details.save', 'uses' => 'TendersController@saveDetails']);

    Route::get('clients', ['as' => 'clients.index', 'uses' => 'ClientsController@index']);
    Route::get('clients/new', ['as' => 'clients.new', 'uses' => 'ClientsController@showNew']);
    Route::post('clients/save', ['as' => 'clients.save', 'uses' => 'ClientsController@saveNew']);

    Route::get('products', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
    Route::get('products/new', ['as' => 'products.new', 'uses' => 'ProductsController@showNew']);
    Route::post('products/save', ['as' => 'products.save', 'uses' => 'ProductsController@saveNew']);

    Route::get('stock', ['as' => 'stock.index', 'uses' => 'StockController@index']);

    Route::get('purchases', ['as' => 'purchases.index', 'uses' => 'PurchasesControllerController@index']);
    Route::get('purchases/new', ['as' => 'purchases.new', 'uses' => 'PurchasesController@showNew']);
    Route::post('purchases/save', ['as' => 'purchases.save', 'uses' => 'PurchasesController@saveNew']);
});

//Route::get('test', function(){
//    return User::create([
//        'username' => 'admintest',
//        'email' => 'admin@localhost',
//        'password' => bcrypt('cuchuflus5'),
//        'security_question' => 'test',
//        'security_answer'   => 'First',
//    ]);
//});
