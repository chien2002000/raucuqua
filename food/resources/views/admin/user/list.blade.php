@extends('layouts.admin')
@section('content')
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách thành viên</h5>
            <div class="form-search form-inline">
                <form>
                <input type="" name="key_word" value="{{request()->input('key_word')}}" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{request()->fullUrlWithQuery(['status'=>'active'])}}" class="text-primary">Kích hoạt<span class="text-muted">({{$count[0]}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'trash'])}}" class="text-primary">Vô hiệu hoá<span class="text-muted">({{$count[1]}})</span></a>
            </div>
            <form action="{{route('user/action')}}" method="GET">
             @error('action')
             <div class="form-text text-danger" style="margin:0px">{{"Mời bạn chọn tác vụ"}}</div>
            @enderror
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="" name="action">
                    <option value="">Chọn</option>
                    @foreach($status as $k=>$v)
                    <option value="{{$k}}">{{$v}}</option>
                    @endforeach
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            @if($list_user->count() >0)
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Ngày tạo</th>
                        @if(request()->input('status') != 'trash')
                        <th scope="col">Tác vụ</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @error('list_check')
                    <div class="form-text text-danger"style="margin:0px">{{"Mời bạn chọn checklist"}}</div>
                    @enderror
                        @php
                            $temple = 0;
                        @endphp
                    @foreach($list_user as $user)
                         @php
                             $temple ++;
                        @endphp
                    <tr>
                        <td>
                        <input type="checkbox" name="list_check[]" value="{{$user->id}}">
                        </td>
                    <th scope="row">{{$temple}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->created_at}}</td>
                    @if(request()->input('status') != 'trash')
                        <td>

                         <a href="{{route('user/edit',$user->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            @if(Auth::id() != $user->id)
                        <a href="{{route('user/delete',$user->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xoá không ?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        @endif
                        </td>
                     @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
            @else
                <span style="font-weight:bold ; text-algin:center ;color:red">Không tồn tại bản ghi bạn tìm</span>
            @endif
            <nav aria-label="Page navigation example">
                    {{$list_user->links()}}
            </nav>
        </div>
    </div>
</div>
@endsection
