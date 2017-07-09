<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Agenda ;
use DB ;

class AgendaController extends Controller
{

    public function home($id){
      // \DB::enableQueryLog();

      if(Auth::user()->status == 1){
        $agenda = Agenda::all();
        $user = User::find($id);
        $user_s = User::all();
      }else{
        $agenda = Agenda::where('user_id' , $id)->get();
        $user_s = User::all();
        $user = User::find($id);
      }

      // dd(DB::getQueryLog($agenda));
      return view('layouts.index',['agendaa'=>$agenda, 'users' => $user_s , 'user' => $user]);
    }

    public function tam_agen(Request $request){
      $id = $request->id ;
      $tanggal = $request->tanggal ;
      $jam_start = $request->jam_start ;
      $jam_end = $request->jam_end;
      $nm_keg = $request->nm_keg ;
      $nm_pro = $request->nm_pro ;
      $ket    = $request->ket ;

      // $tanggals = explode(' ' , $tanggal) ;
      // foreach ($tanggals as $key => $value) {
      //   echo $key . ' = ' . $value . '<br>' ;
      // }

      // return $id. ' ' . $tanggal. ' ' . $jam_start. ' ' . $jam_end. ' ' . $nm_keg. ' ' . $nm_pro. ' ' . $ket ;

      $agenda = Agenda::insert([
        'user_id'       => $id,
        'nm_project'    => $nm_pro,
        'kegiatan'      => $nm_keg,
        'tanggal'       => $tanggal,
        'jam_start'     => $jam_start,
        'jam_end'       => $jam_end,
        'keterangan'    => $ket
      ]);

      if($agenda){
        return redirect('/home/'.Auth::id());
      }else{
        return redirect('/');
      }


    }

    public function tam_user(Request $request){
      $name = $request->name ;
      $pass = $request->pass ;
      $email = $request->email ;

      $input = User::insert([
        'name'    => $name,
        'email'   => $email,
        'password'=> bcrypt($pass),
        'status'  => 0
      ]);

      if($input){
        return redirect('/home/'.Auth::id());
      }else{
        return redirect('/');
      }
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

    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
