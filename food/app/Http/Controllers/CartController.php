<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\CategaryProduct;

class CartController extends Controller
{
    public function add(Request $request , $id)
    {
       $qty =  $request->input('qty');
        $product_by_id = Product::find($id);
        if($product_by_id->quantity != 0)
        {
            Cart::add([
                'id' => $product_by_id->id,
                'name' => $product_by_id->product_title,
                'qty' =>  $qty,
                'price' => $product_by_id->price_new,
                'options' => [
                            'thumb' => $product_by_id->product_thumb,
                            'code' => $product_by_id->code,
                            'quantity'=>$product_by_id->quantity,
                    ]
                ]);
        }
    }
    public function show()
    {
        $categary_pro = CategaryProduct::where('status_id',1)->get();
        $lighthight_pro = Product::where([
            'status_id'=>1,
            'status_product_id'=>1
             ])->paginate(8);
        return \view('client.cart.show' , \compact('categary_pro' , 'lighthight_pro'));
    }

    public function update(Request $request)
    {
        if(!empty($request->input('qty')))
        {
            $qty_new = $request->input('qty');
            foreach($qty_new as $k=>$v)
            {
                Cart::update($k , $v);
            }
        }
        return \redirect('cart/show');
    }
    public function delete($id)
    {
        Cart::remove($id);
        return \redirect('cart/show');
    }
    public function update_ajax(Request $request)
    {
        if(!empty($request->input('id') && !empty($request->input('qty'))))
        {
            $id = $request->input('id');
            $qty = $request->input('qty');
           $cart_update = Cart::update($id , $qty);
           $count = Cart::count();
            $total_cart = array(
                'total' =>number_format($cart_update->subtotal , 0 ,'' , '.')."đ",
                'subtotal' =>  number_format(Cart::total() , 0 ,'' , '.'),
                'count'=>"($count)",
            );
            return \json_encode($total_cart);
        }
    }
    public function add_home(Request $request)
    {
            if(!empty($request->input('id')))
            {
                $id =$request->input('id');
                $product_by_id = Product::find($id);
                if($product_by_id->quantity != 0)
                {
                    Cart::add([
                        'id' => $product_by_id->id,
                        'name' => $product_by_id->product_title,
                        'qty' =>  1,
                        'price' => $product_by_id->price_new,
                        'options' => [
                                    'thumb' => $product_by_id->product_thumb,
                                    'code' => $product_by_id->code,
                                    'quantity'=>$product_by_id->quantity,
                            ]
                        ]);
                        $count_cart =Cart::count();
                        $count =[
                            'count'=> "($count_cart)",
                        ];
                }else
                {
                    $count =[
                        'message'=>'Sản phẩm đã hết hàng',
                    ];
                }
                    return \json_encode($count);
            }

    }
    //
}
