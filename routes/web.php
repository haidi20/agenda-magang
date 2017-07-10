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

// Route::group(['middleware' => 'login'],function(){
  Route::get('/', function () {
    return view('index.login');
  });
  Route::post('/login' , 'AgendaController@login');
// });

Route::get('/logout', 'AgendaController@logout');

Route::get('/excel','AgendaController@excel');

Route::group(['middleware' => 'user'],function(){
  Route::get('/home/{id}', 'AgendaController@home');
  Route::get('/agenda', function () {
      return view('index.tambah_agenda');
  });
  Route::post('/tambah/agenda','AgendaController@tam_agen');
});

Route::group(['middleware' => 'admin'],function(){
  Route::post('/tambah/user', 'AgendaController@tam_user');
  Route::get('/lihat/user', function () {
      return view('index.table_user');
  });
});
