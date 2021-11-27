<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware(function($request , $next){
            session(['Model_active' =>'roles']);
           return $next($request);
        });
    }
    public function list()
    {

        $list_role =Role::all();
        return \view('admin.role.list' , \compact('list_role'));
    }
    //
}
