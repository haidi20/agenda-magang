<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Agenda ;

class AgendaController extends Controller
{
    public function home($id)
    {
      $user = User::find($id);
      return view('layouts.index',['user'=>$user]);
    }
    public function tam_agen(Request $request)
    {
      $id = $request->id ;
      $tanggal = $request->tanggal ;
      $jam_start = $request->jam_start ;
      $jam_end = $request->jam_end;
      $nm_keg = $request->nm_keg ;
      $nm_pro = $request->nm_pro ;
      $ket    = $request->ket ;

      // return $id. ' ' . $tanggal. ' ' . $jam_start. ' ' . $jam_end. ' ' . $nm_keg. ' ' . $nm_pro. ' ' . $ket ;


    }
    public function login(Request $request){
      $name = $request->name ;
      $pass = $request->pass ;

      if(Auth::attempt(['name' => $name , 'password' => $pass])){
        return redirect('/home/'.Auth::id());
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
