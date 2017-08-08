<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\custome\FilterDropdown ;
use Laravel\Scout\Searchable ;
use Carbon\Carbon ;
use Auth;

class Agenda extends Model
{
  protected $table = 'agenda' ;
  // protected $hidden = ['id' , 'user_id'] ;
  protected $dates = ['jam_mulai','jam_selesai'];
  public function scopeFilterProyek($query)
  {
    $proyek = FilterDropdown::proyek(request('proyek'));

    if (!empty($proyek)) {
      $agenda = $query->where('nm_proyek',$proyek);
    }
  }
  public function scopeFilterUser($query,$id)
  {
    $user = FilterDropdown::user(request('user'));
    if(!empty($user)){
      $agenda = $query->where('users.name' , $user);
    }
  }
  public function scopeFilterDate($query)
  {
    $mulai = FilterDropdown::date1(request('date1'));
    $akhir = FilterDropdown::date2(request('date2'));

    if(!empty($mulai)){
      if(!empty($mulai) && !empty($akhir)){
        $agenda = $query->whereBetween('jam_mulai', compact('mulai','akhir'));
      }else{
        $agenda = $query->whereDate('jam_mulai' , $mulai);
      }
    }
  }
  public function scopeQueryAgenda($query)
  {
    $agenda = $query->join('users','agenda.user_id','=','users.id')
                    ->join('proyek','agenda.proyek_id','=','proyek.id')
                    ->select('agenda.*')
                    ->orderBy('jam_mulai' , 'desc');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function proyek()
  {
    return $this->belongsTo('App\Proyek');
  }
}
