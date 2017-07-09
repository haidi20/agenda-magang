<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;

class AgendaController extends Controller
{
    public function login(Request $request){
      $name = $request->name ;
      $pass = $request->pass ;

      if(Auth::attempt(['name' => $name , 'password' => $pass])){
        return redirect('/home');
      }else{
        return redirect('/');
      }

    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
}
