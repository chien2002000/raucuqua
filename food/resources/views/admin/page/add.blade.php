@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm mới trang
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('page/store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Tiêu đề trang</label>
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="slug">Slug(Friendly_url )</label>
                    @error('slug')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    <input class="form-control" type="text" name="slug" id="slug">
                    <div class="tooltip1">Bạn có thể bỏ trống.Slug sẽ được thay thế bằng tên danh mục</div>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung trang</label>
                    @error('content')
                    <div class="form-text text-danger">{{ $message }}</div>
                     @enderror
                    <textarea name="content"  class="form-control" id="content" cols="30" rows="10"></textarea>
                </div>
                @if($status->count() > 0)
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    @error('status')
                    <div class="form-text text-danger">{{ $message }}</div>
                     @enderror
                    @foreach ($status as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="{{ $item->id }}" >
                        <label class="form-check-label" for="exampleRadios2">
                        {{ $item->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
                @endif


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
    }
</style>
@endsection
