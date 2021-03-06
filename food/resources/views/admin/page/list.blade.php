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
            <h5 class="m-0 ">Danh sách trang</h5>
            <div class="form-search form-inline">
                <form method="GET">
                    <input type="" name="keyword" value="{{ request()->input('keyword') }}" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{request()->fullUrlWithQuery(['status'=>'active'])}}" class="text-primary">Công khai<span class="text-muted">({{ $count[0] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'queue'])}}" class="text-primary">Chờ duyệt<span class="text-muted">({{ $count[1] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'trash'])}}" class="text-primary">Thùng rác<span class="text-muted">({{ $count[2] }})</span></a>
            </div>
        <form action="{{ route('page/action') }}" method="POST">
            @csrf
            @error('select1')
            <div  class="form-text text-danger"style="margin:0px">{{'Mời bạn chọn tác vụ'}}</div>
            @enderror
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" name="select1">
                    <option value="">Chọn</option>
                    @foreach ($list_check as $k=>$v)
                    <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
                <input onclick="hide2()" type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            @if($list_page->count() > 0)
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Slug(Friendly_url)</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        @if(request()->input('status') != 'trash')
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Tác vụ</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @error('list_check')
                         <div class="form-text text-danger"style="margin:0px">{{'Hãy chọn ít nhất 1 bài viết'}}</div>
                    @enderror
                    @foreach($list_page as $item)
                    <tr>
                        <td>
                            <input type="checkbox" name="list_check[]" value="{{ $item->id }}">
                        </td>
                        <td scope="row">1</td>
                        <td style="width:300px"><a href="">{{ $item->page_title }}</a></td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->created_at }}</td>
                        @if(request()->input('status') == 'trash')
                        <td>Xoá tạm thời</td>
                        @else
                        @if(request()->input('status') != 'trash')
                        <td>{{ $item->status->name }}</td>
                        @endif
                        @endif

                        @if(request()->input('status') != 'trash' && $item->delete_at == null )
                        <td data-url="{{ url('admin/page/detail') }}"  data-toggle="modal" data-id="{{ $item->id }}" data-target="#exampleModal" id="page-detail" style="cursor: pointer;padding-left: 25px;">
                            <img width="30" src="{{asset('dau-detail.png')}}">
                        </td>
                        <td>
                            <a href="{{ route('page/edit' , $item->id) }}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('page/delete' , $item->id) }}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
            @else
            <span  style="font-weight:bold ; text-algin:center ; color:red">Không tồn tại bản ghi bạn tìm</span>
           @endif
            <nav aria-label="Page navigation example">
                {{ $list_page->links() }}
            </nav>
        </div>
    </div>
</div>
<style>
    .modal-body ul li label {
    width: 100%;
    color: #fff;
    background: #0a73e2;
    margin-bottom: 20px;
    padding: 6px 15px;
    font-weight: 600;
    border-radius: 5px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
li{
    list-style: none
}
.modal-body ul li  p{
    width :  300px;
    color: #fff;
    margin-bottom: 20px;
    padding: 6px 15px;
    font-weight: 600;
    border-radius: 5px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    background: #5196de;
}
</style>
<div   class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Chi tiết trang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="img" style="margin-left: 76px; padding-bottom: 15px; }">
                        <img width="300px" id="img" src="">
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="p-2 mb-0 shadow-lg">
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Người tạo</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">ID</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Tiêu đề</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Trạng thái</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Ngày Tạo</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8" style="padding-left: 0px">

                        <ul class=" p-2 mb-0 shadow-lg">
                            <li>
                                <div class="row no-gutters">

                             <div class="user"><p>sadasd</p></div>

                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="id"><p>sadasd</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="title"><p>sadasd</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="status"><p>sadasd</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="create"><p>sadasd</p></div>
                                </div>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
@endsection
