<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Agenda ;
use DB ;
use Excel ;
use App\custome\FilterDropdown ;

class AgendaController extends Controller
{
  public function index(Request $request){
    \DB::enableQueryLog();
    //filter dropdown untuk value
    $changeUser   = FilterDropdown::user($request);
    $changeProyek = FilterDropdown::proyek($request);
    $changeDate1  = FilterDropdown::date1(request($request));
    $changeDate2  = FilterDropdown::date2(request($request));
    // id user
    $id           = Auth::id() ;
    // menampilkan data di per'dropdown
    $user         = User::find($id);
    $users        = User::select('name')->groupBy('name')->get();
    $proyek       = Agenda::select('nm_proyek')->groupBy('nm_proyek')->get();
    $date         = Agenda::select('tanggal')->groupBy('tanggal')->get();
    //filtering data
    $agenda = Agenda::FilterDate()
                  ->FilterUser($id)
                  ->FilterProyek()
                  ->QueryAgenda()
                  ->get();
    // return $agenda ;
    // dd(DB::getQueryLog());
    return view('index.agenda',[
                                'agendaa'       =>$agenda,
                                'user'          =>$user,
                                'users'         =>$users,
                                'proyekk'       =>$proyek ,
                                'datee'         =>$date,
                                'changeUser'    =>$changeUser,
                                'changeProyek'  =>$changeProyek,
                                'changeDate1'   =>$changeDate1,
                              ]);
  }

  public function store(Request $request)
  {
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
      return redirect('agenda');
    }else{
      return redirect('/');
    }
  }
}
