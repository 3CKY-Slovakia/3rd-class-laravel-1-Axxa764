<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
*/


Route::get('skus', 'SkuskaController@skus');

//Route::get('skus', function () {
//    echo 'funguj'
//});

Route::get('/', function () {
    if (Auth::check()) {
        return view('welcome');
    } else {
        return Redirect::to('auth/login')->withErrors('Nie si prihlásený');
    }

});

Route::group(['prefix' => 'blog-post'], function () {
    Route::get('/{id}', function () {
        return view('blog-post');
    });
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');