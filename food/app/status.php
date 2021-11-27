<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
     public function page(){
         return $this->hasMany('App\Page','status_id');
     }

     public function categary(){
         return $this->hasMany('App\CategaryPost' ,'status_id');
     }
     public function post(){
        return $this->hasMany('App\Post' ,'status_id');
    }
    public function categary_product()
    {
        return $this->hasMany('App\CategaryProduct' ,'status_id');
    }
    public function product()
    {
        return $this->hasMany('App\Product' ,'status_id');
    }
    public function slider()
    {
        return $this->hasMany('App\Slider' ,'status_id');
    }
    //
}
