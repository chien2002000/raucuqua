<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\status;
use App\CategaryPost;
use App\Post;
use App\Product;
use App\CategaryProduct;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware(function($request , $next){
            session(['Model_active' =>'posts']);
           return $next($request);
        });
    }
    public function categary(Request $request)
    {
        $categary = CategaryPost::all();
        $status = status::all();
        // List dùng chung
        //  List
            if(!empty($request->input('status')))
            {
                $status_url = $request->input('status');
                if($status_url == 'all')
                {
                $categary = CategaryPost::all();
                }
            }else
            {
                $categary = CategaryPost::all();
            }
            #List dùng chung
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
            $count_all = CategaryPost::all()->count();
            $count = [$count_all];
        return \view('admin.post.categary' , \compact('status'  , 'count' ,'result1'));
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
            CategaryPost::create([
                'name'=>$request->input('name'),
                'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'status_id'=>$request->input('status'),
                'parent_id'=>0,
                'user_id'=>Auth::user()->id,
            ]);
        }else{
            CategaryPost::create([
                'name'=>$request->input('name'),
                'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'status_id'=>$request->input('status'),
                'parent_id'=>$request->input('categary'),
                'user_id'=>Auth::user()->id,
            ]);
        }
        return \redirect('admin/post/cat/list')->with('status' , 'Bạn đã thêm danh mục thành công');
    }
    public function cat_edit($id)
    {
        $categary = CategaryPost::all();
            $cat_post = CategaryPost::find($id);
            $status = status::all();
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
            return \view('admin.post.edit_cat' , \compact('cat_post' , 'status' , 'result1'));
    }
    public function update_cat(Request $request , $id)
    {
        $cat_post = CategaryPost::find($id);
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
        if($cat_post->parent_id == 0)
        {
            CategaryPost::where('id' , $id)->update([
                'name'=>$request->input('name'),
                'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'parent_id'=>0,
                'status_id'=>$request->input('status'),
            ]);
         }else
         {
            CategaryPost::where('id' , $id)->update([
                'name'=>$request->input('name'),
                'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'parent_id'=>$request->input('categary'),
                'status_id'=>$request->input('status'),
            ]);
         }
        return \redirect('admin/post/cat/list')->with('status' , 'Bạn đã cập nhật danh mục thành công');
    }

    public function delete_cat($id)
    {
        CategaryPost::where('id' , $id)->delete();
        return \redirect('admin/post/cat/list')->with('status' , 'Bạn đã xoá danh mục  thành công');
    }
    public function add()
    {
        $categary = CategaryPost::all();
        $status = status::all();
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
            return \view('admin.post.add' , \compact('status' ,'result1'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'cat'=>'required',
            'extep' =>'required',
            'content' =>'required',
            'status' =>'required',
            'file' =>'required',
        ],
        [
            'required' => ':attribute không được để trống',
        ],
        [
            'name' =>'Tiêu đề',
            'cat' =>'Danh mục',
            'extep' =>'Mô tả ngắn',
            'content' =>'Nội dung',
            'status' =>'Trạng thái',
            'file' =>'Hình ảnh',
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
    Post::create([
        'post_title' => $request->input('name'),
        'categary_id' =>$request->input('cat'),
        'thumbnail'=>$thumbnail,
        'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
        'content' =>$request->input('content'),
        'excerpts'=>$request->input('extep'),
        'user_id'=>Auth::id(),
        'status_id'=>$request->input('status'),
        'hightlight'=>$request->input('fea3'),
    ]);
    return \redirect('admin/post/list')->with('status' ,'Bạn đã thêm bài viết mới thành công');
    }
    public function list(Request $request)
    {
        if(!empty($request->input('status')))
        {
            $status = $request->input('status');
            if($status == 'all')
            $list_check=[0=>'Công khai',1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
            {
                $list_post = Post::paginate(10);
                $list_post->appends(['status' => $status]);
            }
            if($status == 'active')
            {
                $list_post = Post::where('status_id' , 1)->paginate(10);
                $list_post->appends(['status' => $status]);
                $list_check=[1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
            }
            if($status == 'queue')
            {
                $list_post = Post::where('status_id' , 2)->paginate(10);
                $list_post->appends(['status' => $status]);
                $list_check=[0=>'Công Khai' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
            }
            if($status == 'trash')
            {
                $list_post = Post::onlyTrashed()->paginate(10);
                $list_post->appends(['status' => $status]);
                $list_check=[5=>'Khôi phục' ,3=>'Xoá vĩnh viễn'];
            }
        }else
        {
                $keywork ='';
                if(!empty($request->input('keywork')))
                {
                    $keywork = $request->input('keywork');
                }
             $list_post = Post::where('post_title' , 'LIKE' ,"%{$keywork}%")->paginate(10);
             $list_post->appends(['keywork' => $keywork]);
             $list_check=[0=>'Công khai',1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
        }
        $count_active = Post::where('status_id' , 1)->count();
        $count_queue = Post::where('status_id' , 2)->count();
        $count_trash =Post::onlyTrashed()->count();
        $count_all = Post::all()->count();
        $count = [$count_active , $count_queue ,$count_trash , $count_all];
        return \view('admin.post.list' , \compact('list_post' , 'count' , 'list_check'));
    }

    public function detail_ajax(Request $request)
    {
            $id = $request->input('id');
            if(!empty($request->input('id')))
            {
                $id = $request->input('id');
                $post_detail_by_id = Post::find($id);
                $post_by_id = array(
                    'fullName' =>$post_detail_by_id->user->name,
                    'id'=>$post_detail_by_id->id,
                    'categary'=>$post_detail_by_id->categary->name,
                    'title'=>$post_detail_by_id->post_title,
                    'hightlight'=>$post_detail_by_id->hightlight==1?'Nổi bật':'Không nổi bật',
                    'status'=>$post_detail_by_id->status->name,
                    'time'=>$post_detail_by_id->created_at,
                    'img'=>url($post_detail_by_id->thumbnail),
                );
            }

            echo \json_encode($post_by_id);
    }
    //
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
                    Post::whereIn('id', $list_check)->update([
                       'status_id' => 1
                   ]);
                    return \redirect('admin/post/list')->with('status' , 'Bạn đã thay đổi trạng thái công khai thành công');
                }
                if($select == 1)
                {
                    Post::whereIn('id', $list_check)->update([
                       'status_id' => 2
                   ]);
                    return \redirect('admin/post/list')->with('status' , 'Bạn đã thay đổi trạng thái chờ duyệt thành công');
                }
                if($select == 2)
                {
                    Post::whereIn('id', $list_check)->delete();
                    return \redirect('admin/post/list')->with('status' , 'Bạn đã xoá tạm thời thành công');
                }
                if($select == 5)
                {
                    Post::whereIn('id', $list_check)->onlyTrashed()->restore();
                    return \redirect('admin/post/list')->with('status' , 'Bạn đã khôi phục thành công');
                }
                if($select == 3)
                {
                    Post::withTrashed()->whereIn('id' , $list_check)->forceDelete();
                    return \redirect('admin/post/list')->with('status' , 'Bạn đã xoá vĩnh viễn thành công');
                }
            }
    }
    public function sort(Request  $request)
    {
        if(!empty($request->input('value')))
        {
            $value= $request->input('value');
            if($value == 'new_post')
            {
                $list_post = Post::orderBy('id', 'DESC')->get();
            }
            if($value =='hightlight')
            {
                $list_post = Post::where('hightlight', 1)->get();
            }
        }

        return \view('admin.post.sort' , \compact('list_post'));
    }
    public function edit($id)
    {
        $categary = CategaryPost::all();
        $status = status::all();
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
        $item_post_id = Post::find($id);
        return \view('admin.post.edit' ,compact('result1', 'status') , \compact('item_post_id'));
    }
    public function update(Request $request ,$id)
    {
        $item_post_id = Post::find($id);
        $request->validate([
            'name'=>'required',
            'cat'=>'required',
            'extep' =>'required',
            'content' =>'required',
        ],
        [
            'required' => ':attribute không được để trống',
        ],
        [
            'name' =>'Tiêu đề',
            'cat' =>'Danh mục',
            'extep' =>'Mô tả ngắn',
            'content' =>'Nội dung',
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
    if(!empty($thumbnail)){
        Post::where('id' , $id)->update([
            'post_title' => $request->input('name'),
            'categary_id' =>$request->input('cat'),
            'thumbnail'=>$thumbnail,
            'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
            'content' =>$request->input('content'),
            'excerpts'=>$request->input('extep'),
            'status_id'=>$request->input('status'),
            'hightlight'=>$request->input('fea3'),
        ]);
    }else{
        Post::where('id' , $id)->update([
            'post_title' => $request->input('name'),
            'categary_id' =>$request->input('cat'),
            'thumbnail'=>$item_post_id->thumbnail,
            'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
            'content' =>$request->input('content'),
            'excerpts'=>$request->input('extep'),
            'status_id'=>$request->input('status'),
            'hightlight'=>$request->input('fea3'),
        ]);
    }
    return \redirect('admin/post/list')->with('status' , 'Bạn cập nhật bài viết thành công');
    }
    public function delete($id)
    {
        if(!empty($id))
        {
            Post::where('id' , $id)->delete();
        }
        return \redirect('admin/post/list')->with('status' , 'Bạn xoá bài viết thành công');
    }

    // END ADMIN
// Client
    public function listPost ()
    {
        $list_post_client = Post::where('status_id' ,1)->paginate(10);
        $lighthight_pro = Product::where([
            'status_id'=>1,
            'status_product_id'=>1
        ])->get();
        $categary_pro = CategaryProduct::where([
            'status_id'=>1,
        ])->paginate(8);
        return \view('client.post.list' , \compact('list_post_client' ,'lighthight_pro' ,'categary_pro'));
    }

    public function detailPost($slug , $id)
    {
        if(!empty($slug))
        {
           $post_detail = Post::where('slug' ,$slug)->first();
           $lighthight_pro = Product::where([
            'status_id'=>1,
            'status_product_id'=>1
             ])->paginate(8);
            $categary_pro = CategaryProduct::where([
                'status_id'=>1,
            ])->get();
            $list_a = CategaryPost::find($id)->post;
        }
        return \view('client.post.detail_post' , \compact('post_detail' , 'lighthight_pro' ,'categary_pro' ,'list_a'));
    }

}




