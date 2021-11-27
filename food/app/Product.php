<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
        protected $fillable = ['product_title' , 'product_thumb' ,'code' , 'price' , 'price_new','excerpts','content','categary_id','user_id','status_id','status_product_id','status2_product_id' ,'slug' ,'quantity'];
  function status_product()
    {
      return $this->belongsTo('App\StatusProduct');
    }
  function status2_product()
    {
    return $this->belongsTo('App\Status2Product');
    }
  function user()
    {
    return $this->belongsTo('App\User');
    }
    function status()
    {
    return $this->belongsTo('App\status');
    }
    function categary()
    {
    return $this->belongsTo('App\CategaryProduct');
    }
    function detailImg()
    {
        return $this->hasMany('App\Detail_product_image', 'product_id');
    }
    function order()
    {
        return $this->belongsToMany('App\Order');
    }

    //
}
