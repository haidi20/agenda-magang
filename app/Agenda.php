<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda' ;

    protected $hidden = [
      'id' , 'user_id'
    ] ;
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
