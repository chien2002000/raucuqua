<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
        use SoftDeletes;
        protected $fillable =['post_title' ,'thumbnail' ,'content' ,'excerpts' ,'categary_id' ,'user_id' ,'status_id' ,'slug' ,'hightlight'];
     function user(){
        return $this->belongsTo('App\User');
    }
    function categary(){
        return $this->belongsTo('App\CategaryPost');
    }
    function status(){
        return $this->belongsTo('App\status');
    }
    //
}
