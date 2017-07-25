<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Agenda ;
use Excel ;

class ExcelController extends Controller
{
  public function show(Request $request){
    Excel::create('fileAgenda' , function($excel){
     $excel->sheet('mySheet' , function($sheet){
       $sheet->fromArray([$agenda]);
     });
   })->download('xlsx');
    // \DB::enableQueryLog();
    // dd($agenda);
    // dd(DB::getQueryLog($agenda));
    // $field = ['users.name' ,
    //           'agenda.nm_proyek' ,
    //           'agenda.kegiatan' ,
    //           'agenda.tanggal' ,
    //           'agenda.jam_mulai' ,
    //           'agenda.jam_selesai' ,
    //           'agenda.keterangan'] ;
    // $agenda = Agenda::join('users' ,'agenda.user_id' , '=', 'users.id' )
    //                 ->select($field)
    //                 ->where('user_id' , $id)
    //                 ->get()->toArray();
    // if(Auth::user()->level == 'admin'){
    // $agenda = Agenda::join('users' ,'agenda.user_id' , '=', 'users.id' )
    //                   ->select('users.name' , 'agenda.*')
    //                   ->get()->toArray();
    // }
    // // return view('index.ExportClients', compact('agenda'));
    // Excel::create('fileAgenda' , function($excel) use ($agenda){
    //   $excel->sheet('mySheet' , function($sheet) use ($agenda){
    //     $sheet->fromArray($agenda);
    //   });
    // })->download('xlsx');
    // dd($agenda) ;
  }
}
