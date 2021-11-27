<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategaryProduct extends Model
{
    protected $fillable = ['name' , 'slug' , 'status_id' ,'parent_id' ,'user_id'];
    function user()
    {
        return $this->belongsTo('App\Users');
    }
    function status()
    {
        return $this->belongsTo('App\status');
    }
    function categary_child()
    {
        return $this->hasMany('App\CategaryProduct','parent_id' );
    }
    function product()
    {
        return $this->belongsTo('App\Product' , 'categary_id');
    }
    //
}
