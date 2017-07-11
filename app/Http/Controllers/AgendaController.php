<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Agenda ;
use DB ;
use Excel ;

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

    public function excel(Request $request, $id){
      // \DB::enableQueryLog();
      // dd($agenda);
      // dd(DB::getQueryLog($agenda));
      $field = ['users.name' ,
                'agenda.nm_proyek' ,
                'agenda.kegiatan' ,
                'agenda.tanggal' ,
                'agenda.jam_mulai' ,
                'agenda.jam_selesai' ,
                'agenda.keterangan'] ;
      $agenda = Agenda::join('users' ,'agenda.user_id' , '=', 'users.id' )
                      ->select($field)
                      ->where('user_id' , $id)
                      ->get()->toArray();
      if(Auth::user()->status == 1){
      $agenda = Agenda::join('users' ,'agenda.user_id' , '=', 'users.id' )
                        ->select('users.name' , 'agenda.*')
                        ->get()->toArray();
      }
      // return view('index.ExportClients', compact('agenda'));
      Excel::create('fileAgenda' , function($excel) use ($agenda){
        $excel->sheet('mySheet' , function($sheet) use ($agenda){
          // dd($agenda) ;
          // $sheet->loadView('index.ExportClients')->with('agenda' , $agenda);
          $sheet->fromArray($agenda);
        });
      })->download('xlsx');
      // dd($agenda) ;
    }

    public function tam_agen(Request $request){
      $id   = $request->id ;
      $tanggal_sebelum  = $request->tanggal ;
      $jam_mulai  = $request->jam_mulai ;
      $jam_selesai  = $request->jam_selesai;
      $nm_keg   = $request->nm_keg ;
      $nm_pro   = $request->nm_pro ;
      $ket      = $request->ket ;

      $tanggal_array = explode(' ' , $tanggal_sebelum) ;
      $tanggal_array1 = [$tanggal_array[3], $tanggal_array[2], $tanggal_array[1]] ;
      $tanggal = implode(' ' , $tanggal_array1);

      // return $id. ' ' . $tanggal. ' ' . $jam_mulai. ' ' . $jam_selesai. ' ' . $nm_keg. ' ' . $nm_pro. ' ' . $ket ;

      $agenda = Agenda::insert([
        'user_id'       => $id,
        'nm_proyek'     => $nm_pro,
        'kegiatan'      => $nm_keg,
        'tanggal'       => $tanggal,
        'jam_mulai'     => $jam_mulai,
        'jam_selesai'   => $jam_selesai,
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
        return redirect('/')->with('note' , 'maaf, ada kesalahan pada username atau password anda');
      }

    }

    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
