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
    public function scopeFilter($query, $tahun, $bulan)
    {
      return $query->whereYear('tanggal', $tahun)
                   ->whereMonth('tanggal','') ;
    }
}
