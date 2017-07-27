<?php

namespace App\Http\Controllers;

use PHPExcel_Worksheet_Drawing;
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
    $nama       = Auth::user()->name ;
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
                    ->orderBy('tanggal','desc')
                    ->get();
    // dd($agenda);
    //export ke excel
    Excel::create('fileAgenda_'.$user->name , function($excel) use ($id,$agenda,$nama){
      $excel->sheet('mySheet' , function($sheet) use ($id,$agenda,$nama){
        $objDrawing = new PHPExcel_Worksheet_Drawing;
				$tes = $objDrawing->setPath(public_path('img/DEKA.png')); //your image path
				$objDrawing->setCoordinates('F1');
				$objDrawing->setWorksheet($sheet);

				$sheet->setFontFamily('Times New Roman');
        $sheet->loadView('index.exportExcel2')->with('item',$agenda)->with('id',$id)->with('nama',$nama);
      });
    })->download('xlsx');
  }
}
