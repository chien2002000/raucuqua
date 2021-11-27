<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_order extends Model
{
    function order()
        {
            return $this->hasMany('App\Order' , 'status_order');
        }
    //
}
