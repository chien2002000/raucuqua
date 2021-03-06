@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm người dùng
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('user/store')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    @error('name')
                    <div class="text-form text-danger">
                        {{$message}}
                    </div>
                @enderror
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    @error('email')
                    <div class="text-form text-danger">
                        {{$message}}
                    </div>
                @enderror
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="email">Số điện thoại</label>
                    @error('phone')
                    <div class="text-form text-danger">
                        {{$message}}
                    </div>
                @enderror
                    <input type="number" class="form-control" type="text" name="phone" id="email">
                </div>
                <div class="form-group">
                    <label for="email">Mật khẩu</label>
                    @error('password')
                    <div class="text-form text-danger">
                        {{$message}}
                    </div>
                @enderror
                    <input class="form-control" type="password" name="password" id="email">
                </div>
                <div class="form-group">
                    <label for="pass_old">Nhập lại mật khẩu</label>
                    {{-- @error('pass_old')
                    <small class="form-text text-danger">{{$message}}</small>
                        @enderror --}}
                    <input class="form-control" type="password" name="password_confirmation" id="pass_old">
                </div>
                <div class="form-group">
                    <label for="">Nhóm quyền</label>
                    @error('role_list')
                    <div class="text-form text-danger">
                        {{$message}}
                    </div>
                @enderror
                    @if($list_role->count()>0)
                    <select class="form-control" id="" name="role_list">
                        <option value="">Chọn quyền</option>
                        @foreach($list_role as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection
