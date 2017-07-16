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
// });

Route::get('/excel/{id}','ExcelController@store');

Route::group(['middleware' => 'user'],function(){
  Route::get('/home/{id}', 'AgendaController@index');
  Route::get('/agenda', function () {
      return view('index.tambah_agenda');
  });
  Route::post('/tambah/agenda','AgendaController@store');
});

Route::group(['middleware' => 'admin'],function(){
  Route::post('/tambah/user', 'UserController@store');
  Route::post('/edit/user' , 'UserController@edit');
  Route::post('/delete/user', 'UserController@destroy');
  Route::post('/update/user' ,'UserController@update');
  Route::get('/lihat/user', function () {
      return view('index.table_user');
  });
});
