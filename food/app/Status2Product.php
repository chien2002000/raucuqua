<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status2Product extends Model
{
    function product()
        {
            return $this->hasMany('App\Product' , 'status2_product_id');
        }
    //
}
