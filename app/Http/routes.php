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


use App\Models\User;

Route::group(['namespace' => 'Auth'], function(){
    Route::get('login', 'AuthController@showLogin');
    Route::post('login', 'AuthController@doLogin');
    Route::post('logout', 'AuthController@doLogout');
    Route::get('/', 'HomeController@index');
});

//
//Route::get('test', function(){
//    return User::create([
//        'username' => 'admintest',
//        'email' => 'admin@localhost',
//        'password' => bcrypt('cuchuflus5'),
//        'security_question' => 'test',
//        'security_answer'   => 'First'
//    ]);
//});


Route::get('/', 'HomeController@index');