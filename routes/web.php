<?php
// dar haidi bikin alfian
Route::get('/',['middleware' => 'login' , function(){ return view('index.login'); }]);
Route::post('login' , 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::group(['middleware' => 'user'],function(){
  Route::resource('agenda' , 'AgendaController');
  Route::resource('setting','SettingController');
  Route::resource('excel','ExcelController');
  Route::group(['middleware' => 'admin'],function(){
    Route::resource('proyek','ProyekController');
    Route::resource('user', 'UserController');
  });
});
