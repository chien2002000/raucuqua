@extends('layouts.admin')
@section('content')
@if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
@endif
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
            <div class="form-search form-inline">
                <form action="">
                    <input name="keywork" class="form-control form-search" placeholder="Tìm kiếm" value="{{ request()->input('keywork') }}">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{request()->fullUrlWithQuery(['status'=>'all'])}}" class="text-primary">Tất Cả<span class="text-muted">({{ $count[0] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'queue'])}}" class="text-primary">Chờ duyệt<span class="text-muted">({{ $count[1] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'processing'])}}" class="text-primary">Đang xử lý<span class="text-muted">({{ $count[2] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'transported'])}}" class="text-primary">Đang vận chuyển<span class="text-muted">({{ $count[3] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'success'])}}" class="text-primary">Thành công<span class="text-muted">({{ $count[4] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'cancel'])}}" class="text-primary">Huỷ<span class="text-muted">({{ $count[5] }})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'trashed'])}}" class="text-primary">Thùng rác<span class="text-muted">({{ $count[6] }})</span></a>
            </div>
            <form method="POST" action="{{ route('order/action') }}">
                @csrf
                @error('select1')
                <div class="form-text text-danger"style="margin:0px">{{'Mời bạn chọn tác vụ'}}</div>
            @enderror
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="" name="select1">
                    <option value="">Chọn</option>
                    @foreach ( $list_active as  $k=>$v)
                    <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            @if($order_list->count() >0)
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Mã</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        @if(request()->input('status')  != 'trashed')
                        <th scope="col">Chi tiet</th>
                        <th scope="col">Tác vụ</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @error('list_check')
                    <div class="form-text text-danger"style="margin:0px">{{'Hãy chọn ít nhất 1 khách hàng'}}</div>
                 @enderror
                    @php
                        $temple =0
                    @endphp
                    @foreach ($order_list as $item)
                    @php
                        $temple ++
                    @endphp
                    <tr>
                        <td>
                            <input type="checkbox" name="list_check[]" value="{{ $item->id }}" >
                        </td>
                        <td>{{ $temple }}</td>
                        <td>{{ $item->code }}</td>
                        <td>
                            {{ $item->fullName }} <br>
                            {{ $item->phone }}
                        </td>
                        <td>{{ $item->count_total }}</td>
                        <td>{{  number_format($item->total , 0 ,'' , '.')  }}đ</td>
                        @if( $item->status_order ==4)
                        <td><span class="badge badge-success ">{{ $item->status_oder->name }}</span></td>
                        @else
                        @if($item->status_order ==5)
                        <td><span class="badge badge-dark ">{{ $item->status_oder->name }}</span></td>
                        @else
                        <td><span class="badge badge-warning ">{{ $item->status_oder->name }}</span></td>
                        @endif
                        @endif
                        <td>{{ $item->created_at }}</td>
                        @if(request()->input('status')  != 'trashed')
                        <td><a href="{{ route('order/detail' , $item->id) }}" style="color: #007bff">Chi tiết</a></td>
                        <td>
                            <a href="{{ route('order/delete' , $item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xoá đơn hàng ?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
               {{ $order_list->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection
