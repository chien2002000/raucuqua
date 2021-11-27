<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' ,'role_id','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        public function role(){
            return $this->belongsTo('App\Role');
        }
        public function page(){
            return $this->hasMany('App\Page','user_id');
        }
        public function post(){
            return $this->hasMany('App\Post' , 'user_id');
        }
        public function categaryPost()
        {
            return $this->hasMany('App\CategaryPost' ,'user_id');
        }
        public function categary_product()
        {
            return $this->hasMany('App\CategaryProduct' ,'user_id');
        }
        public function product()
        {
            return $this->hasMany('App\Product' ,'user_id');
        }
        public function slider()
        {
            return $this->hasMany('App\Slider' ,'userid');
        }
}
