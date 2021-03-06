@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
                Đổi mật khẩu
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('user/changePass')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Mật khẩu cũ</label>
                    @if(session('status'))
                    <div class="text-form text-danger">
                        {{session('status')}}
                    </div>
                    @endif
                    @error('password_old')
                    <div class="text-form text-danger">
                        {{$message}}
                    </div>
                @enderror
                    <input class="form-control" type="password" name="password_old" id="email">
                </div>
                <div class="form-group">
                    <label for="email">Mật khẩu mới</label>
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
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>

@endsection
