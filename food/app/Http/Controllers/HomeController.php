<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategaryPost;
use App\CategaryProduct;
use App\Slider;
use App\Product;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categary_pro = CategaryProduct::where('status_id',1)->get();
        $list_slider = Slider::where('status_id' ,1)->get();
        $light_hight = Product::where([
            ['status_product_id', 1],
            ['status_id' ,1]
        ])->paginate(5);
        $list_categary = Product::where([
            ['status_id' ,1],
            ['categary_id' ,5],
        ])->paginate(8);
        $name_categary = CategaryProduct::where([
            ['id' ,5],
        ])->first();
        $list_categary2 =Product::where([
            ['status_id' ,1],
            ['categary_id' ,7],
        ])->paginate(8);
        $name_categary1 = CategaryProduct::where([
            ['id' ,7],
        ])->first();
        $list_post = Post::where([
            ['status_id' ,1],
            ['hightlight' ,1]
            ])->paginate(4);
        return \view('client.home' , \compact('categary_pro' , 'list_slider','light_hight' , 'list_categary' ,'name_categary' , 'list_categary2' ,'name_categary1' ,'list_post'));
    }
}
