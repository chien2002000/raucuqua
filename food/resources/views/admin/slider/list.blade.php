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
            <h5 class="m-0 ">Danh sách slider</h5>
            <div class="form-search form-inline">
                <form action="">
                    <input type="" value="" name="search" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <form method="POST" action="{{ route('slider/action') }}">
            @csrf
        <div class="card-body">
            <div class="analytic">
                <a href="{{request()->fullUrlWithQuery(['status'=>'all'])}}" class="text-primary">Tất cả<span class="text-muted">({{ $count[3] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'active'])}}" class="text-primary">Công khai<span class="text-muted">({{ $count[0] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'queue'])}}" class="text-primary">Chờ duyệt<span class="text-muted">({{ $count[1] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'trash'])}}" class="text-primary">Thùng rác<span class="text-muted">({{ $count[2] }})</span></a>
            </div>
                    @error('select1')
            <div class="form-text text-danger"style="margin:0px">{{'Mời bạn chọn tác vụ'}}</div>
                       @enderror
                        <div class="form-action form-inline py-3">
                                <select class="form-control mr-1"  name="select1">
                                    <option value="">Chọn</option>
                                    @foreach ($list_check as $k=>$v)
                                    <option value="{{  $k  }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                             <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                         </div>
            @if($list_slider->count() >0)
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Người tạo</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @error('list_check')
                        <div class="form-text text-danger"style="margin:0px">{{'Hãy chọn ít nhất 1 bài viết'}}</div>
                    @enderror
                        @php
                            $temple = 0;
                        @endphp
                    @foreach ($list_slider as $item)
                         @php
                            $temple ++;
                        @endphp
                    <tr>
                        <td>
                            <input type="checkbox" name="list_check[]" value="{{ $item->id }}">
                        </td>
                        <td scope="row">{{ $temple }}</td>
                        <td><img width="550px" height="250px" src="{{ url($item->img_slider) }}" alt=""></td>
                        <td><a href="">{{ $item->slider_title }}</a></td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->status->name }}</td>
                        <td>
                            <a href="{{ route('slider/edit' , $item->id) }}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('slider/delete' , $item->id) }}" onclick="return confirm('Bạn có muốn xoá sản phẩm ?')" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
                <nav aria-label="Page navigation example">
                        {{ $list_slider->links() }}
                </nav>
            </table>
            @else
            <span  style="font-weight:bold ; text-algin:center ; color:red">Không tồn tại bản ghi bạn tìm</span>
            @endif
        </div>
        </form>
    </div>
</div>

@endsection
