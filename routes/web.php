<?php

Route::get('/',['middleware' => 'login' , function(){ return view('index.login'); }]);
Route::post('login' , 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::group(['middleware' => 'user'],function(){
  route::resource('excel','ExcelController');
  Route::resource('agenda' , 'AgendaController');
  Route::group(['middleware' => 'admin'],function(){
    Route::resource('user', 'UserController');
  });
});
