<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Subcriber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role->name =='Subcriber'){
            return  \redirect('admin/dashboard')->with('status' ,'Bạn không đủ quyền để thực hiện thao tác này !');
        }
        return $next($request);
    }
}
