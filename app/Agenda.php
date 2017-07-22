<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable ;

class Agenda extends Model
{
    use Searchable;
    protected $table = 'agenda' ;
    protected $hidden = [
      'id' , 'user_id'
    ] ;
    public function searchableAs()
    {
      return 'kegiatan' ;
    }
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function scopeFilterDate($query,$tahun,$bulan,$tanggal)
    {
      $date = $query ;
      if ($tahun) {$date->whereYear('tanggal', $tahun);}
      if ($bulan) {$date->whereMonth('tanggal',$bulan) ;}
      if ($tanggal) {$date->whereDay('tanggal',$tanggal);}
      return $date ;
    }
}
