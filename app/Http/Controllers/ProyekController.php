<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyek ;
use Carbon\Carbon;

class ProyekController extends Controller
{
    public function store()
    {
      $proyek = Proyek::insert([
        'nm_proyek'   => request('proyek'),
        'kode_proyek' =>'KP_'.rand(1,100),
        'created_at'  =>Carbon::now(),
        'updated_at'  =>Carbon::now(),
      ]);
      if ($proyek) {
        return redirect('agenda');
      }else{
        return redirect('agenda');
      }
    }
}
