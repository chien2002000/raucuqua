@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Cập nhật tài khoản
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('user/update' ,$user_by_id->id)}}" >
                {{ csrf_field() }}
                <div class="form-group">
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    <label for="name">Họ và tên</label>
                <input class="form-control" type="text" name="name" value="{{$user_by_id->name}}" id="name">
                </div>
                <div class="form-group">
                    @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" value="{{$user_by_id->email}}" id="email">
                </div>
                <div class="form-group">
                    @error('phone')
                    <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    <label for="email">Số điện thoại</label>
                    <input class="form-control" type="text" name="phone" value="{{$user_by_id->phone}}" id="email">
                </div>
                <div class="form-group">
                    @error('role_list')
                    <small class="form-text text-danger">{{$message}}</small>
                     @enderror
                    <label for="">Nhóm quyền</label>
                    @if($list_role->count()>0)
                    <select class="form-control" id="" name="role_list">
                        <option value="">Chọn quyền</option>
                        @foreach($list_role as $value)
                            @if($value->id ==$user_by_id->role_id ){
                                <option selected  value="{{$value->id}}">{{$value->name}}</option>
                            }
                            @else
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
