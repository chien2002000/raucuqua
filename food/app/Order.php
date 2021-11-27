<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use SoftDeletes;
    protected $fillable =['fullName' ,'phone' ,'email' ,'address' ,'note' ,'status_order' ,'pay_id' ,'total','code','count_total'];
    function pay()
    {
        return $this->belongsTo('App\Pay');
    }
    function status_oder()
    {
        return $this->belongsTo('App\Status_order' ,'status_order');
    }
    function product()
    {
        return $this->belongsToMany('App\Product', 'detail_orders');
    }
    function detail_order()
    {
        return $this->hasMany('App\Detail_order' , 'order_id');
    }
    //
}
