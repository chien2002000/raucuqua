<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Status_order;
use App\Detail_order;
use App\CategaryProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class OderController extends Controller
{
     public function list(Request $request)
     {
         if(!empty($request->input('status')))
         {
            $status_order = $request->input('status');
            if($status_order == 'all')
            {
                $order_list = Order::orderBy('id' ,'DESC')->paginate(10);
                $list_active = [7=>'Chờ duyệt' , 1=>'Đang xử lý' , 2=>'Đang vận chuyển' , 3=>'Thành công' ,4=>'huỷ' , 5=>'Xoá tạm thời' ,6=>'Xoá vĩnh viên'];
            }else if($status_order == 'queue')
            {
                $order_list = Order::orderBy('id' ,'DESC')->where('status_order' ,1)->paginate(10);
                $list_active = [ 1=>'Đang xử lý' , 2=>'Đang vận chuyển' , 3=>'Thành công' ,4=>'huỷ' , 5=>'Xoá tạm thời' ,6=>'Xoá vĩnh viên'];
            }else if($status_order =='processing')
            {
                $order_list = Order::orderBy('id' ,'DESC')->where('status_order' ,2)->paginate(10);
                $list_active = [ 7=>'Chờ duyệt' , 2=>'Đang vận chuyển' , 3=>'Thành công' ,4=>'huỷ' , 5=>'Xoá tạm thời' ,6=>'Xoá vĩnh viên'];
            }
            else if($status_order =='transported')
            {
                $order_list = Order::orderBy('id' ,'DESC')->where('status_order' ,3)->paginate(10);
                $list_active = [ 7=>'Chờ duyệt' , 1=>'Đang xử lý' , 3=>'Thành công' ,4=>'huỷ' , 5=>'Xoá tạm thời' ,6=>'Xoá vĩnh viên'];
            }else if($status_order =='success')
            {
                $order_list = Order::orderBy('id' ,'DESC')->where('status_order' ,4)->paginate(10);
                $list_active = [ 7=>'Chờ duyệt' , 1=>'Đang xử lý' ,2=>'Đang vận chuyển' ,4=>'huỷ' , 5=>'Xoá tạm thời' ,6=>'Xoá vĩnh viên'];
            }else if($status_order =='cancel')
            {
                $order_list = Order::orderBy('id' ,'DESC')->where('status_order' ,5)->paginate(10);
                $list_active = [ 7=>'Chờ duyệt' , 1=>'Đang xử lý' ,2=>'Đang vận chuyển' ,3=>'Thành công' , 5=>'Xoá tạm thời' ,6=>'Xoá vĩnh viên'];
            }else if($status_order =='trashed')
            {
                $order_list = Order::orderBy('id' ,'DESC')->onlyTrashed()->paginate(10);
                $list_active = [ 8=>'Khôi phục' ,6=>'Xoá vĩnh viên'];
            }
         }else
         {
              $keywork  = '';
              if(!empty($request->input('keywork')))
              {
                $keywork = $request->input('keywork');
              }

            $order_list = Order::orderBy('id' ,'DESC')->where('fullName' , 'LIKE' , "%{$keywork}%")->paginate(10);
            $list_active = [7=>'Chờ duyệt' , 1=>'Đang xử lý' , 2=>'Đang vận chuyển' , 3=>'Thành công' ,4=>'huỷ' , 5=>'Xoá tạm thời' ,6=>'Xoá vĩnh viên'];
         }
         $count_all = Order::orderBy('id' ,'DESC')->count();
         $count_queue =  Order::orderBy('id' ,'DESC')->where('status_order' ,1)->count();
         $count_processing =  Order::orderBy('id' ,'DESC')->where('status_order' ,2)->count();
         $count_transported =  Order::orderBy('id' ,'DESC')->where('status_order' ,3)->count();
         $count_success = Order::orderBy('id' ,'DESC')->where('status_order' ,4)->count();
         $count_cancel = Order::orderBy('id' ,'DESC')->where('status_order' ,5)->count();
         $count_trashed = Order::onlyTrashed()->count();
         $count = [$count_all , $count_queue ,$count_processing , $count_transported ,$count_success ,$count_cancel ,$count_trashed];
         return \view('admin.oder.list' ,\compact('order_list' , 'count' ,'list_active' ));
     }

     public function action(Request $request)
     {
        $request->validate([
            'select1'=>'required',
            'list_check'=>'required',
        ]);
        if(!empty($request->input('list_check') && !empty($request->input('select1'))))
        {
            $list_check = $request->input('list_check');
            $select = $request->input('select1');
            if($select == 7)
            {
                Order::whereIn('id' , $list_check)->update([
                    'status_order' =>1,
                ]);
                return \redirect("admin/order/list")->with('status' , 'Bạn đã chuyển trạng thái chờ duyệt thành công');
            }else if($select == 1)
            {
                Order::whereIn('id' , $list_check)->update([
                    'status_order' =>2,
                ]);
                return \redirect("admin/order/list")->with('status' , 'Bạn đã chuyển trạng thái đang xử lý thành công');
            }else if($select == 2)
            {
                Order::whereIn('id' , $list_check)->update([
                    'status_order' =>3,
                ]);
                return \redirect("admin/order/list")->with('status' , 'Bạn đã chuyển trạng thái đang vận chuyển  thành công');
            }else if($select == 3)
            {
                Order::whereIn('id' , $list_check)->update([
                    'status_order' =>4,
                ]);
                return \redirect("admin/order/list")->with('status' , 'Bạn đã chuyển trạng thái thành công');
            }else if($select == 4)
            {
                Order::whereIn('id' , $list_check)->update([
                    'status_order' =>5,
                ]);
                return \redirect("admin/order/list")->with('status' , 'Bạn đã chuyển trạng thái huỷ thành công');
            }
            else if($select == 5)
            {
                Order::whereIn('id' , $list_check)->delete();
                return \redirect("admin/order/list")->with('status' , 'Bạn đã xoá tạm thời thành công');
            }else if($select == 6)
            {
                Order::withTrashed()->whereIn('id' , $list_check)->forceDelete();
                return \redirect("admin/order/list")->with('status' , 'Bạn đã xoá vĩnh viễn thành công');
            }
            else if($select == 8)
            {
                Order::whereIn('id', $list_check)->onlyTrashed()->restore();
                return \redirect("admin/order/list")->with('status' , 'Bạn đã  khôi phục thành công');
            }
        }
     }

     public function detail($id)
     {
        $order_by_id = Order::find($id);
        $status_order = Status_order::all();
        $detail_pro_order = Order::find($id)->product;
      $detail_order =  DB::table('detail_orders')
        ->join('products','products.id' , '=' , 'detail_orders.product_id')
        ->select('products.product_title' , 'products.product_thumb' , 'products.price_new' , 'detail_orders.quantity' ,'detail_orders.amount')
        ->where('detail_orders.order_id' , $id)->get();
         return \view('admin.oder.detail' , \compact('order_by_id' , 'status_order' ,'detail_pro_order' ,'detail_order' , 'detail_order'));
     }
     public function detail_status(Request  $request , $id)
     {
          $status = $request->input('status');
          if($status == $status)
          {
              Order::where('id',$id)->update([
                'status_order'=> $status,
              ]);
          }
          return \redirect("admin/order/list")->with('status' , 'Bạn đã cập nhật đơn hàng thành công');
     }
     public function delete($id)
     {
         if(!empty($id))
         {
            Order::find($id)->delete();
         }
        return \redirect("admin/order/list")->with('status' , 'Bạn đã xoá đơn hàng thành công');
     }
    //  Client ORDER
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:10',
            'phone'=>'required|min:10',
            'email'=>'required|regex:/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/',
            'address'=>'required|min:10'
        ],
        [
            'required'=>':Attribute Không được để trống'
        ]
    );
    $order = Order::create([
        'fullName'=>$request->input('name'),
        'phone'=>$request->input('phone'),
        'email'=>$request->input('email'),
        'address'=>$request->input('address'),
        'note'=>$request->input('content'),
        'status_order'=>1,
        'pay_id'=>1,
        'total'=>Cart::total(),
        'code'=>Str::random(6),
        'count_total'=> Cart::count(),
    ]);
        $id = $order->id;
    //  Thêm bản deail order
    foreach(Cart::content() as $item)
    {
        Detail_order::create([
            'product_id'=>$item->id,
            'order_id'=>$id,
            'amount'=>$item->total,
            'quantity'=>$item->qty,
        ]);

        $quantity_new = $item->options->quantity - $item->qty ;
        $list_id =  $item->id;
        Product::where('id' ,$list_id)->update([
           'quantity'=>$quantity_new,
        ]);

        Cart::destroy();
        return \redirect('order/thanh-cong');
    }


}
    public function success()
    {
        $categary_pro = CategaryProduct::where('status_id',1)->get();
        return \view('client.cart.check_out' , \compact('categary_pro'));
    }
}
