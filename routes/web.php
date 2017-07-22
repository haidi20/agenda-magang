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
    if(Auth::check()){
      return redirect('home/' . Auth::id());
    }
      return view('index.login');
  });
  Route::post('/login' , 'LoginController@login');
  Route::get('/logout', 'LoginController@logout');

Route::get('/excel/{id}','ExcelController@store'); // convert to excel

Route::group(['middleware' => 'user'],function(){
  Route::get('/agenda/{id}','AgendaController@index');

  Route::group(['middleware' => 'admin'],function(){
    Route::get('/user/{id}', 'UserController@index');
  });
});
