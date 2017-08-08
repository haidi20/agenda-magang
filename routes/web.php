<?php
<<<<<<< HEAD
//alfin
//ampunilah aku
=======
// dar haidi bikin alfian
>>>>>>> 603c47bb87a278ac7d4ee33e3afa6cb7cf46bf5d
Route::get('/',['middleware' => 'login' , function(){ return view('index.login'); }]);
Route::post('login' , 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::group(['middleware' => 'user'],function(){
<<<<<<< HEAD
  Route::resource('excel','ExcelController');
=======
  Route::resource('agenda' , 'AgendaController');
>>>>>>> 603c47bb87a278ac7d4ee33e3afa6cb7cf46bf5d
  Route::resource('setting','SettingController');
  Route::resource('excel','ExcelController');
  Route::group(['middleware' => 'admin'],function(){
    Route::resource('proyek','ProyekController');
    Route::resource('user', 'UserController');
  });
});
  Route::resource('agenda' , 'AgendaController');
