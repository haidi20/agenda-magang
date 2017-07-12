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

    public function index($id){
      // \DB::enableQueryLog();

      $user_s     = User::all();
      $user       = User::find($id);
      if(Auth::user()->level == 'admin'){
        $agenda     = Agenda::all();
      }else{
        $agenda     = Agenda::where('user_id' , $id)->get();
      }

      // dd(DB::getQueryLog($agenda));
      return view('layouts.index',['agendaa'=>$agenda, 'users' => $user_s , 'user' => $user]);
    }

    public function store(Request $request){
      $id               = $request->id ;
      $tanggal_sebelum  = $request->tanggal ;
      $jam_mulai        = $request->jam_mulai ;
      $jam_selesai      = $request->jam_selesai;
      $nm_keg           = $request->nm_keg ;
      $nm_pro           = $request->nm_pro ;
      $ket              = $request->ket ;

      $tanggal_array    = explode(' ' , $tanggal_sebelum) ;
      $tanggal_array1   = [$tanggal_array[3], $tanggal_array[2], $tanggal_array[1]] ;
      $tanggal          = implode(' ' , $tanggal_array1);

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
}
