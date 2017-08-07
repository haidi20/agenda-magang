<?php

namespace App\Http\Controllers;

use App\custome\FilterDropdown ;
use PHPExcel_Worksheet_Drawing;
use Illuminate\Http\Request;
use App\Agenda;
use App\Proyek;
use App\User;
use Excel;
use Auth;


class ExcelController extends Controller
{
  public function index(Request $request){
    \DB::enableQueryLog();
    //filter dropdown untuk value
    $changeUser     = FilterDropdown::user($request);
    $changeProyek   = FilterDropdown::proyek($request);
    $changeDate1    = FilterDropdown::date1(request($request));
    $changeDate2    = FilterDropdown::date2(request($request));
    // id dan name user
    $id             = Auth::id();
    $nama           = request('user') ;
    // menampilkan data di per'dropdown
    $user           = User::find($id);
    $users          = User::select('name')->where('level' , '!=' , 'admin')->get();
    $proyek         = Proyek::all();
    //filtering data
    $agenda = Agenda::FilterDate()->FilterUser($id)->FilterProyek()->QueryAgenda()->get();
    // dd($agenda);
    //export ke excel
    Excel::create('fileAgenda_'.$user->name , function($excel) use ($id,$agenda,$nama){
      $excel->sheet('mySheet' , function($sheet) use ($id,$agenda,$nama){
        $objDrawing = new PHPExcel_Worksheet_Drawing;
				$tes = $objDrawing->setPath(public_path('img/DEKA.png')); //your image path
				$objDrawing->setCoordinates('F1');
				$objDrawing->setWorksheet($sheet);

				$sheet->setFontFamily('Times New Roman');
        $sheet->loadView('index.exportExcel')->with('item',$agenda)->with('id',$id)->with('nama',$nama);
      });
    })->download('xlsx');
  }
}
