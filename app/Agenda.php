<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable ;
use Auth;

class Agenda extends Model
{
    use Searchable;
    protected $table = 'agenda' ;
    protected $hidden = [
      'id' , 'user_id'
    ] ;
    public function scopeFilterProyek($query)
    {
      $proyek = request('proyek');
      if (!empty($proyek)) {
        $agenda = $query->where('nm_proyek',$proyek);
      }
    }
    public function scopeFilterDate($query)
    {
      $mulai = request('date1');
      $akhir = request('date2');

      if(!empty($mulai)){
        if(!empty($mulai) && !empty($akhir)){
          $agenda = $query->whereBetween('tanggal', compact('mulai','akhir'));
        }else{
          $agenda = $query->whereDate('tanggal' , $mulai);
        }
      }
    }
    public function scopeFilterUser($query,$id)
    {
      $user = request('user');
      if(!empty($user)){
        $agenda = $query->where('users.name' , $user);
      }elseif(Auth::user()->level == 'user'){
        $agenda = $query->where('user_id' , $id);
      }
    }
    public function scopeQueryAgenda($query)
    {
      $agenda = $query->join('users','agenda.user_id','=','users.id')
                      ->select('users.name' , 'agenda.*') ;
    }
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
