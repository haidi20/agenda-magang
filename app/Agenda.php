<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda' ;
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
