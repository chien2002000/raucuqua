@extends('layouts.admin')
@section('content')
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                   Thêm danh mục
                </div>
                <div class="card-body">
                    <form action="{{ route('post/cat/add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug(Friendly_url)</label>
                            <input data-toggle ="tooltip" data-placement ="bottom" title-data-original-title="Bạn có thể bỏ trống.Đường dẫn sẽ được thay thế bằng tên danh mục" class="form-control" type="text" name="slug" id="slug">
                            <div class="tooltip1">Bạn có thể bỏ trống.Slug sẽ được thay thế bằng tên danh mục</div>
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục cha</label><br>
                            <select class="form-control" id="" name="categary">
                                <option value="">--Chọn danh mục--</option>
                                @foreach ($result1 as $value)
                                <option value="{{ $value->id }}">{{str_repeat('--' , $value->level).$value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($status->count() >0)
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            @error('status')
                            <div class="form-text text-danger">{{ $message }}</div>
                           @enderror
                            @foreach ($status as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="{{ $item->id }}">
                                <label class="form-check-label" for="exampleRadios1">
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
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh mục
                </div>
                <div class="card-body"style="padding: 15px">
                        <div class="analytic">
                            <a href="{{request()->fullUrlWithQuery(['status'=>'all'])}}" class="text-primary">Tất cả<span class="text-muted">({{ $count[0] }})</span></a>
                        </div>

                    <table class="table table-striped">
                        @if(count($result1) > 0)
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">STT</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Slug(Friendly_url)</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php
                                    $temple = 0;
                                @endphp
                            @foreach ($result1 as $item)
                                 @php
                                        $temple ++
                                @endphp
                                <tr>
                                    <td>
                                        <input type="checkbox" name="list_check[]" value="{{ $item->id }}">
                                    </td>
                                    <th scope="row">{{ $temple }}</th>
                                    <td {{ $item->parent_id == 0?"style=font-weight:bold;":'' }} >{{str_repeat('--' , $item->level).$item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->status->name }}</td>
                                    <td>
                                        <a href="{{ route('post/cat/edit' , $item->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('cat/delete' , $item->id)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @else
                        <span  style="font-weight:bold ; text-algin:center ; color:red">Không tồn tại bản ghi bạn tìm</span>
                        @endif
                    </table>

                </div>
            </div>
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
