<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategaryPost extends Model
{
    use SoftDeletes;
    protected $fillable = ['name' , 'slug' , 'status_id' ,'parent_id' ,'user_id'];
    //
    function post(){
        return $this->hasMany('App\Post' , 'categary_id');
    }
    function status(){
        return $this->belongsTo('App\status' );
    }
    function categary_child(){
        return $this->hasMany('App\CategaryPost','parent_id' );
    }
    function user()
    {
        return $this->belongsTo('App\Users');
    }
}
