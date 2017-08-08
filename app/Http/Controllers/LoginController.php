<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Agenda ;
use Excel ;

class LoginController extends Controller
{
  public function login(Request $request){
    $name = $request->name ;
    $pass = $request->pass ;

    if(Auth::attempt(['name' => $name , 'password' => $pass])){
      return redirect('/agenda');
    }else{
      return redirect('/')->with('note' , 'maaf, ada kesalahan pada username atau password anda');
    }

  }

  public function logout(){
    Auth::logout();
    return redirect('/');
  }
}
