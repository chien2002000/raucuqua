<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
        public function list(Request $request)
        {
            $status =$request->input('status');
            if($status == 'trash')
            {
                $list_user =User::onlyTrashed()->paginate(10);
                $status = [0 => 'Xoá vĩnh viễn' , 1=> 'Khôi phục'];
            }else
            {
                $key_word = '';
                if($request->input('key_word'))
                {
                    $key_word =$request->input('key_word');
                }
                    $list_user = User::where([
                    ['name' , 'LIKE' , "%{$key_word}%"],
                    ])->orWhere('email' , 'LIKE' , "%{$key_word}%")->paginate(10);
                $status = [2 => 'Xoá tạm thời'];
            }
            $count_active =   User::paginate(10)->count();
            $count_trashed = User::onlyTrashed()->paginate(10)->count();
            $count=[$count_active , $count_trashed];
            return \view('admin.user.list', \compact('list_user' , 'count' , 'status'));
        }

        public function action(Request  $request){
                $request->validate([
                    'action' => 'required',
                    'list_check'=>'required',
                ]);
            $list_check = $request->input('list_check');
            if(!empty($list_check))
            {
                foreach($list_check as $k=>$v);
                if(Auth::id() == $v)
                {
                   unset($list_check[$k]);
                }
                $action = $request->input('action');
                if($action == 2)
                {
                    User::destroy($list_check);
                    return \redirect('admin/user/list')->with('status' , 'Bạn đã xoá tạm thời');
                }
                if($action == 1)
                {
                    User::withTrashed()->whereIn('id',$list_check)->restore();
                    return \redirect('admin/user/list')->with('status' , 'Bạn đã khôi phục dữ liệu thành công');
                }
                if($action == 0)
                {
                    User::withTrashed()->whereIn('id',$list_check)->forceDelete();
                    return \redirect('admin/user/list')->with('status' , 'Bạn đã xoá vĩnh viễn');
                }
                }
            }

            public function edit($id)
            {
                 $list_role = Role::all();
                 $user_by_id = User::find($id);
                 return view('admin.user.update' , \compact('list_role' ,'user_by_id'));
            }
            public function update(Request $request , $id)
            {
                    $request->validate([
                        'name'=>'required',
                        'email'=>'required',
                        'phone'=>'required',
                        'role_list'=>'required',
                    ],
                    [
                        'required'=>':Attribute không được để trống',
                        'min' =>':attribute yêu cầu 8 chữ số trở lên'
                    ],
                    [
                        'name' => 'Họ và tên',
                        'role_list'=>'Nhóm quyền',
                        'phone'=>'Điện thoại'
                    ]
                );
                User::where('id' , $id)->update([
                    'name' => $request->input('name'),
                    'email'=>$request->input('email'),
                    'phone'=> $request->input('phone'),
                    'role_id' => $request->input('role_list'),
                ]);
                return \redirect('admin/user/list')->with('status' , 'Bạn đã sửa người dùng thành công');
            }
            public function delete($id)
            {
                if(Auth::id() != $id){
                    User::where('id',$id)->delete();
                    return \redirect('admin/user/list')->with('status' , 'Bạn đã xoá người dùng thành công');
                }else{
                    return \redirect('admin/user/list')->with('status' , 'Bạn không thể xoá chính mình');
                }
            }
            public function add()
            {
                $list_role = Role::all();
                return \view('admin.user.add' ,\compact('list_role'));
            }
            public function store(Request $request)
            {
                $request->validate([
                    'name' =>'required',
                    'email' =>'required|email|regex:/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/',
                    'password' =>'required|regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/|confirmed',
                    'role_list' =>'required',
                    'phone' =>'required',
                ],
                [
                    'required'=>'Trường :attribute không được để trống',
                ],
                [
                    'name'=> 'Họ và tên',
                    'password'=>'Mật khẩu ',
                    'role_list'=> 'Nhóm quyền',
                    'phone' =>'Số điện'
                ]
            );
                User::create([
                    'name' => $request->input('name'),
                    'email'=>$request->input('email'),
                    'role_id' => $request->input('role_list'),
                    'password' => Hash::make($request->input('pass')),
                    'phone' => $request->input('phone'),
                ]);

            return \redirect('admin/user/list')->with('status' , 'Bạn đã thêm tài khoản thành công');
            }

            public function change()
            {
                return \view('admin.user.change_pass');
            }
            public function changePass(Request  $request)
            {
                $request->validate([
                    'password_old' =>'required',
                    'password' =>'required|regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/|confirmed',
                ],
                [
                    'required'=>'Trường :attribute không được để trống',
                    'confirmed'=>'Trường :attribute không khớp',
                ],
                [
                    'password_old'=> 'Mật khẩu cũ ',
                    'password'=> 'Mật khẩu mới',
                    'confirmed'=>'Mật khẩu'
                ]
            );
                if(Hash::check($request->input('password_old'), Auth::user()->password))
                {
                        User::where('id' ,Auth::user()->id)->update([
                            'password'=>Hash::make($request->input('password')),
                        ]);
                     return \redirect('admin/user/list')->with('status' , 'Bạn đã đổi mật khẩu thành công');
                }else
                {
                    return \redirect('admin/user/change')->with('status' , 'Mật khẩu cũ không trùng khớp');
                }
            }
    //
}
