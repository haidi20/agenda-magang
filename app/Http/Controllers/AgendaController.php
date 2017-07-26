<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Agenda ;
use DB ;
use Excel ;
use App\custome\Custome ;

class AgendaController extends Controller
{

  public function index(Request $request){
    \DB::enableQueryLog();
    $id         = Auth::id() ;
    // menampilkan data di per'dropdown
    $user       = User::find($id);
    $users      = User::select('name')->groupBy('name')->get();
    $proyek     = Agenda::select('nm_proyek')->groupBy('nm_proyek')->get();
    $date       = Agenda::select('tanggal')->groupBy('tanggal')->get();
    //filtering data
    $agenda = Agenda::FilterDate()
                ->FilterUser($id)
                ->FilterProyek()
                ->QueryAgenda()
                ->get();
    // return $agenda ;
    // dd(DB::getQueryLog());
    return view('index.agenda',['agendaa'=>$agenda, 'user' => $user, 'users' => $users, 'proyekk'=>$proyek , 'datee'=>$date]);
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
    if($tanggal_array[2] == 'January'){$bulan = 1;}
		else if($tanggal_array[2] == 'February'){$bulan = 2;}
		else if($tanggal_array[2] == 'March'){$bulan = 3;}
		else if($tanggal_array[2] == 'April'){$bulan = 4;}
		else if($tanggal_array[2] == 'May'){$bulan = 5;}
		else if($tanggal_array[2] == 'June'){$bulan = 6;}
		else if($tanggal_array[2] == 'July'){$bulan = 7;}
		else if($tanggal_array[2] == 'August'){$bulan = 8;}
		else if($tanggal_array[2] == 'September'){$bulan = 9;}
		else if($tanggal_array[2] == 'October'){$bulan = 10;}
		else if($tanggal_array[2] == 'November'){$bulan = 11;}
		else if($tanggal_array[2] == 'December'){$bulan = 12;}
    $tanggal_array1   = [$tanggal_array[3],'-', $bulan,'-', $tanggal_array[1]] ;
    $tanggal          = implode('' , $tanggal_array1);

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
