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

Route::get('/logout', function(){
  return 'logout' ;
});


Route::get('/home', function () {
  // if(Auth::user()->status == 1 || Auth::user()->status == 0){
    return view('index.home');
  // }else{
    // return redirect('/');
  // }
});

Route::get('/agenda', function () {
    return view('index.tambah_agenda');
});

Route::get('/tambah/user', function () {
    return view('index.tambah_user');
});

Route::get('/lihat/user', function () {
    return view('index.table_user');
});
