<?php

namespace App\Http\Controllers;

use App\custome\FilterDropdown ;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Agenda;
use App\Proyek;
use App\User;
use Excel;
use Auth;
use DB;

class AgendaController extends Controller
{
  public function index(Request $request){
    \DB::enableQueryLog();
    //filter dropdown untuk value
    $changeUser     = FilterDropdown::user($request);
    $changeProyek   = FilterDropdown::proyek($request);
    $changeDate1    = FilterDropdown::date1(request($request));
    $changeDate2    = FilterDropdown::date2(request($request));
    // id user
    $id             = Auth::id();
    // menampilkan data di per'dropdown
    $user           = User::find($id);
    $users          = User::select('name')->groupBy('name')->get();
    $proyek         = Proyek::select('nm_proyek')->groupBy('nm_proyek')->get();
    $date           = Agenda::select('tanggal')->groupBy('tanggal')->get();
    //filtering data
    $agenda = Agenda::FilterDate()
                    ->FilterUser($id)
                    ->FilterProyek()
                    ->QueryAgenda()
                    ->get();
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
                    'changeDate2'   =>$changeDate2,
                                ]);
  }

  public function store(Request $request){
    $jam_mulai        = request('tanggal').' '.request('jam_mulai');
    $jam_selesai      = request('tanggal').' '.request('jam_selesai');
    $agenda = Agenda::insert([
      'user_id'       => Auth::id(),
      'proyek_id'     => request('proyek'),
      'kegiatan'      => request('kegiatan'),
      'jam_mulai'     => $jam_mulai,
      'jam_selesai'   => $jam_selesai,
      'keterangan'    => request('keterangan'),
    ]);

    if($agenda){
      return redirect('agenda');
    }else{
      return redirect('/');
    }
  }
}
