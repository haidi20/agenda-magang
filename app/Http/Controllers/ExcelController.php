<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
use App\Agenda ;
use Excel ;
use App\custome\FilterDropdown ;

class ExcelController extends Controller
{
  public function index(Request $request){
    //filter dropdown untuk value
    $changeUser   = FilterDropdown::user($request) ;
    $changeProyek = FilterDropdown::proyek($request) ;
    $changeDate1  = FilterDropdown::date1(request($request));
    $changeDate2  = FilterDropdown::date2(request($request));
    // id user
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
                
    Excel::create('fileAgenda_'.$user->name , function($excel) use ($agenda){
      $excel->sheet('mySheet' , function($sheet) use ($agenda){
        $sheet->fromArray($agenda);
      });
    })->download('xlsx');
  }
}
