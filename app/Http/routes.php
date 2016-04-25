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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['web']], function () {
    Route::post('/franchise/createFranchise', 'FranchiseController@create');
    Route::post('/user/add', 'UserController@create');
    Route::post('/user/update', 'UserController@update');
    Route::post('/document/upload', 'DocumentController@create');
});
Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('/franchiseCreate', 'FranchiseController@add');
Route::get('/franchise/all', 'FranchiseController@index');
Route::get('/franchise/view/{franchise}', 'FranchiseController@view');
Route::get('/download/{id}', 'DocumentController@download');
Route::get('/documents','DocumentController@view');
Route::get('/user/edit', 'UserController@edit');

