<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Agenda ;
use Excel ;

class UserController extends Controller
{
  public function store(Request $request){
    $name     = $request->name ;
    $pass     = $request->pass ;
    $email    = $request->email ;
    $jabatan  = $request->jabatan;

    $input = User::insert([
      'name'    => $name,
      'email'   => $email,
      'password'=> bcrypt($pass),
      'level'   => 'user',
      'jabatan' => $jabatan
    ]);

    if($input){
      return redirect('/home/'.Auth::id());
    }else{
      return redirect('/');
    }
  }

  public function update(Request $request, $id)
  {
    return 'update' ;
  }
}
