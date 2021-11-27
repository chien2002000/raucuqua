<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\status;
use App\CategaryProduct;
use Illuminate\Support\Str;
use App\StatusProduct;
use App\Status2Product;
use App\DetailProductImage;
use App\Product;
use App\Detail_product_image;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(function($request , $next){
            session(['Model_active' =>'products']);
           return $next($request);
        });
    }
    public function cat_list()
    {
        $categary = CategaryProduct::all();
        function data_tree($data , $parent_id = 0 , $level = 0){
            $result = array();
            foreach($data as $item){
               if($item->parent_id == $parent_id){
                   $item['level'] = $level;
                   $result[] = $item;
                   $child = data_tree($data , $item->id , $level +1);
                   $result = array_merge($result , $child );
               }
               unset($item);
            }
            return $result;
        }
        $result1 =  data_tree($categary  , 0);
        $status = status::all();
        return \view('admin.product.list_cat' , \compact('status' , 'result1'));
    }
    public function cat_add(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required',
        ],
        [
            'required'=>':Attribute không được để trống',
        ],
        [
            'name' =>'Tên danh mục',
            'status'=>'Trạng thái',
        ]
        );
        if(empty($request->input('categary'))){
            CategaryProduct::create([
                'name'=>$request->input('name'),
                'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'status_id'=>$request->input('status'),
                'parent_id'=>0,
                'user_id'=>Auth::user()->id,
            ]);
        }else{
            CategaryProduct::create([
                'name'=>$request->input('name'),
                'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'status_id'=>$request->input('status'),
                'parent_id'=>$request->input('categary'),
                'user_id'=>Auth::user()->id,
            ]);
        }
        return \redirect('admin/product/cat/list')->with('status' , 'Bạn đã thêm danh mục thành công');
    }
    public function cat_edit($id)
    {
        $categary = CategaryProduct::all();
        function data_tree($data , $parent_id = 0 , $level = 0){
            $result = array();
            foreach($data as $item){
               if($item->parent_id == $parent_id){
                   $item['level'] = $level;
                   $result[] = $item;
                   $child = data_tree($data , $item->id , $level +1);
                   $result = array_merge($result , $child );
               }
               unset($item);
            }
            return $result;
        }
        $result1 =  data_tree($categary  , 0);
        $status = status::all();
        $cat_product = CategaryProduct::find($id);
        return \view('admin.product.edit_cat' , \compact('result1' , 'status' , 'cat_product'));
    }
    public function cat_update(Request  $request, $id)
    {
        $cat_product = CategaryProduct::find($id);
        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ],
        [
            'required'=>':Attribute không được để trống',
        ],
        [
            'name'=>'Tên danh mục',
            'status'=>'Trạng thái',
        ]
    );
    if($cat_product->parent_id == 0)
    {
        CategaryProduct::where('id' , $id)->update([
            'name'=>$request->input('name'),
            'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
            'parent_id'=>0,
            'status_id'=>$request->input('status'),
        ]);
     }else
     {
        CategaryProduct::where('id' , $id)->update([
            'name'=>$request->input('name'),
            'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
            'parent_id'=>$request->input('categary'),
            'status_id'=>$request->input('status'),
        ]);
     }
    return \redirect('admin/product/cat/list')->with('status' , 'Bạn đã cập nhật danh mục thành công');
    }

    public function cat_delete($id)
    {
        CategaryProduct::where('id' , $id)->delete();
        return \redirect('admin/product/cat/list')->with('status' , 'Bạn đã xoá danh mục thành công');
    }

    public function add()
    {
        $status_ware = Status2Product::all();
        $status_hight= StatusProduct::all();
        $categary = CategaryProduct::all();
        function data_tree($data , $parent_id = 0 , $level = 0){
            $result = array();
            foreach($data as $item){
               if($item->parent_id == $parent_id){
                   $item['level'] = $level;
                   $result[] = $item;
                   $child = data_tree($data , $item->id , $level +1);
                   $result = array_merge($result , $child );
               }
               unset($item);
            }
            return $result;
        }
        $result1 =  data_tree($categary  , 0);
        $status = status::all();
        return \view('admin.product.add' , \compact('result1' , 'status' ,'status_hight' ,'status_ware'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required:min:6',
                'price'=>'required',
                'code'=>'required',
                'extps'=>'required:6',
                'content'=>'required:6',
                'cat'=>'required',
                'file'=>'required',
                'status'=>'required',
                'images'=>'required',
                'quantity'=>'required',

        ],
        [
            'required'=>':attribute không được để trống',
            'min:6'=>':attribute phải dài hơn 6 khí tự'
        ],
        [
            'name'=>'Tên sản phẩm',
            'price'=>'Giá sản phẩm',
            'code'=>'Mã sản phẩm',
            'extps'=>'Mô tả',
            'content'=>'Nội dung',
            'cat'=>'Danh mục',
            'file'=>'Hình ảnh sản phẩm',
            'status'=>'Trạng thái',
            'images'=>'Ảnh chi tiết',
            'quantity'=>'Số lượng'
        ]
    );

    if($request->hasFile('file')){
        $file = $request->file;
        // Lấy tên file
        $file->getClientOriginalName();
        // Lấy đuôi file
        $file->getClientOriginalExtension();
        // Lấy kích thước file
        $file->getSize();
    $path= $file->move('public/uploads',$file->getClientOriginalName());
        $thumbnail ="public/uploads/".$file->getClientOriginalName();

    }
    if(!empty($request->input('fea')))
    {
        $add= Product::create([
            'product_title' => $request->input('name'),
            'product_thumb' => $thumbnail,
            'code' => $request->input('code'),
            'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
            'excerpts' => $request->input('extps'),
            'content' => $request->input('content'),
            'categary_id' => $request->input('cat'),
            'status_id' => $request->input('status'),
            'price'=>$request->input('price'),
            'price_new'=>$request->input('price_new'),
            'status_product_id' => $request->input('fea'),
            'status2_product_id' => $request->input('status_ware'),
            'quantity'=>$request->input('quantity'),
            'user_id'=>Auth::id(),
        ]);
    }else if(!empty($request->input('fea1')))
    {
        $add= Product::create([
            'product_title' => $request->input('name'),
            'product_thumb' => $thumbnail,
            'code' => $request->input('code'),
            'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
            'excerpts' => $request->input('extps'),
            'content' => $request->input('content'),
            'categary_id' => $request->input('cat'),
            'status_id' => $request->input('status'),
            'price'=>$request->input('price'),
            'price_new'=>$request->input('price_new'),
            'status_product_id' => $request->input('fea1'),
            'status2_product_id' => $request->input('status_ware'),
            'quantity'=>$request->input('quantity'),
            'user_id'=>Auth::id(),
        ]);
    }else if(!empty($request->input('fea2')))
    {
        $add= Product::create([
            'product_title' => $request->input('name'),
            'product_thumb' => $thumbnail,
            'code' => $request->input('code'),
            'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
            'excerpts' => $request->input('extps'),
            'content' => $request->input('content'),
            'categary_id' => $request->input('cat'),
            'status_id' => $request->input('status'),
            'price'=>$request->input('price'),
            'price_new'=>$request->input('price_new'),
            'status_product_id' => $request->input('fea2'),
            'status2_product_id' => $request->input('status_ware'),
            'quantity'=>$request->input('quantity'),
            'user_id'=>Auth::id(),
        ]);
    }else if(empty($request->input('fae')) && empty($request->input('fae1')) && empty($request->input('fae2'))){
        $add= Product::create([
            'product_title' => $request->input('name'),
            'product_thumb' => $thumbnail,
            'code' => $request->input('code'),
            'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
            'excerpts' => $request->input('extps'),
            'content' => $request->input('content'),
            'categary_id' => $request->input('cat'),
            'status_id' => $request->input('status'),
            'price'=>$request->input('price'),
            'price_new'=>$request->input('price_new'),
            'status_product_id' =>4,
            'status2_product_id' => $request->input('status_ware'),
            'quantity'=>$request->input('quantity'),
            'user_id'=>Auth::id(),
        ]);
    }

       $id =  $add->id;
    if($request->hasFile('images')){
        $img = $request->file('images');
        foreach($img as $file){
             // Lấy tên file
        $file->getClientOriginalName();
        // Lấy đuôi file
        $file->getClientOriginalExtension();
        // Lấy kích thước file
        $file->getSize();
        $path= $file->move('public/uploads',$file->getClientOriginalName());
        $thumbnail_detail ="public/uploads/".$file->getClientOriginalName();
        Detail_product_image::create([
                'img_detail'=>$thumbnail_detail,
                'product_id'=>$id,
            ]);
        }
    }
    return \redirect('admin/product/list')->with('status' , 'Bạn thêm sản phẩm thành công');
    }
    public function list(Request $request)
    {
            if(!empty($request->input('status')))
            {
                $status = $request->input('status');
                if($status == 'all')
                {
                    $list_product = Product::paginate(10);
                    $list_check=[0=>'Công khai',1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
                }else if($status =='active')
                {
                    $list_product = Product::where('status_id' ,1)->paginate(10);
                    $list_check=[1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
                }else if($status =='queue')
                {
                    $list_product = Product::where('status_id' ,2)->paginate(10);
                    $list_check=[0=>'Công Khai' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
                }else if($status =='trash')
                {
                    $list_product = Product::onlyTrashed()->paginate(10);
                    $list_check=[5=>'Khôi phục' ,3=>'Xoá vĩnh viễn'];
                }
            }else
            {
                    $keywork ='';
                if(!empty($request->input('search'))){
                    $keywork =$request->input('search');
                }
              $list_product=  Product::where('product_title' ,'LIKE' , "%{$keywork}%")->orWhere(
                'price' ,'LIKE' , "%{$keywork}%"
            )->paginate();
            $list_check=[0=>'Công khai',1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
            }
            $count_active = Product::where('status_id' , 1)->count();
            $count_queue = Product::where('status_id' , 2)->count();
            $count_trash =Product::onlyTrashed()->count();
            $count_all = Product::all()->count();
            $count = [$count_active , $count_queue ,$count_trash , $count_all];
            return \view('admin.product.list' , \compact('list_product' ,'count' ,'list_check'));
    }
    public function detail_ajax(Request $request)
    {
            if(!empty($request->input('id'))){
                $id =$request->input('id');
                $product_detail_id = Product::find($id);
                $product_by_id = array(
                    'fullName' => $product_detail_id->user->name,
                    'id'=>$product_detail_id->id,
                    'img'=>url($product_detail_id->product_thumb),
                    'categary'=>$product_detail_id->categary->name,
                    'price'=>number_format($product_detail_id->price , 0 ,'' , '.')."đ",
                    'price_new'=>number_format($product_detail_id->price_new , 0 ,'' , '.')."đ",
                    'title'=>$product_detail_id->product_title,
                    'lightHight'=>$product_detail_id->status_product->name,
                    'status2'=>$product_detail_id->status2_product->name,
                    'status'=>$product_detail_id->status->name,
                    'time'=>$product_detail_id->created_at,
                    'quantity'=>$product_detail_id->quantity,
                );
                 echo \json_encode($product_by_id);
            }
    }
    public function search_ajax(Request $request)
    {
        if(!empty($request->input('keywork')))
        {
             $value = $request->input('keywork');
            $search_ajax =Product::where('product_title' ,'LIKE' , "%{$value}%")->orWhere(
                'price' ,'LIKE' , "%{$value}%"
            )->get();
        }
        return \view('admin.product.search_ajax' , \compact('search_ajax'));

    }
    public function action(Request $request)
    {
        $request->validate([
            'select1'=>'required',
            'list_check'=>'required',
        ]);
                $list_check = $request->input('list_check');
            if(!empty($list_check))
            {
                $select = $request->input('select1');
                if($select == 0)
                {
                    Product::whereIn('id', $list_check)->update([
                       'status_id' => 1
                   ]);
                    return \redirect('admin/product/list')->with('status' , 'Bạn đã thay đổi trạng thái công khai thành công');
                }
                if($select == 1)
                {
                    Product::whereIn('id', $list_check)->update([
                       'status_id' => 2
                   ]);
                    return \redirect('admin/product/list')->with('status' , 'Bạn đã thay đổi trạng thái chờ duyệt thành công');
                }
                if($select == 2)
                {
                    Product::whereIn('id', $list_check)->delete();
                    return \redirect('admin/product/list')->with('status' , 'Bạn đã xoá tạm thời thành công');
                }
                if($select == 5)
                {
                    Product::whereIn('id', $list_check)->onlyTrashed()->restore();
                    return \redirect('admin/product/list')->with('status' , 'Bạn đã khôi phục thành công');
                }
                if($select == 3)
                {
                    Product::withTrashed()->whereIn('id' , $list_check)->forceDelete();
                    return \redirect('admin/product/list')->with('status' , 'Bạn đã xoá vĩnh viễn thành công');
                }
            }
    }
    public function list_detail(Request $request)
    {
        if(!empty($request->input('id')))
        {
                $id =$request->input('id');
            $list_product_id = Product::find($id);
            return \view('admin.product.detail_list' ,\compact('list_product_id'));
        }
    }
    public function sort_product(Request $request)
    {
        if($request->input('status') == 'active')
        {
            if(!empty($request->input('value')))
            {
                $select = $request->input('value');
                if($select ==='new_product')
                {
                    $list_product_sort = Product::orderBy('id', 'DESC')->where('status_id' ,1)->get();
                }else if($select ==='price_hight')
                {
                    $list_product_sort = Product::orderBy('price','DESC')->where('status_id' ,1)->get();
                }else if($select ==='price_low')
                {
                    $list_product_sort = Product::orderBy('price')->where('status_id' ,1)->get();
                }else if($select ==='hightlight')
                {
                    $list_product_sort = Product::where('status_product_id' ,1)->where('status_id' ,1)->get();
                }else if($select ==='selling')
                {
                    $list_product_sort = Product::where('status_product_id' ,2)->where('status_id' ,1)->get();
                }else if($select ==='stocking')
                {
                    $list_product_sort = Product::where('status2_product_id' ,1)->where('status_id' ,1)->get();
                }else if($select ==='out_stocking')
                {
                    $list_product_sort = Product::where('status2_product_id' ,2)->where('status_id' ,1)->get();
                }
            }
        }else if($request->input('status') == 'queue')
        {
            if(!empty($request->input('value')))
            {
                $select = $request->input('value');
                if($select ==='new_product')
                {
                    $list_product_sort = Product::orderBy('id', 'DESC')->where('status_id' ,2)->get();
                }else if($select ==='price_hight')
                {
                    $list_product_sort = Product::orderBy('price','DESC')->where('status_id' ,2)->get();
                }else if($select ==='price_low')
                {
                    $list_product_sort = Product::orderBy('price')->where('status_id' ,2)->get();
                }else if($select ==='hightlight')
                {
                    $list_product_sort = Product::where('status_product_id' ,1)->where('status_id' ,2)->get();
                }else if($select ==='selling')
                {
                    $list_product_sort = Product::where('status_product_id' ,2)->where('status_id' ,2)->get();
                }else if($select ==='stocking')
                {
                    $list_product_sort = Product::where('status2_product_id' ,1)->where('status_id' ,2)->get();
                }else if($select ==='out_stocking')
                {
                    $list_product_sort = Product::where('status2_product_id' ,2)->where('status_id' ,2)->get();
                }
            }
        }else if($request->input('status') == 'all' || $request->input('status') == '' )
        {
            if(!empty($request->input('value')))
            {
                $select = $request->input('value');
                if($select ==='new_product')
                {
                    $list_product_sort = Product::orderBy('id', 'DESC')->get();
                }else if($select ==='price_hight')
                {
                    $list_product_sort = Product::orderBy('price','DESC')->get();
                }else if($select ==='price_low')
                {
                    $list_product_sort = Product::orderBy('price')->get();
                }else if($select ==='hightlight')
                {
                    $list_product_sort = Product::where('status_product_id' ,1)->get();
                }else if($select ==='selling')
                {
                    $list_product_sort = Product::where('status_product_id' ,2)->get();
                }else if($select ==='stocking')
                {
                    $list_product_sort = Product::where('status2_product_id' ,1)->get();
                }else if($select ==='out_stocking')
                {
                    $list_product_sort = Product::where('status2_product_id' ,2)->get();
                }
            }
        }

            return \view('admin.product.sort' , \compact('list_product_sort'));
    }
    //
    public function edit($id)
    {
        $status_ware = Status2Product::all();
        $status_hight= StatusProduct::all();
        $categary = CategaryProduct::all();
        function data_tree($data , $parent_id = 0 , $level = 0){
            $result = array();
            foreach($data as $item){
               if($item->parent_id == $parent_id){
                   $item['level'] = $level;
                   $result[] = $item;
                   $child = data_tree($data , $item->id , $level +1);
                   $result = array_merge($result , $child );
               }
               unset($item);
            }
            return $result;
        }
        $result1 =  data_tree($categary  , 0);
        $status = status::all();
        $product_by_id = Product::find($id);
        $thumb_detail = Product::find($id)->detailImg;
        return \view('admin.product.edit' , \compact('status_ware' , 'status_hight' ,'categary' ,'result1','status' , 'product_by_id' ,'thumb_detail'));
    }
    public function delete_edit (Request  $request)
    {

            if(!empty($request->input('id')  &&  $request->input('id_pro')))
            {
                $id_pro = $request->input('id_pro');
                $thumb_detail = Product::find($id_pro)->detailImg;
                $id =$request->input('id');
                Detail_product_image::where('id' , $id)->delete();
            }

            return \view('admin.product.delete_ajax' , \compact('thumb_detail') );
    }
    public function update(Request $request , $id)
    {
        $item_product_id = Product::find($id);
        $request->validate([
            'name'=>'required:min:6',
                'price'=>'required',
                'code'=>'required',
                'extps'=>'required:6',
                'content'=>'required:6',
                'cat'=>'required',
                'status'=>'required',


        ],
        [
            'required'=>':attribute không được để trống',
            'min:6'=>':attribute phải dài hơn 6 khí tự'
        ],
        [
            'name'=>'Tên sản phẩm',
            'price'=>'Giá sản phẩm',
            'code'=>'Mã sản phẩm',
            'extps'=>'Mô tả',
            'content'=>'Nội dung',
            'cat'=>'Danh mục',
            'status'=>'Trạng thái',

        ]
    );
    if($request->hasFile('file')){
        $file = $request->file;
        // Lấy tên file
        $file->getClientOriginalName();
        // Lấy đuôi file
        $file->getClientOriginalExtension();
        // Lấy kích thước file
        $file->getSize();
    $path= $file->move('public/uploads',$file->getClientOriginalName());
        $thumbnail ="public/uploads/".$file->getClientOriginalName();

    }
    if(empty($thumbnail))
    {
        if(!empty($request->input('fea')))
        {
            $add= Product::where('id' , $id)->update([
                'product_title' => $request->input('name'),
                'product_thumb' => $item_product_id->product_thumb,
                'code' => $request->input('code'),
                'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'excerpts' => $request->input('extps'),
                'content' => $request->input('content'),
                'categary_id' => $request->input('cat'),
                'status_id' => $request->input('status'),
                'price'=>$request->input('price'),
                'price_new'=>$request->input('price_new'),
                'status_product_id' => $request->input('fea'),
                'status2_product_id' => $request->input('status_ware'),
                'quantity' => $request->input('quantity'),

            ]);
        }else if(!empty($request->input('fea1')))
        {
            $add= Product::where('id' , $id)->update([
                'product_title' => $request->input('name'),
                'product_thumb' => $item_product_id->product_thumb,
                'code' => $request->input('code'),
                'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'excerpts' => $request->input('extps'),
                'content' => $request->input('content'),
                'categary_id' => $request->input('cat'),
                'status_id' => $request->input('status'),
                'price'=>$request->input('price'),
                'price_new'=>$request->input('price_new'),
                'status_product_id' => $request->input('fea1'),
                'status2_product_id' => $request->input('status_ware'),
                'quantity' => $request->input('quantity'),

            ]);
        }else if(!empty($request->input('fea2')))
        {
            $add= Product::where('id' , $id)->update([
                'product_title' => $request->input('name'),
                'product_thumb' => $item_product_id->product_thumb,
                'code' => $request->input('code'),
                'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'excerpts' => $request->input('extps'),
                'content' => $request->input('content'),
                'categary_id' => $request->input('cat'),
                'status_id' => $request->input('status'),
                'price'=>$request->input('price'),
                'price_new'=>$request->input('price_new'),
                'status_product_id' => $request->input('fea2'),
                'status2_product_id' => $request->input('status_ware'),
                'quantity' => $request->input('quantity'),

            ]);
        }else if(empty($request->input('fae')) && empty($request->input('fae1')) && empty($request->input('fae2'))){
            $add= Product::where('id' , $id)->update([
                'product_title' => $request->input('name'),
                'product_thumb' => $item_product_id->product_thumb,
                'code' => $request->input('code'),
                'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'excerpts' => $request->input('extps'),
                'content' => $request->input('content'),
                'categary_id' => $request->input('cat'),
                'status_id' => $request->input('status'),
                'price'=>$request->input('price'),
                'price_new'=>$request->input('price_new'),
                'status_product_id' =>4,
                'status2_product_id' => $request->input('status_ware'),
                'quantity' => $request->input('quantity'),

            ]);
        }

    }else
    {
        if(!empty($request->input('fea')))
        {
            $add= Product::where('id' , $id)->update([
                'product_title' => $request->input('name'),
                'product_thumb' => $thumbnail,
                'code' => $request->input('code'),
                'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'excerpts' => $request->input('extps'),
                'content' => $request->input('content'),
                'categary_id' => $request->input('cat'),
                'status_id' => $request->input('status'),
                'price'=>$request->input('price'),
                'price_new'=>$request->input('price_new'),
                'status_product_id' => $request->input('fea'),
                'status2_product_id' => $request->input('status_ware'),
                'quantity' => $request->input('quantity'),

            ]);
        }else if(!empty($request->input('fea1')))
        {
            $add= Product::where('id' , $id)->update([
                'product_title' => $request->input('name'),
                'product_thumb' => $thumbnail,
                'code' => $request->input('code'),
                'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'excerpts' => $request->input('extps'),
                'content' => $request->input('content'),
                'categary_id' => $request->input('cat'),
                'status_id' => $request->input('status'),
                'price'=>$request->input('price'),
                'price_new'=>$request->input('price_new'),
                'status_product_id' => $request->input('fea1'),
                'status2_product_id' => $request->input('status_ware'),
                'quantity' => $request->input('quantity'),

            ]);
        }else if(!empty($request->input('fea2')))
        {
            $add= Product::where('id' , $id)->update([
                'product_title' => $request->input('name'),
                'product_thumb' => $thumbnail,
                'code' => $request->input('code'),
                'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'excerpts' => $request->input('extps'),
                'content' => $request->input('content'),
                'categary_id' => $request->input('cat'),
                'status_id' => $request->input('status'),
                'price'=>$request->input('price'),
                'price_new'=>$request->input('price_new'),
                'status_product_id' => $request->input('fea2'),
                'status2_product_id' => $request->input('status_ware'),
                'quantity' => $request->input('quantity'),

            ]);
        }else if(empty($request->input('fae')) && empty($request->input('fae1')) && empty($request->input('fae2'))){
            $add= Product::where('id' , $id)->update([
                'product_title' => $request->input('name'),
                'product_thumb' =>$thumbnail,
                'code' => $request->input('code'),
                'slug'=> empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'excerpts' => $request->input('extps'),
                'content' => $request->input('content'),
                'categary_id' => $request->input('cat'),
                'status_id' => $request->input('status'),
                'price'=>$request->input('price'),
                'price_new'=>$request->input('price_new'),
                'status_product_id' =>4,
                'status2_product_id' => $request->input('status_ware'),
                'quantity' => $request->input('quantity'),

            ]);
        }
    }
    if($request->hasFile('images')){
        $img = $request->file('images');
        foreach($img as $file){
             // Lấy tên file
        $file->getClientOriginalName();
        // Lấy đuôi file
        $file->getClientOriginalExtension();
        // Lấy kích thước file
        $file->getSize();
        $path= $file->move('public/uploads',$file->getClientOriginalName());
        $thumbnail_detail ="public/uploads/".$file->getClientOriginalName();
        Detail_product_image::create([
                'img_detail'=>$thumbnail_detail,
                'product_id'=>$id,
            ]);
        }
    }
    return \redirect('admin/product/list')->with('status' , 'Bạn đã cập nhật sản phẩm thành công');
    }
    public function delete($id)
    {
        if(!empty($id))
        {
            Product::where('id' , $id)->delete();
            return \redirect('admin/product/list')->with('status' ,'Bạn đã sản phẩm thành công');
        }
    }

     //  End admin

    //  Client

    public function list_pro(Request $request)
    {
        if(!empty($request->input('status')))
        {
           $status = $request->input('status');
           if($status == 'hight')
           {
            $list_product = Product::orderBy('price_new')->where('status_id' ,1)->paginate(12);
            $list_product->appends(['status' => $status]);
           }else if($status == 'low')
           {
            $list_product = Product::orderBy('price_new' ,'DESC')->where('status_id' ,1)->paginate(12);
            $list_product->appends(['status' => $status]);
           }else if($status =='light')
           {
            $list_product = Product::where([
                'status_id'=>1,
                'status_product_id'=>2,
                ])->paginate(12);
            $list_product->appends(['status' => $status]);
           }
        }else
        {
            $list_product = Product::where('status_id' ,1)->paginate(12);
        }
        $categary_pro = CategaryProduct::where('status_id',1)->get();
        $lighthight_pro = Product::where([
            'status_id'=>1,
            'status_product_id'=>1
             ])->paginate(8);

        return \view('client.product.list' , \compact('categary_pro' ,'lighthight_pro' ,'list_product'));
    }
    public function ajax_sort(Request $request)
    {
        if(!empty($request->input('price_filter') && !empty($request->input('brand_filter'))))
        {
            $r_price = $request->input('price_filter');
            $brand_filter = $request->input('brand_filter');
            if($r_price == '< 20000')
            {
               $ajax_sort = Product::where([
                   ['status_id',1],
                   ['price_new' ,'<' , 20000],
                   ['categary_id' , $brand_filter],
               ])->paginate(12);
            }else if($r_price == '20000-50000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[20000,50000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $brand_filter],
                        ])->paginate(12);

            }else if($r_price == '50000-100000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[50000,100000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $brand_filter],
                        ])->paginate(12);

            }else if($r_price == '100000-200000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[100000,200000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $brand_filter],
                        ])->paginate(12);

            } else if($r_price == '>200000')
            {
                $ajax_sort = Product::where([
                    ['status_id',1],
                    ['price_new' ,'>' , 200000],
                    ['categary_id' , $brand_filter],
                ])->paginate(12);
            }
        }else if(!empty($request->input('price_filter')))
            {
           $r_price = $request->input('price_filter');
           if($r_price == '< 20000')
           {
              $ajax_sort = Product::where([
                  ['status_id',1],
                  ['price_new' ,'<' , 20000],
              ])->paginate(12);
           }else if($r_price == '20000-50000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[20000,50000])->where('status_id' ,1)->paginate(12);

            }else if($r_price == '50000-100000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[50000,100000])->where('status_id' ,1)->paginate(12);

            }else if($r_price == '100000-200000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[100000,200000])->where('status_id' ,1)->paginate(12);

            }
            else if($r_price == '>200000')
            {
                $ajax_sort = Product::where([
                    ['status_id',1],
                    ['price_new' ,'>' , 200000],
                ])->paginate(12);
            }
        }else if(!empty($request->input('brand_filter')))
        {
            $brand_filter = $request->input('brand_filter');
            if($brand_filter == $brand_filter)
            {
                $ajax_sort = Product::where([
                    ['status_id' ,1],
                    ['categary_id' , $brand_filter]
                ])->paginate(12);
            }
        }

        return \view('client.product.ajax_full' , \compact('ajax_sort'));
    }
    public function fetch_data(Request $request)
    {
        if(!empty($request->input('price_filter') && !empty($request->input('brand_filter'))))
        {
            $r_price = $request->input('price_filter');
            $brand_filter = $request->input('brand_filter');
            if($r_price == '< 20000')
            {
               $ajax_sort = Product::where([
                   ['status_id',1],
                   ['price_new' ,'<' , 20000],
                   ['categary_id' , $brand_filter],
               ])->paginate(12);
            }else if($r_price == '20000-50000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[20000,50000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $brand_filter],
                        ])->paginate(12);

            }else if($r_price == '50000-100000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[50000,100000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $brand_filter],
                        ])->paginate(12);

            }else if($r_price == '100000-200000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[100000,200000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $brand_filter],
                        ])->paginate(12);

            } else if($r_price == '>200000')
            {
                $ajax_sort = Product::where([
                    ['status_id',1],
                    ['price_new' ,'>' , 200000],
                    ['categary_id' , $brand_filter],
                ])->paginate(12);
            }
        }else if(!empty($request->input('price_filter')))
            {
           $r_price = $request->input('price_filter');
           if($r_price == '< 20000')
           {
              $ajax_sort = Product::where([
                  ['status_id',1],
                  ['price_new' ,'<' , 20000],
              ])->paginate(12);
           }else if($r_price == '20000-50000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[20000,50000])->where('status_id' ,1)->paginate(12);

            }else if($r_price == '50000-100000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[50000,100000])->where('status_id' ,1)->paginate(12);

            }else if($r_price == '100000-200000')
            {
                    $ajax_sort = Product::whereBetween('price_new' ,[100000,200000])->where('status_id' ,1)->paginate(12);

            }
            else if($r_price == '>200000')
            {
                $ajax_sort = Product::where([
                    ['status_id',1],
                    ['price_new' ,'>' , 200000],
                ])->paginate(12);
            }
        }else if(!empty($request->input('brand_filter')))
        {
            $brand_filter = $request->input('brand_filter');
            if($brand_filter == $brand_filter)
            {
                $ajax_sort = Product::where([
                    ['status_id' ,1],
                    ['categary_id' , $brand_filter]
                ])->paginate(12);
            }
        }

        return \view('client.product.ajax_full' , \compact('ajax_sort'));
    }
    public function list_pro_child(Request $request, $slug_parent , $slug_child)
    {
        if(!empty($request->input('status')))
        {
            $categary_chil = CategaryProduct::where('slug' ,$slug_child)->first();
            $id = $categary_chil->id;
            $status = $request->input('status');
            if($status == 'hight')
           {
            $list_pro_child = Product::orderBy('price_new')->where([
                ['status_id' ,1],
                ['categary_id' ,$id],
            ])->paginate(12);
            $list_pro_child->appends(['status' => $status]);
           }else if($status == 'low')
           {
            $list_pro_child = Product::orderBy('price_new' , 'DESC')->where([
                ['status_id' ,1],
                ['categary_id' ,$id],
            ])->paginate(12);
            $list_pro_child->appends(['status' => $status]);
           }else if($status =='light')
           {
            $list_pro_child = Product::where([
                ['status_id' ,1],
                ['categary_id' ,$id],
                ['status_product_id',2],
            ])->paginate(12);
            $list_pro_child->appends(['status' => $status]);
           }

        }else
        {
            $categary_chil = CategaryProduct::where('slug' ,$slug_child)->first();
            $id = $categary_chil->id;
            $list_pro_child = Product::where([
                ['status_id' ,1],
                ['categary_id' ,$id],
            ])->paginate(12);
        }
        $categary_pro = CategaryProduct::where('status_id',1)->get();
        $lighthight_pro = Product::where([
            'status_id'=>1,
            'status_product_id'=>1
             ])->paginate(8);
        return \view('client.product.list_child', \compact('categary_pro' , 'lighthight_pro' , 'list_pro_child' ,'id' ,'categary_chil'));
    }
    public function filter_child(Request $request)
    {
        $id = $request->input('id');
        $categary_chil = CategaryProduct::where('id' ,$id)->first();
       if(!empty($request->input('price_filter')))
       {
            $r_filter = $request->input('price_filter');
            if($r_filter == '< 20000')
            {
                $product_ajax = Product::where([
                    ['status_id',1],
                    ['price_new' ,'<' , 20000],
                    ['categary_id' , $id],
                ])->paginate(12);
            }else if($r_filter == '20000-50000')
            {
                    $product_ajax = Product::whereBetween('price_new' ,[20000,50000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $id],
                        ])->paginate(12);

            }else if($r_filter == '50000-100000')
            {
                    $product_ajax = Product::whereBetween('price_new' ,[50000,100000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $id],
                        ])->paginate(12);

            }else if($r_filter == '100000-200000')
            {
                    $product_ajax = Product::whereBetween('price_new' ,[100000,200000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $id],
                        ])->paginate(12);

            } else if($r_filter == '>200000')
            {
                $product_ajax = Product::where([
                    ['status_id',1],
                    ['price_new' ,'>' , 200000],
                    ['categary_id' , $id],
                ])->paginate(12);
            }
       }
       return \view('client.product.ajax_no' , \compact('product_ajax' ,'categary_chil' , 'id'));
    }
    public function fetch_data1(Request $request)
    {
        $id = $request->input('id');
        $categary_chil = CategaryProduct::where('id' ,$id)->first();
       if(!empty($request->input('price_filter')))
       {
            $r_filter = $request->input('price_filter');
            if($r_filter == '< 20000')
            {
                $product_ajax = Product::where([
                    ['status_id',1],
                    ['price_new' ,'<' , 20000],
                    ['categary_id' , $id],
                ])->paginate(12);
            }else if($r_filter == '20000-50000')
            {
                    $product_ajax = Product::whereBetween('price_new' ,[20000,50000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $id],
                        ])->paginate(12);

            }else if($r_filter == '50000-100000')
            {
                    $product_ajax = Product::whereBetween('price_new' ,[50000,100000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $id],
                        ])->paginate(12);

            }else if($r_filter == '100000-200000')
            {
                    $product_ajax = Product::whereBetween('price_new' ,[100000,200000])->where([
                        ['status_id' ,1],
                        ['categary_id' , $id],
                        ])->paginate(12);

            } else if($r_filter == '>200000')
            {
                $product_ajax = Product::where([
                    ['status_id',1],
                    ['price_new' ,'>' , 200000],
                    ['categary_id' , $id],
                ])->paginate(12);
            }
       }
       return \view('client.product.ajax_no' , \compact('product_ajax' ,'categary_chil' , 'id'));
    }

    public function detail_product($slug_parent , $slug)
    {
        $categary_pro = CategaryProduct::where('status_id',1)->get();
        $lighthight_pro = Product::where([
            'status_id'=>1,
            'status_product_id'=>1
             ])->paginate(8);
          $product_by_id = Product::where('slug' ,$slug)->first();
          $id = $product_by_id->id;
          $detail_img = Product::find($id)->detailImg;
          $status = Product::find($id)->status2_product;
          $id_cate = CategaryProduct::where('slug' , $slug_parent)->first();
            $id_categary = $id_cate->id;
          $product_related = Product::where([
                ['status_id' ,1],
                ['categary_id' ,$id_categary],
          ])->paginate(4);
        return \view('client.product.detail_pro' , \compact('categary_pro' , 'lighthight_pro' , 'product_by_id','detail_img' ,'status' , 'slug' , 'product_related'));
    }
}
