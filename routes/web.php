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

Route::get('/',['middleware' => 'login' , function(){ return view('index.login'); }]);
Route::post('login' , 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::group(['middleware' => 'user'],function(){
  Route::get('agenda',function(){ return redirect()->to('/agenda'); });
  Route::resource('agenda' , 'AgendaController');
  Route::group(['middleware' => 'admin'],function(){
    Route::get('user',function(){ return redirect()->to('/user'); });
    Route::resource('user', 'UserController');
  });
});
