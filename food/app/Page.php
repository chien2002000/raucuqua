<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
        use SoftDeletes;
        protected $fillable = ['page_title' , 'slug' , 'content' ,'status_id' ,'user_id'];
        function status(){
            return $this->belongsTo('App\status');
        }
        function user(){
            return $this->belongsTo('App\User');
        }
    //
}
