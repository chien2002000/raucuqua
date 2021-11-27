<?php

namespace App\Http\Controllers;
use App\status;
use App\Page;
use App\CategaryProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct(){
        $this->middleware(function($request , $next){
            session(['Model_active' =>'pages']);
           return $next($request);
        });
    }
    public function list(Request $request)
    {

            if(!empty($request->input('status')))
            {
                $status =$request->input('status');
                if($status == 'all')
                {
                    $list_page = Page::paginate(10);
                    $list_page->appends(['status' => $status]);
                    $list_check=[0=>'Công khai',1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
                }
                if($status == 'active')
                {
                    $list_page = Page::where('status_id' , 1)->paginate(10);
                    $list_page->appends(['status' => $status]);
                    $list_check=[1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
                }
                if($status == 'queue')
                {
                    $list_page = Page::where('status_id' , 2)->paginate(10);
                    $list_page->appends(['status' => $status]);
                    $list_check=[0=>'Công Khai' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
                }
                if($status == 'trash')
                {
                    $list_page = Page::onlyTrashed()->paginate(10);
                    $list_page->appends(['status' => $status]);
                    $list_check=[5=>'Khôi phục' ,3=>'Xoá vĩnh viễn'];
                }
            }else
            {
                    $key_word = '';
                  if(!empty($request->input('keyword')))
                  {
                       $key_word =$request->input('keyword');
                  }
                  $list_page = Page::where('page_title' , 'LIKE' ,"%{$key_word}%")->paginate(10);
                  $list_page->appends(['keyword' => $key_word]);
                  $list_check=[0=>'Công khai',1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
            }
            $count_active = Page::where('status_id' , 1)->count();
            $count_queue = Page::where('status_id' , 2)->count();
            $count_trash =Page::onlyTrashed()->count();
            $count_all = Page::all()->count();
            $count = [$count_active , $count_queue ,$count_trash , $count_all];
            return \view('admin.page.list' , \compact('list_page' , 'list_check' , 'count'));
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
                       Page::whereIn('id', $list_check)->update([
                           'status_id' => 1
                       ]);
                        return \redirect('admin/page/list')->with('status' , 'Bạn đã thay đổi trạng thái công khai thành công');
                    }
                    if($select == 1)
                    {
                       Page::whereIn('id', $list_check)->update([
                           'status_id' => 2
                       ]);
                        return \redirect('admin/page/list')->with('status' , 'Bạn đã thay đổi trạng thái chờ duyệt thành công');
                    }
                    if($select == 2)
                    {
                       Page::whereIn('id', $list_check)->delete();
                        return \redirect('admin/page/list')->with('status' , 'Bạn đã xoá tạm thời thành công');
                    }
                    if($select == 5)
                    {
                       Page::whereIn('id', $list_check)->onlyTrashed()->restore();
                        return \redirect('admin/page/list')->with('status' , 'Bạn đã khôi phục thành công');
                    }
                    if($select == 3)
                    {
                        Page::withTrashed()->whereIn('id' , $list_check)->forceDelete();
                        return \redirect('admin/page/list')->with('status' , 'Bạn đã xoá vĩnh viễn thành công');
                    }
                }

        }
        public function detail_ajax(Request $request)
        {
            if(!empty($request->input('id'))){
                $id =$request->input('id');
            }
                $page_by_id = Page::where('id', $id)->first();
                $array_page_id = [
                    'fullName' =>$page_by_id->user->name,
                    'id' => $page_by_id->id,
                    'title'=>$page_by_id->page_title,
                    'status'=>$page_by_id->status->name,
                    'time'=>$page_by_id->created_at,
                ];
             echo \json_encode($array_page_id);
        }

        public function add()
        {
            $status = status::all();
            return \view('admin.page.add' , \compact('status'));
        }

        public function store(Request $request)
        {
            $request->validate([

                'name' =>'required',
                'content' =>'required',
                'status' =>'required',
            ],
            [
                'required' =>':Attribute không được để trống',
            ],
            [
                'name' =>'Tiêu đề',
                'content' =>'Nội dung',
                'status' =>'Trạng thái',
            ]
        );
            Page::create([
                'page_title'=>$request->input('name'),
                'slug'=>empty($request->input('slug'))?Str::slug($request->input('name')):$request->input('slug'),
                'content'=>$request->input('content'),
                'status_id'=>$request->input('status'),
                'user_id'=>Auth::user()->id,
            ]);

            return \redirect('admin/page/list')->with('status','Bạn đã thêm trang thành công');
        }
        public function edit($id)
        {
            $status = status::all();
            $page_by_id = Page::find($id);
            return \view('admin.page.edit' , \compact('status' , 'id' , 'page_by_id'));
        }
        public function update(Request $request , $id)
        {
            $request->validate([

                'name' =>'required',
                'slug' =>'required',
                'content' =>'required',
                'status' =>'required',
            ],
            [
                'required' =>':Attribute không được để trống',
            ],
            [
                'name' =>'Tiêu đề',
                'content' =>'Nội dung',
                'status' =>'Trạng thái',
            ]
        );
        Page::where('id' , $id)->update([
            'page_title'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'content'=>$request->input('content'),
            'status_id'=>$request->input('status'),
            'user_id'=>Auth::user()->id,
        ]);
        return \redirect('admin/page/list')->with('status','Bạn đã cập nhật trang thành công');
        }
        public function delete($id)
        {
            Page::where('id' , $id)->delete();
            return \redirect('admin/page/list')->with('status','Bạn đã xoá tạm thời thành công');
        }
    //

    #Client
    public function introduce( $slug)
    {
            if(!empty($slug))
            {
                $page_id = Page::where([
                    'status_id' =>1,
                    'slug'=>$slug,
                ])->first();
            }
            $categary_pro = CategaryProduct::where('status_id',1)->get();
            return \view('client.page.page' , \compact('page_id' ,'categary_pro'));
    }
}

//

