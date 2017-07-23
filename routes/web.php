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

Route::group(['middleware' => 'login'], function(){
  Route::get('/',function(){ return view('index.login'); });
});
Route::post('/login' , 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::group(['middleware' => 'user'],function(){
  Route::resource('/agenda','AgendaController');
  Route::group(['middleware' => 'admin'],function(){
    Route::resource('/user', 'UserController');
  });
});
