<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProduct extends Model
{
        function product()
        {
            return $this->hasMany('App\Product' , 'status_product_id');
        }
    //
}
