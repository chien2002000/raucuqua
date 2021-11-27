<?php

namespace App\Http\Controllers;
use App\status;
use App\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct(){
        $this->middleware(function($request , $next){
            session(['Model_active' =>'sliders']);
           return $next($request);
        });
    }
    public function add()
    {
        $status = status::all();
        return \view('admin.slider.add' , \compact('status'));
    }
    public function store(Request $request)
    {
        $request->validate([

            'name' =>'required',
            'file' =>'required',
            'status' =>'required',
        ],
        [
            'required' =>':Attribute không được để trống',
        ],
        [
            'name' =>'Tiêu đề',
            'file' =>'Ảnh',
            'status' =>'Trạng thái',
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
        Slider::create([
            'slider_title'=>$request->input('name'),
            'img_slider'=>$thumbnail,
            'user_id' =>Auth::user()->id,
            'status_id'=>$request->input('status'),
        ]);
        return \redirect('admin/slider/list')->with('status' , 'Bạn thêm slider thành công');
    }
    public function list(Request $request)
    {
        if(!empty($request->input('status')))
        {
            $status = $request->input('status');
            if($status == 'all')
            {
                $list_slider = Slider::paginate(10);
                $list_check=[0=>'Công khai',1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
            }else if($status =='active')
            {
                $list_slider = Slider::where('status_id' ,1)->paginate(10);
                $list_check=[1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
            }else if($status =='queue')
            {
                $list_slider = Slider::where('status_id' ,2)->paginate(10);
                $list_check=[0=>'Công Khai' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];
            }else if($status =='trash')
            {
                $list_slider = Slider::onlyTrashed()->paginate(10);
                $list_check=[5=>'Khôi phục' ,3=>'Xoá vĩnh viễn'];
            }
        }
        else
        {

            $keywork ='';
            if(!empty($request->input('search'))){
                $keywork =$request->input('search');
            }
          $list_slider=  Slider::where('slider_title' ,'LIKE' , "%{$keywork}%")
        ->paginate();
        $list_check=[0=>'Công khai',1=>'Chờ Duyệt' ,2=>'Xoá Tạm Thời' ,3=>'Xoá Vĩnh Viễn'];

        }
        $count_active = Slider::where('status_id' , 1)->count();
        $count_queue = Slider::where('status_id' , 2)->count();
        $count_trash =Slider::onlyTrashed()->count();
        $count_all = Slider::all()->count();
        $count = [$count_active , $count_queue ,$count_trash , $count_all];
        return \view('admin.slider.list' ,\compact('list_slider' , 'list_check' ,'count'));
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
                    Slider::whereIn('id', $list_check)->update([
                       'status_id' => 1
                   ]);
                    return \redirect('admin/slider/list')->with('status' , 'Bạn đã thay đổi trạng thái công khai thành công');
                }
                if($select == 1)
                {
                    Slider::whereIn('id', $list_check)->update([
                       'status_id' => 2
                   ]);
                    return \redirect('admin/slider/list')->with('status' , 'Bạn đã thay đổi trạng thái chờ duyệt thành công');
                }
                if($select == 2)
                {
                    Slider::whereIn('id', $list_check)->delete();
                    return \redirect('admin/slider/list')->with('status' , 'Bạn đã xoá tạm thời thành công');
                }
                if($select == 5)
                {
                    Slider::whereIn('id', $list_check)->onlyTrashed()->restore();
                    return \redirect('admin/slider/list')->with('status' , 'Bạn đã khôi phục thành công');
                }
                if($select == 3)
                {
                    Slider::withTrashed()->whereIn('id' , $list_check)->forceDelete();
                    return \redirect('admin/slider/list')->with('status' , 'Bạn đã xoá vĩnh viễn thành công');
                }
            }
    }
    public function edit($id)
    {
        $status = status::all();
        $slider_by_id = Slider::find($id);
        return \view('admin.slider.edit',\compact('status' ,'slider_by_id'));
    }
    public function update(Request $request , $id)
    {
        $slider_by_id = Slider::find($id);
        $request->validate([

                'name' =>'required',

            ],
            [
                'required' =>':Attribute không được để trống',
            ],
            [
                'name' =>'Tiêu đề',

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
            Slider::where('id',$id)->update([
                'slider_title'=>$request->input('name'),
                'img_slider'=>$slider_by_id->img_slider,
                'status_id'=>$request->input('status'),
            ]);
        }else
        {
            Slider::where('id',$id)->update([
                'slider_title'=>$request->input('name'),
                'img_slider'=>$thumbnail,
                'status_id'=>$request->input('status'),
            ]);
        }
        return \redirect('admin/slider/list')->with('status' , 'Bạn cập nhật slider thành công');
    }
    public function delete($id)
    {
        if(!empty($id))
        {
            Slider::find($id)->delete();
        }
        return \redirect('admin/slider/list')->with('status' , 'Bạn xoá slider thành công');
    }
    //
}
