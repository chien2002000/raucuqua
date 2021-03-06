<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
     public function page(){
         return $this->hasMany('App\Page','status_id');
     }
    //
}
