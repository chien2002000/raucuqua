<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use SoftDeletes;
    protected $fillable = ['slider_title' , 'img_slider' , 'user_id' ,'status_id' ];
        public function user()
        {
            return $this->belongsTo('App\User');
        }
        public function status()
        {
            return $this->belongsTo('App\status');
        }
    //
}
