@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        <div class="card-body">
           <form action="{{ route('post/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tiêu đề bài viết</label>
                        @error('name')
                        <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug(Friendly_url )</label>
                        <input class="form-control" type="text" name="slug" id="slug">
                        <div class="tooltip1">Bạn có thể bỏ trống.Slug sẽ được thay thế bằng tên danh mục</div>
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        @error('cat')
                        <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                        <select class="form-control" id="" name="cat">
                          <option value="">Chọn danh mục</option>
                          @foreach($result1 as $value)
                        <option value="{{$value->id}}">{{str_repeat('--',$value->level).$value->name}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">

                        <label for="extep">Mô tả ngắn</label>
                        @error('extep')
                        <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                        <textarea name="extep"  class="form-control" id="content" cols="30" rows="5"></textarea>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    @error('content')
                    <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                    <textarea name="content" class="form-control" id="content" cols="30" rows="15"></textarea>
            </div>
                <label>Nổi bật</label>
                <label for="" class="switch4">
                    <input  type="checkbox" checked name="fea3" value="0" id="" class="d-none">
                    <span class="slider">
                    </span>
                </label>
            <div class="col-md-4" style="margin-top:5px">
                <label for="" style="margin-left: -10px">Ảnh bài viết</label>
                @error('file')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label>
                @error('status')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
                @foreach($status as $value)
                <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="{{$value->id}}" >
                    <label class="form-check-label" for="exampleRadios1">
                      {{$value->name}}
                    </label>
                </div>
                @endforeach
            </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
<style>
    .tooltip1{
        width: 200px;
    font-size: 13px;
    background: black;
    color: white;
    padding: 5px;
    margin-left: 43px;
    border-radius: 5px;
    display:  none;
    z-index: 3;
}
    .active{
        display: block;
    }
    .switch4 {
    position: relative;
    display: inline-block;
    width: 45px;
    height: 20px;
    margin: 0px 0px -4px 20px;
}
.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 34px;
}
.slider::before {
    border-radius: 50%;
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    top: 0px;
    background-color: #f3eded;
    -webkit-transition: .4s;
    transition: .4s;
}
.slider.active::before {

    transform: translateX(25px);
}
.switch4 .slider.active {
    background: #3b86f5;
} */

</style>
@endsection
