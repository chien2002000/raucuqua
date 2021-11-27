<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
        function order()
        {
            return $this->hasMany('App\Order' , 'pay_id');
        }
    //
}
