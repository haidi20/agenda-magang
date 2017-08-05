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
    $users          = User::select('name')->where('level' , '!=' , 'admin')->get();
    $proyek         = Proyek::all();
    //filtering data
    $agenda = Agenda::FilterDate()
                    ->FilterUser($id)
                    ->FilterProyek()
                    ->QueryAgenda()
                    ->get();
    // dd(DB::getQueryLog());
    // dd($agenda);
    return view('index.agenda',[
                    'agendaa'       =>$agenda,
                    'user'          =>$user,
                    'users'         =>$users,
                    'proyekk'       =>$proyek ,
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
      'updated_at'   =>Carbon::now(),
      'created_at'   =>Carbon::now(),
    ]);

    if($agenda){
      return redirect('agenda');
    }else{
      return redirect('/');
    }
  }

  public function update(Request $request, $id)
  {
    \DB::enableQueryLog();
    // dd($request->all());
    $agenda = Agenda::where('id',request('id_agenda'))->update([
      'jam_mulai'    =>request('tanggal').' '.request('jam_mulai'),
      'jam_selesai'  =>request('tanggal').' '.request('jam_selesai'),
      'kegiatan'     =>request('kegiatan'),
      'proyek_id'    =>request('proyek'),
      'keterangan'   =>request('keterangan'),
      'updated_at'   =>Carbon::now(),
      'created_at'   =>Carbon::now(),
    ]);
    // dd(DB::getQueryLog());
    if($agenda){
      return redirect('agenda');
      // return 'berhasil';
    }else{
      return redirect('agenda');
      // return 'gagal';
    }
  }

  public function destroy($id)
  {
    $agenda = Agenda::destroy($id);
    if($agenda){
      return redirect('agenda');
    }else{
      return redirect('agenda');
    }
  }
}
