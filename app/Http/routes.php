<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('user', [
    'as' => 'profile', 'uses' => 'siteController@index'
]);

Route::any('save','siteController@save');

Route::any('login','siteController@login')->name('yy');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index');
    Route::get('post','PostController@index');
    Route::any('admin-login', 'Auth\AdminController@admin_login')->name('admin-login');
    //captcha
    Route::any('captcha', 'Auth\AdminController@captcha')->name('captcha');

    Route::get('api','Auth\apiController@index');
    Route::any('api_login','Api\AppController@login');

    //Auth
});

Route::group(['middleware' => ['web','auth']], function () {
    Route::any('post/create','PostController@create')->name('create');
    Route::any('post/save','PostController@save')->name('save');

    Route::get('post/update/{id}','PostController@update')->name('post.update');


    //Route::get('api','Auth\ApiController@index');

});