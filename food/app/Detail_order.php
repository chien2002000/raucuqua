<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_order extends Model
{
    protected $fillable  =['product_id' ,'order_id' ,'quantity' ,'amount'];
    function product()
    {
        return $this->belongsTo('App\Product');
    }
    function order()
    {
        return $this->belongsTo('App\Order');
    }
    //
}
