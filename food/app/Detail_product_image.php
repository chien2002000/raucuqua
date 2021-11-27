<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_product_image extends Model
{
        protected $fillable =['img_detail' , 'product_id'];
        function product()
        {
        return $this->belongsTo('App\Product');
        }
    //
}
