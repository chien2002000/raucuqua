<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Status_order;
use App\Detail_order;
use Gloudemans\Shoppingcart\Facades\Cart;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(function($request , $next){
            session(['Model_active' =>'dashboard']);
           return $next($request);
        });
    }
        public function show(){


                $order_list = Order::orderBy('id' ,'DESC')->paginate(10);
                $count_success = Order::where('status_order' ,4)->count();
                $count_Processing = Order::where('status_order' ,2)->count();
                $count_cancel = Order::where('status_order' ,5)->count();
                $temple = 0;
                if($order_list->count() >0)
                {
                    foreach($order_list as $total)
                    {
                            $total_all = $temple+=$total->total;
                    }
                    return \view('admin.dashboard' , \compact('order_list' , 'total_all' , 'count_success' , 'count_Processing' ,'count_cancel'));
                }

            return \view('admin.dashboard' , \compact('order_list'  , 'count_success' , 'count_Processing' ,'count_cancel'));
        }
    //
}
