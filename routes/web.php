<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/reg','registerController@register');
Route::post('/insert','registerController@insert');


Route::get('/login','loginController@login');
Route::post('/check','loginController@check');

Route::get('/view','viewController@view');

Route::get('/phpinfo', function () {
    return view('phpinfo');
});


